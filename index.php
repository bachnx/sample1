<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<?php
			require('mysql.php');
			$app_url = "http://192.168.33.11";
			if(isset($_POST['submit'])) {
				$data = array(
					'MESSAGE_CONTENT' => $_POST['message']
				);
				$db = new Mysqlidb('localhost', 'root', 'a12345678', 'php_train');
				$db->insert('AMS_MESSAGE', $data);
				header('Location: '. $app_url.'/list-message.php');
			}
		?>
		<title>BachNX</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" /> 
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="<?php echo $app_url?>/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $app_url?>/style.css" />
		<script type="text/javascript" src="<?php echo $app_url?>/jquery-1.7.min.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<div class="container">
				<div class="message_form">
					<div class="clearfix list_message_link"><a href="<?php echo $app_url.'/list-message.php'?>">All message</a></div>
					<h3 class="title">Submit a Form</h3>
					<div class="contents">
						<form action="" method="POST">
							<div class="input_fields">
								<input name="message" type="text" placeholder="Write your message" />
							</div>
							<div class="input_fields">
								<input name="submit" type="submit" value="Submit" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
