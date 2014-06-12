<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>projekte/speichereKomplexitaet/<?php echo $ProjektAllgemein -> ID; ?>">
	<div class="form-group">
		<label for="BeteilMit" class="col-sm-offset-1 col-sm-4 control-label" style="text-align: left;">Beteiligte Mitarbeiter</label>
		<div class="col-sm-7">
			<input type="range" name="BeteilMit" id="BeteilMit" min="0" max="<?php echo $anzMitarbeiter->AnzMitarbeiter; ?>" value="<?php echo $ProjektKomplex->BeteilMit; ?>">
			<div style="float: left;">0</div><div style="float: right;"><?php echo $anzMitarbeiter->AnzMitarbeiter; ?></div>
		</div>
	</div>
	<div class="form-group">
		<label for="BeteilOrgEin" class="col-sm-offset-1 col-sm-4 control-label" style="text-align: left;">Beteiligte Organisationseinheiten</label>
		<div class="col-sm-7">
			<input type="number" class="form-control" name="BeteilOrgEin" id="BeteilOrgEin" value="<?php echo $ProjektKomplex->BeteilOrgEin; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="KompTech" class="col-sm-offset-1 col-sm-4 control-label" style="text-align: left;">Technische Komplexität</label>
		<div class="col-sm-7">
			<input type="range" name="KompTech" id="KompTech" min="0" max="5" step="1" value="<?php echo $ProjektKomplex->KompTech; ?>">
			<div style="float: left;">nicht anspruchsvoll</div><div style="float: right;">sehr anspruchsvoll</div>
		</div>
	</div>
	<div class="form-group">
		<label for="KompInno" class="col-sm-offset-1 col-sm-4 control-label" style="text-align: left;">Inovativitäts Komplexität</label>
		<div class="col-sm-7">
			<input type="range" name="KompInno" id="KompInno" min="0" max="5" step="1" value="<?php echo $ProjektKomplex->KompInno; ?>">
			<div style="float: left;">nicht anspruchsvoll</div><div style="float: right;">sehr anspruchsvoll</div>
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