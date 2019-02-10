<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($status_code)) {
	$status_code = '500';
}
$CI =& get_instance();
if( ! isset($CI))
{
    $CI = new CI_Controller();
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="/" />
  <title><?=lang('error_title')?></title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div id="wrapper">
	<div id="content-wrapper" class="d-flex flex-column" style="min-height: 100vh; justify-content: center;">
		<div class="container-fluid">
			<div class="text-center">
			<div class="error mx-auto" data-text="<?=$status_code?>"><?=$status_code?></div>
			<p class="lead text-gray-800 mb-5"><?=$heading?></p>
			<p class="text-gray-500 mb-0"><?=$message?></p>
			<a href="/">&larr; Back to Dashboard</a>
			</div>
		</div>
	</div>
</div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
