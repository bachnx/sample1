<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<?php
			require('mysql.php');



			$db = new Mysqlidb('localhost', 'root', 'a12345678', 'php_train');
			$app_url = "http://192.168.33.11";
			$query = 'SELECT * FROM AMS_MESSAGE';
			$results = $db->rawQuery($query, null);
                        
			if(isset($_POST['submit'])) {
				$data = array(
					'message' => $_POST['message']
				);
				$db->insert('message', $data);
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
				<h3 class="title">List all messages</h3>
					<ul>
						<?php
							if($results) {
								foreach($results as $result) {
									?>
										<li><a href="<?php echo $app_url.'/edit-message.php?id='.$result['MESSAGE_ID']?>"><?php echo $result['MESSAGE_CONTENT']?></a></li>
									<?php
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>


