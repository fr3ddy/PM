<div width="200"
<form class="form-horizontal" role="form">
	<div class="form-group">
		<label for="Projekttitel" class="col-sm-3 control-label">Projekttitel</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="Projekttitel" id="Projekttitel" placeholder="Projekttitel">
		</div>
	</div>
	<div class="form-group">
		<label for="Projektdauer" class="col-sm-3 control-label">Projektdauer in Monaten</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="Projektdauer" id="Projektdauer" placeholder="Projektdauer in Monaten">
		</div>
	</div>
	<div class="form-group">
		<label for="Projektkategorie" class="col-sm-3 control-label">Projektkategorie</label>
		<div class="col-sm-9">
			<select class="form-control" name="Projektkategorie" id="Projektkategorie"><option>Bugfix ...</option></select>
		</div>
	</div>
	<div class="form-group">
		<label for="Hauptstrategie" class="col-sm-3 control-label">Hauptstrategie</label>
		<div class="col-sm-9">
			<select class="form-control" name="Hauptstrategie" id="Hauptstrategie">
				<?php
					foreach ($hauptstrategien as $hauptstrat) {
						echo "<option>".$hauptstrat."</option>";
					}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="Projektbeschreibung" class="col-sm-3 control-label">Projektbeschreibung</label>
		<div class="col-sm-9">
			<textarea class="form-control" rows="3" name="Projektbeschreibung" id="Projektbeschreibung"></textarea>
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