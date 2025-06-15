<html>

	<head>
		<title>This Could Be Better - Contact</title>
		<link rel="stylesheet" href="../../Styles/Default.css" />
	</head>

	<body>

		<h4>This Could Be Better</h4>

		<div>
			<a href="../Home.html">Home</a>
			<a href="../News.html">News</a>
			<a href="../Projects.html">Projects</a>
			<a href="../Code.html">Code</a>
			<a href="../Blog.html">Blog</a>
			<a href="../Contact/MessageCompose.php">Contact</a>
		</div>

		<h1>Contact</h1>

		<?php

			include("ContactEmailAddress.php");
			include("WordsToBlock.php");

			$statusMessage = "About to send message...";

			if (isset($_POST["MessageText"]) == false)
			{
				$statusMessage = "ERROR: MessageText not set!";
			}
			else
			{
				$messageText = $_POST["MessageText"];

				$messageTextLengthMax = 1024;

				if (strlen($messageText) > $messageTextLengthMax)
				{
					// The maxLength attribute on the textarea should prevent this.
					$messageText = substr($messageText, 0, $messageTextLengthMax);
				}

				$messageTextContainsBlockedWordSoFar = false;

				foreach ($wordsToBlock as $wordToBlock)
				{
					// Blocking messages may save bandwidth,
					// but it will cost more computation time.

					$wordToBlockWasFoundInMessageText =
						mb_strpos($messageText, $wordToBlock);

					if ($wordToBlockWasFoundInMessageText)
					{
						$messageTextContainsBlockedWordSoFar = true;
						break;
					}
				}

				$statusMessageSuccessful =
					"The message was submitted successfully.";

				if ($messageTextContainsBlockedWordSoFar)
				{
					// Save bandwidth by not sending spam.
					// Don't tell the spammer their mail was suppressed.
					$statusMessage = $statusMessageSuccessful;
				}
				else
				{
					$messageSubject = "Contact Form Message";

					$messageHeaders =
						"X-Note-Remote-Addr: " . $_SERVER["REMOTE_ADDR"];

					$wasMailSentSuccessfully = mail
					(
						$emailAddressToSendTo,
						$messageSubject,
						$messageText,
						$messageHeaders
					);

					$statusMessage =
						$wasMailSentSuccessfully
						? $statusMessageSuccessful
						: "An error occurred while sending the message.";
				}
			}

			echo "<label>" . wordwrap($statusMessage) . "</label>";

		?>

		<div>
			<a href="/">Home</a>
		</div>
	</body>

</html>