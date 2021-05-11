<?PHP
// Start the session
session_start();

if (isset($_POST['email']) && isset($_POST['pass']))
{
	if (empty($_POST['email']) || empty($_POST['pass']))
		die("Error: Invalid credentials!");
	// User email account name
	$_SESSION['email'] = $_POST['email'];
	// User email password
	$_SESSION['pass'] = $_POST['pass'];
}
elseif (!isset($_SESSION['email']) || !isset($_SESSION['pass']))
	die('Your are not logged in! <a href="/login.php">log in</a>');

require __DIR__."/MailClient.php";

// The user mailbox, google imap with port 993.
$mailbox = '{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}';

$mail = new MailClient($mailbox, $_SESSION['email'], $_SESSION['pass']);
if (false === $mail->connect())
	die($mail->error);
echo $mail->message;

$page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$mails_overview = $mail->get_msgs_overview($page, 25, ['date', 'desc']);
if ($mails_overview === false)
	die("ERROR:");
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}
			td, th {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}
			tr:nth-child(odd) {
				background-color: #dddddd;
			}
			tr.lovelyrow{
				background-color: hsl(0,0%,90%);
			}
			tr.lovelyrow:hover{
				background-color: hsl(0,0%,40%);
				cursor: pointer;
			}
			 /* Pagination links */
			.pagination a {
			  color: black;
			  float: left;
			  padding: 8px 16px;
			  text-decoration: none;
			  transition: background-color .3s;
			}

			/* Style the active/current link */
			.pagination a.active {
			  background-color: dodgerblue;
			  color: white;
			}

			/* Add a grey background color on mouse-over */
			.pagination a:hover:not(.active) {background-color: #ddd;} 
		</style>
	</head>
	</body>
		<h1>Welcome to your Mail!</h1>
		<a href="/sendmail.php">SEND a email!</a>

		 <div class="pagination">
<?PHP
$pages = [];
for ($i = $page - 4; $i < $page + 5; $i++)
	if ($i >= 1)
		$pages[] = $i;

foreach ($pages as $k => $i)
	echo "<a class=\"", (($page === $i) ? "active" : ""), "\" href=\"/dashboard.php?page={$i}\">", (($k === 0 && $page !== $i) ? "&laquo;" : ((!isset($pages[$k + 1]) && $page !== $i) ? "&raquo;" : $i)), "</a>";
?>
			</div> 

		<table>
			<tr>
				<th>Nr.</th>
				<th>Date</th>
				<th>From</th>
				<th>Subject</th>
			</tr>
<?PHP
foreach ($mails_overview['res'] as $overview)
{
	echo '<tr class="lovelyrow" onclick="location.href=\'/read.php?id=', $overview->msgno, '\'"><td>', $overview->msgno, '</td>';
	echo "<td>{$overview->date}</td>";
	echo "<td>{$overview->from}</td>";
	echo "<td>", imap_utf8($overview->subject), '</td><tr></a>';
}
?>
		</table>
	</body>
</html>
