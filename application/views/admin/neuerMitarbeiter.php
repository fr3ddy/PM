<form action="<?php echo base_url(); ?>admin/speichereNeuenMitarbeiter" method="POST" class="form-horizontal" role="form">
	<div class="form-group">
		<lable for="benutzername" class="col-sm-2 control-label">
			Benutzername
		</lable>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="Benutzername" name="Benutzername" placeholder="Benutzername" required="required" />
		</div>
	</div>
	<div class="form-group">
		<lable for="passwort" class="col-sm-2 control-label">
			Passwort
		</lable>
		<div class="col-sm-5">
			<input type="password" class="form-control" id="Passwort" name="Passwort" placeholder="Passwort" required="required"/>
		</div>
	</div>
	<div class="form-group">
		<lable for"Abteilung" class="col-sm-2 control-label">
			Abteilung
		</lable>
		<div class="col-sm-5">
			<select class="form-control" name="Abteilung" id="Abteilung">
				<?php
				foreach ($abteilungen as $abteilung) {
					echo "<option value='" . $abteilung["id"] . "'>" . $abteilung["abteilungsname"] . "</option>";
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="SUBMIT" value="Mitarbeiter Eintragen" class="btn btn-default"/>
		</div>
	</div>
</form>

