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

			if (isset($_POST["MessageText"]) == false)
			{
				echo "<label>" . wordwrap("ERROR: MessageText not set!") . "</label>";
			}
			else
			{
				$messageTextEntered = $_POST["MessageText"];

				$wasMailSentSuccessfully = mail
				(
					$emailAddressToSendTo,
					"Contact Form Message", // subject
					$messageTextEntered
				);

				$statusMessage =
					$wasMailSentSuccessfully
					? "The message was sent successfully!"
					: "An error occurred while sending the message.";
		
				echo "<label>" . wordwrap($statusMessage) . "</label>";
			}

		?>

		<div>
			<a href="/">Home</a>
		</div>
	</body>

</html>