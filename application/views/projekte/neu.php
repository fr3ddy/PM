<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>projekte/einreichen">
	<div class="form-group">
		<label for="Projekttitel" class="col-sm-3 control-label">Projekttitel</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="Titel" id="Projekttitel" placeholder="Projekttitel">
		</div>
	</div>
	<div class="form-group">
		<label for="Projektdauer" class="col-sm-3 control-label">Projektdauer in Monaten</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="Dauer" id="Projektdauer" placeholder="Projektdauer in Monaten">
		</div>
	</div>
	<div class="form-group">
		<label for="Projektkategorie" class="col-sm-3 control-label">Projektkategorie</label>
		<div class="col-sm-9">
			<select class="form-control" name="Kategorie" id="Projektkategorie"><option>Bugfix ...</option></select>
		</div>
	</div>
	<div class="form-group">
		<label for="Hauptstrategie" class="col-sm-3 control-label">Hauptstrategie</label>
		<div class="col-sm-9">
			<select class="form-control" name="Strategie" id="Hauptstrategie">
				<?php
					foreach ($hauptstrategien as $hauptstrat) {
						echo "<option value='".$hauptstrat["ID"]."'>".$hauptstrat["Bezeichnung"]."</option>";
					}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="Projektbeschreibung" class="col-sm-3 control-label">Projektbeschreibung</label>
		<div class="col-sm-9">
			<textarea class="form-control" rows="3" name="Beschreibung" id="Projektbeschreibung"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-2">
			<button type="submit" class="btn btn-default" style="margin-left: 36px;">
				Einreichen
			</button>
		</div>
	</div>
</form>