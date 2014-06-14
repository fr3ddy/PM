<!DOCTYPE html>
<?php $this->load->helper('url'); ?>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?> - PM</title>
		
		<!--Favicon-->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" type="image/x-icon" />
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/pm.js"></script>
		
		<!-- Bootstrap -->
		<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/pm.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<h1><?php if ($title != "Login"){ echo $title; ?></h1>
			<div class="navigation">
				<?php $gl = $this->user_model->gibAbteilung(0);
				if ($gl["Abteilungsleiter"]["BenutzerID"] == $this -> session -> userdata("BenutzerID")) { ?>
				<!-- Geschäftsleiter -->
				<a href="<?php echo base_url(); ?>projekte"><div>Projekt&uuml;bersicht</div></a>
				<a href="<?php echo base_url(); ?>projekte/strategie"><div>Strategie</div></a>
				<a href="<?php echo base_url(); ?>projekte/kategorie"><div>Kategorie</div></a>
				<a href="<?php echo base_url(); ?>projekte/bereich"><div>Bereich</div></a>
				<a href="<?php echo base_url(); ?>admin"><div>Administration</div></a>
				<a style="float: right;" href="<?php echo base_url(); ?>user/logout"><div><span class="glyphicon glyphicon-off" style="margin-right: 5px;"></span>Abmelden</div></a>
				<?php
					}elseif($this->session->userdata("Abteilung") == 0 && $this->session->userdata("Rolle") != "Bereichsleiter"){
				?>
				<a href="<?php echo base_url(); ?>projekte"><div>Projekt&uuml;bersicht</div></a>
				<a style="float: right;" href="<?php echo base_url(); ?>user/logout"><div><span class="glyphicon glyphicon-off" style="margin-right: 5px;"></span>Abmelden</div></a>	
				<?php
					}elseif($this->session->userdata("Rolle") == "Bereichsleiter"){
				?>
				<a href="<?php echo base_url(); ?>projekte/neu"><div>Neues Projekt einreichen</div></a>
				<a href="<?php echo base_url(); ?>projekte"><div>Projekt&uuml;bersicht</div></a>
				<a style="float: right;" href="<?php echo base_url(); ?>user/logout"><div><span class="glyphicon glyphicon-off" style="margin-right: 5px;"></span>Abmelden</div></a>
				<?php
					}elseif($this->session->userdata("Rolle") == "Abteilungsleiter"){
				?>
				<a href="<?php echo base_url(); ?>projekte/neu"><div>Neues Projekt einreichen</div></a>
				<a href="<?php echo base_url(); ?>projekte"><div>Projekt&uuml;bersicht</div></a>
				<a style="float: right;" href="<?php echo base_url(); ?>user/logout"><div><span class="glyphicon glyphicon-off" style="margin-right: 5px;"></span>Abmelden</div></a>
				<?php
					}elseif($this->session->userdata("Rolle") == "Mitarbeiter"){
				?>
				<a href="<?php echo base_url(); ?>projekte/neu"><div>Neues Projekt einreichen</div></a>
				<a href="<?php echo base_url(); ?>projekte"><div>Eingereichte Projekte</div></a>
				<a href="<?php echo base_url(); ?>user/meinprofil"><div>Mein Profil</div></a>
				<a style="float: right;" href="<?php echo base_url(); ?>user/logout"><div><span class="glyphicon glyphicon-off" style="margin-right: 5px;"></span>Abmelden</div></a>
				<?php
				}}
 ?>
			</div>
			<?php
			if (isset($sidenavigation)) {
				echo "<h2>" . $sidenavigationtitle . "</h2><div class='sidenavigation'>";
				foreach ($sidenavigation as $name => $link) {
					echo '<a href="' . base_url() . $link . '"><div>' . $name . '</div></a>';
				}
				echo "</div>";
			} else {
				echo "<div class='sidenavigationplaceholder'></div>";
			}
 ?>	
			<div <?php
			if ($title != "Login")
				echo 'class="content"';
 ?>>
