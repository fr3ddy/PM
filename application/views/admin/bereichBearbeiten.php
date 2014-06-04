<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>admin/speichereBereich/<?php echo $bereich["ID"]; ?>" method="POST">
	<div class="form-group">
		<label for="Abteilungsname" class="col-sm-3 control-label">Bereichsname</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="Bereichsname" id="Bereichsname" required="required" placeholder="Bereichsname" value="<?php echo $bereich["Bereichsname"]; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="Bereich" class="col-sm-3 control-label">Bereichsleiter</label>
		<div class="col-sm-9">
			<select class="form-control" name="Bereichsleiter" id="Bereichsleiter">
				<?php
				foreach ($bereichsleiter as $person) {
					echo "<option value='" . $person["id"] . "'";
					if($bereich["Bereichsleiter"]["BenutzerID"] == $person["id"]) echo " selected ";
					echo ">" . $person["benutzername"] . "</option>";
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-2">
			<button type="submit" class="btn btn-default" style="margin-left: 36px;">
				Erstellen
			</button>
		</div>
	</div>
</form>