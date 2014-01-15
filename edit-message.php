<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<?php
			require('mysql.php');
			$db = new Mysqlidb('localhost', 'root', 'a12345678', 'php_train');
			$app_url = "http://192.168.33.11";
			if(isset($_GET['id'])) {
				$id = intval($_GET['id']);

				$query = 'SELECT * FROM AMS_MESSAGE where MESSAGE_ID = ?';
				$parram = array($id);
				$results = $db->rawQuery($query, $parram);
			}
			if(isset($_POST['update'])) {
				$data = array(
					'MESSAGE_CONTENT' => $_POST['message']
				);
				$db->where('MESSAGE_ID', intval($_POST['id']));
				$db->update('AMS_MESSAGE', $data);
				header('Location: '. $app_url.'/list-message.php');
			}
			if(isset($_POST['delete'])) {
				$db->where('MESSAGE_ID', intval($_POST['id']));
				$db->delete('AMS_MESSAGE');
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
					<h3 class="title">Edit a Form</h3>
					<div class="contents">
						<form action="" method="POST">
							<div class="input_fields">
								<input name="message" type="text" value="<?php echo $results[0]['MESSAGE_CONTENT']?>" />
							</div>
							<div class="input_fields">
								<input type="hidden" name="id" value="<?php echo $results[0]['MESSAGE_ID']?>" />
								<input name="update" type="submit" value="Update" />
								<input name="delete" type="submit" value="Delete" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
