<?PHP
// Starting the session
session_start();

require __DIR__.'/MailClient.php';

if (!isset($_SESSION['email']) || !isset($_SESSION['pass']))
	die('Your are not logged in! <a href="/login.php">log in</a>');

// The user mailbox, google imap with port 993.
$mailbox = '{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}';
$mail = new MailClient($mailbox, $_SESSION['email'], $_SESSION['pass']);
if (false === $mail->connect())
	die($mail->error);
echo $mail->message;
$mail_id = $_GET['id'];
$body = $mail->get_mail($mail_id);
?>
<!DOCTYPE html>
<html>
	<body>
		<?PHP
			echo $body;
		?>
	</body>
</html>
