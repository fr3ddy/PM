<div id="login">
	<img src="<?php echo base_url(); ?>img/logo.jpg" />
	<form action="<?php echo base_url(); ?>user/login" method="POST">
		<br/>
		<br/>
		<div class="input-group <?php if(isset($usererror)) echo $usererror; ?>">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" name="benutzername" class="form-control" placeholder="Benutzername" value="<?php if(isset($benutzername)) echo $benutzername; ?>">
		</div>
		<br/>
		<div class="input-group <?php if(isset($pwerror)) echo $pwerror; ?>">
			<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
			<input type="password" name="passwort" class="form-control" placeholder="Passwort">
		</div>
		<br/>
		<input type="SUBMIT" value="Anmelden" class="btn btn-default btn-lg" id="loginBtn"/>
	</form>
</div>
