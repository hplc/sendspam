<?
$fp=fopen("email.txt", "r");
if ($fp) {
	$message = "";
	$subject = str_replace("\n", "", fgets($fp));
	while (!feof($fp)) {
		$buffer = fgets($fp);
		$message .= $buffer;
	}
	$message = str_replace("\n.", "\n..", $message);
	fclose($fp);
}

$fp=fopen("emails.txt", "r");
if ($fp) {
	while (!feof($fp)) {
		$to = str_replace("\n", "", fgets($fp));
		if (strlen($to)>=5) {
			$result=mail($to, $subject, $message);
			echo "Sent email to $to $result\n";
		}
	}
	fclose($fp);
}

?>
