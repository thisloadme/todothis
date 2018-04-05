<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url() ?>aset/css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>aset/css/icon.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>aset/css/style.css">
		<link rel="shortcut icon" type="x-icon" href="<?=base_url() ?>aset/img/colorfullogo.png">
		<title>Login to your ToDoThis account</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<div class="container">
		<div class="row">
			
			<div class="center-align" style="margin-top: 15px; margin-bottom: -15px;">
				<img style="height: auto; width: 80px;" src="<?=base_url() ?>aset/img/colorfullogo.png">
			</div>
			<h3 class="center blue-text"><i>ToDoThis</i></h3>
			<h6 class="center teal-text"><i>Organize all of your tasks easily</i></h6>
			<br><br>

			<div class="card col s8 offset-s2 m6 offset-m3 z-depth-1 hoverable">
				
				<form style="margin:40px 40px 100px 40px!important;" method="post" action="<?=site_url('login/pro_login') ?>">
					<h6 class="blue-text">Login to your account</h6><br>
					<input type="hidden" name="id">
					<div class="input-field">
						<label for="email">Email</label>
						<input id="email" type="email" name="email" class="validate">
					</div>
					<div class="input-field">
						<label for="pass">Password</label>
						<input id="pass" type="password" name="pass" class="validate">
					</div>
					<div class="blue-text" style="padding: 5px;">
						<h6><?=$this->session->flashdata('doubemail') ?></h6>
						<h6><?=$this->session->flashdata('emptyemail') ?></h6>
						<h6><?=$this->session->flashdata('emptypass') ?></h6>
					</div>
					<div class="col s12 m4 right">
						<input type="submit" value="It's me" class="btn-large right blue hoverable">
					</div>
				</form>
			</div>

		</div>
		<div class="row">
			<div class="col s8 offset-s2 m6 offset-m3">
				<h6 style="font-size: 11pt;">Don't have an account yet ? <a href="<?=site_url('signup') ?>">Register now</a></h6>
			</div>
		</div>
		<footer class="page-footer white"><hr><div class="container black-text">Copyright © 2018 -ToDoThis Web App</div></footer>
	</div>

	<script type="text/javascript" src="<?=base_url() ?>aset/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="<?=base_url() ?>aset/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?=base_url() ?>aset/js/init.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.parallax').parallax();
		});
	</script>
</body>
</html>