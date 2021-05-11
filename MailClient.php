<?PHP
/**
 * A User Mail Agent
 *
 * created by: Petrov Dumitru
 */
class MailClient
{
	// Connection info.
	private string $mailbox;
	private string $user;
	private string $pass;

	// Connection resource.
	private $connection;

	// Messages
	public string $error = "";
	public string $message = "";

	/**
	 * Fill in user info.
	 */
	public function __construct(string $mailbox, string $user, string $pass)
	{
		$this->mailbox = $mailbox;
		$this->user = $user;
		$this->pass = $pass;
	}

	/**
	 * Destrutor
	 */
	public function __destruct()
	{
		$this->close_connection();
	}

	/**
	 * Open a new connection to mail server
	 */
	public function	connect(): bool
	{
		$this->connection = imap_open($this->mailbox, $this->user, $this->pass);
		
		if (false === $this->connection)
		{
			$this->error = "ERROR: Could not connect to gmail.\n" . imap_last_error();
			return false;
		}
		$this->message = "Connected Successfully!\n";
		return true;
	}

	/**
	 * Close connection
	 */
	protected function	close_connection()
	{
		if ($this->connection)
			imap_close($this->connection);
	}


	/**
	 * Return an array of IMAP messages for pagination
	 */
	public function	get_msgs_overview(int $page = 1, int $per_page = 25, $sort = null)
	{
		$limit = $per_page * $page;
		$start = ($limit - $per_page) + 1;
		$start = ($start < 25) ? 1 : $start;
		$limit = (($limit - $start) != ($per_page - 1)) ? ($start + ($per_page - 1)) : $limit;
		$info = imap_check($this->connection);
		$limit = ($info->Nmsgs < $limit) ? $info->Nmsgs : $limit;

		if (true === is_array($sort))
		{
			$sorting = array(
				'direction' => array(
					'asc' => 0,
					'desc' => 1,
				),
				'by' => array(
					'date' => SORTDATE,
					'arrival' => SORTARRIVAL,
					'from' => SORTFROM,
					'subject' => SORTSUBJECT,
					'size' => SORTSIZE
				),
			);
			$by = (true === is_int($by = $sorting['by'][$sort[0]]))
				? $by
				: $sorting['by']['date'];
			$direction = (true === is_int($direction = $sorting['direction'][$sort[1]]))
				? $direction
				: $sorting['direction']['desc'];

			$sorted = imap_sort($this->connection, $by, $direction);

			$msgs = array_chunk($sorted, $per_page);
			$msgs = $msgs[$page - 1];
		}
		else
			$msgs = range($start, $limit);

		$result = imap_fetch_overview($this->connection, implode(',', $msgs), 0);
		if (false === is_array($result))
			return false;

		// Sorting
		if(true === is_array($sorted)) {
			$tmp_result = array();
			foreach($result as $r)
				$tmp_result[$r->msgno] = $r;

			$result = array();
			foreach($msgs as $msgno) {
				$result[] = $tmp_result[$msgno];
			}
		}

		$return = array(
			'per-page' => $per_page,
			'res' => $result,
			'start' => $start,
			'limit' => $limit,
			'sorting' => array(
				'by' => $sort[0],
				'direction' => $sort[1],
				),
				'total' => imap_num_msg($this->connection),
			);
		$return['pages'] = ceil($return['total'] / $per_page);
		return $return;
	}

	/**
	 *  Get all folders from the mailbox
	 */
	function	get_folder_list(): array
	{
		$folders = imap_list($this->connection, $this->mailbox, "*");

		if (is_array($folders)) {
			array_map('imap_utf7_decode', $folders);
		} else {
			$this->error = "ERROR: imap_list failed: " . imap_last_error() . "\n";
		}
		return $folders;
	}

	/**
	 * Return a mail by mail id.
	 */
	public function	get_mail(int $id)
	{
		return imap_qprint(imap_body($this->connection, $id));
	}
}
