<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>projekte/speichereAllgemein/<?php echo $ProjektAllgemein->ID; ?>">
	<div class="form-group">
		<label for="Projekttitel" class="col-sm-3 control-label">Projekttitel</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="Titel" id="Projekttitel" placeholder="Projekttitel" value="<?php echo $ProjektAllgemein->Titel; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="Projektdauer" class="col-sm-3 control-label">Projektdauer in Monaten</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="Dauer" id="Projektdauer" placeholder="Projektdauer in Monaten" value="<?php echo $ProjektAllgemein->Dauer; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="Priorisierung" class="col-sm-3 control-label">Priorisierung</label>
		<div class="col-sm-9">
			<select class="form-control" name="Prio" id="Priorisierung">
				<option value="2" <?php if($ProjektAllgemein->Prio == 2) echo " selected "; ?>>Hoch</option>
				<option value="1" <?php if($ProjektAllgemein->Prio == 1) echo " selected "; ?>>Mittel</option>
				<option value="0" <?php if($ProjektAllgemein->Prio == 0) echo " selected "; ?>>Niedrig</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="Projektkategorie" class="col-sm-3 control-label">Projektkategorie</label>
		<div class="col-sm-9">
			<select class="form-control" name="Kategorie" id="Projektkategorie">
				<?php
					foreach ($kategorien as $kategorie) {
						echo "<option value='".$kategorie["ID"]."'";
						if($kategorie["ID"] == $ProjektAllgemein->Kategorie) echo " selected ";
						echo ">".$kategorie["Titel"]."</option>";
					}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="Hauptstrategie" class="col-sm-3 control-label">Hauptstrategie</label>
		<div class="col-sm-9">
			<select class="form-control" name="Strategie" id="Hauptstrategie">
				<?php
					foreach ($strategien as $strategie) {
						echo "<option value='".$strategie["ID"]."'";
						if($strategie["ID"] == $ProjektAllgemein->Strategie) echo " selected ";
						echo ">".$strategie["Bezeichnung"]."</option>";
					}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="Projektbeschreibung" class="col-sm-3 control-label">Projektbeschreibung</label>
		<div class="col-sm-9">
			<textarea class="form-control" rows="3" name="Beschreibung" id="Projektbeschreibung"><?php echo $ProjektAllgemein->Beschreibung; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-2">
			<button type="submit" class="btn btn-default" style="margin-left: 36px;">
				Speichern
			</button>
		</div>
	</div>
</form>