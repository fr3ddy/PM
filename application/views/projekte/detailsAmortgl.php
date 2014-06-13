<div class="row">
	<label for="Restwert" class="col-sm-offset-1 col-sm-6 control-label" style="text-align: left;">Amortisationsdauer</label>
	<div class="col-sm-5">
		<?php echo $ProjektAmort -> Amortisationsdauer; ?>
	</div>
</div>
<br/>
<div class="row">
	<label for="Restwert" class="col-sm-offset-1 col-sm-6 control-label" style="text-align: left;">Restwert am Ende der gewöhnlichen Nutzungsdauer</label>
	<div class="col-sm-5">
		<?php echo $ProjektAmort -> Restwert; ?>
		€
	</div>
</div>
<br/>
<div class="row">
	<label for="Gewinn" class="col-sm-offset-1 col-sm-6 control-label" style="text-align: left;">Jährlicher Gewinn nach Zins/oder Kostenersparnis</label>
	<div class="col-sm-5">
		<?php echo $ProjektAmort -> Gewinn; ?>
		€
	</div>
</div>
<br/>
<div class="row">
	<label for="Abschreibung" class="col-sm-offset-1 col-sm-6 control-label" style="text-align: left;">Jährlicher Abschreibungsbetrag</label>
	<div class="col-sm-5">
		<?php echo $ProjektAmort -> Abschreibung; ?>
		€
	</div>
</div>