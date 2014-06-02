<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>admin/sendeGeaenderteAbteilung/<?php echo $id; ?>" method="POST">
	<div class="form-group">
		<label for="Abteilungsname" class="col-sm-3 control-label">Abteilungsname</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="Abteilungsname" id="Abteilungsname" required="required" placeholder="Abteilungsname" value="<?php echo $abteilung["Abteilungsname"]; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="Abteilungsleiter" class="col-sm-3 control-label">Abteilungsleiter</label>
		<div class="col-sm-9">
			<select class="form-control" name="Abteilungsleiter" id="Abteilungsleiter">
				<?php
				foreach ($abteilungsmitarbeiter as $mitarbeiter) {
					echo "<option value='" . $mitarbeiter["id"] . "' ";
					if ($mitarbeiter["id"] == $abteilung["Abteilungsleiter"]["BenutzerID"]) echo "selected='selected'";
					echo ">" . $mitarbeiter["benutzername"] . "</option>";
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="Bereich" class="col-sm-3 control-label">Bereich</label>
		<div class="col-sm-9">
			<select class="form-control" name="Bereich" id="Bereich">
				<?php
				foreach ($bereiche as $bereich) {
					echo "<option value='" . $bereich["id"] . "'>" . $bereich["bereichsname"] . "</option>";
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-2">
			<button type="submit" class="btn btn-default" style="margin-left: 36px;">
				Bearbeiten
			</button>
		</div>
	</div>
</form>