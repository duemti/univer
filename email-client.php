<?PHP
require __DIR__."/MailClient.php";

// The user mailbox, google imap with port 993.
$mailbox = '{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}';

// User email account name
$user = 'petrov.dumitru@gmail.com';

// User email password
$password = 'chisinau1';


$mail = new MailClient($mailbox, $user, $password);
if (false === $mail->connect())
	die($mail->error);
echo $mail->message;


$folders = $mail->get_folder_list();
print_R($folders);

$mails_overview = $mail->get_msgs_overview(1, 25, ['date', 'desc']);
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
			tr:nth-child(even) {
				background-color: #dddddd;
			}
		</style>
	</head>
	</body>
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
	echo "<tr><td>{$overview->msgno}</td><td>{$overview->date}</td><td>{$overview->from}</td><td>", imap_utf8($overview->subject), "</td><tr>";
}
?>
		</table>
	</body>
</html>
