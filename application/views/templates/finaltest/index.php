<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>css/style.css" />
		<title><?php echo $titulo; ?></title>
	</head>

	<body>
		<div id="header" class="wrapper border">
			<h3><?php echo $theme; ?></h3>
		</div>
		<div id="wrapper" class="wrapper border">
			<?php $this->load->view($pagina); ?>
		</div>
	</body>
</html>