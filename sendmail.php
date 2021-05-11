<?PHP session_start(); ?>
<!DOCTYPE html>
<html>
<body>
<H1>Compose a new Message!</H1>
<form action="sendmail.php" method="post">
To: <input type="email" name="email" required>
</br>
Subject: <input type="text" name="subject" required>
</br>
Message:
</br>
<textarea cols="40" rows="10" name="msg">
Type your message here!
</textarea>
</br>
<input type="submit" value="Send Mail!">
</form>

<?PHP

if (isset($_POST['email']) && isset($_POST['msg']))
{
	// The recepient
	$recepient = $_POST['email'];

	// Subject of email
	$subject = $_POST['subject'];

	// the message
	$msg = $_POST['msg'];

	// use wordwrap() if lines are longer than 70 characters
	$msg = wordwrap($msg,70);

	// Headers
	$headers = 'From: ' . $_SESSION['email'] . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	// send email
	if (true === mail($recepient, $subject, $msg, $headers))
		echo "<p>Email has been sent Successfully</p>";
	else
		echo "<P>There was an error.</p>";
}
else
	echo "<p>Please fill the form!</p>";
?>
<a href="/dashboard.php">Go back!</a>
</body>
</html> 
