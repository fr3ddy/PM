<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>projekte/speichereAmort/<?php echo $ProjektAllgemein -> ID; ?>">
	<div class="form-group">
		<label for="Restwert" class="col-sm-offset-1 col-sm-6 control-label" style="text-align: left;">Restwert am Ende der gewöhnlichen Nutzungsdauer (in €)</label>
		<div class="col-sm-5">
			<input type="number" class="form-control" name="Restwert" id="Restwert" placeholder="in €" value="<?php echo $ProjektAmort->Restwert; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="Gewinn" class="col-sm-offset-1 col-sm-6 control-label" style="text-align: left;">Jährlicher Gewinn nach Zins/oder Kostenersparnis (in €)</label>
		<div class="col-sm-5">
			<input type="number" class="form-control" name="Gewinn" id="Gewinn" placeholder="in €" value="<?php echo $ProjektAmort->Gewinn; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="Abschreibung" class="col-sm-offset-1 col-sm-4 control-label" style="text-align: left;">Jährlicher Abschreibungsbetrag (in €)</label>
		<div class="col-sm-7">
			<input type="number" class="form-control" name="Abschreibung" id="Abschreibung" placeholder="in €" value="<?php echo $ProjektAmort->Abschreibung; ?>">
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