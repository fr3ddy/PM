	<div class="row">
		<label for="BeteilMit" class="col-sm-offset-1 col-sm-4 control-label" style="text-align: left;">Beteiligte Mitarbeiter</label>
		<div class="col-sm-7">
			<output for="BeteilMit"></output>
			<input type="range" name="BeteilMit" id="BeteilMit" min="0" max="<?php echo $anzMitarbeiter -> AnzMitarbeiter; ?>" disabled value="<?php echo $ProjektKomplex -> BeteilMit; ?>">
			<div style="float: left;">0</div><div style="float: right;"><?php echo $anzMitarbeiter -> AnzMitarbeiter; ?></div>
		</div>
	</div>
	<br/>
	<div class="row">
		<label for="BeteilOrgEin" class="col-sm-offset-1 col-sm-4 control-label" style="text-align: left;">Beteiligte Organisationseinheiten</label>
		<div class="col-sm-7">
			<?php echo $ProjektKomplex -> BeteilOrgEin; ?>
		</div>
	</div>
	<br/>
	<div class="row">
		<label for="KompTech" class="col-sm-offset-1 col-sm-4 control-label" style="text-align: left;">Technische Komplexität</label>
		<div class="col-sm-7">
			<input type="range" name="KompTech" id="KompTech" min="0" max="5" step="1" disabled value="<?php echo $ProjektKomplex -> KompTech; ?>">
			<div style="float: left;">nicht anspruchsvoll</div><div style="float: right;">sehr anspruchsvoll</div>
		</div>
	</div>
	<br/>
	<div class="row">
		<label for="KompInno" class="col-sm-offset-1 col-sm-4 control-label" style="text-align: left;">Inovativitäts Komplexität</label>
		<div class="col-sm-7">
			<input type="range" name="KompInno" id="KompInno" min="0" max="5" step="1" disabled value="<?php echo $ProjektKomplex -> KompInno; ?>">
			<div style="float: left;">nicht anspruchsvoll</div><div style="float: right;">sehr anspruchsvoll</div>
		</div>
	</div>