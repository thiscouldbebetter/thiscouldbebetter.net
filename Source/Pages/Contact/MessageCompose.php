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

		<div>
			<p>
				Enter text and click the Send button
				to send an email mesage to the contact account.
			</p>

			<form action="MessageSend.php" method="post">

				<label>Message Text:</label>
				<br />
				<textarea
					name="MessageText"
					cols="48" rows="16"
				></textarea>
				<br/>

				<button class="button" type="submit">Send Message</button>
			</form>
		</div>

	</body>

</html>