<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>projekte/speichereKosten/<?php echo $ProjektAllgemein -> ID; ?>">
	<div class="form-group">
		<div class="col-sm-offset-1 col-sm-11">
		<table class="table table-striped">
			<tr>
				<th width="20%">Jahre</th><th style="text-align: center;">1</th><th style="text-align: center;">2</th><th style="text-align: center;">3</th>
			</tr>
			<tr>
				<td><b>Geplante Kosten (€)</b></td>
				<td id="gkj1" style="text-align: center;"></td>
				<td id="gkj2" style="text-align: center;"></td>
				<td id="gkj3" style="text-align: center;"></td>
			</tr>
			<tr>
				<td><b>Intern (€)</b></td>
				<td>
				<input type="number" name="Intern1" id="Intern1" class="form-control" value="<?php echo $ProjektKosten -> Intern1; ?>" />
				</td>
				<td>
				<input type="number" name="Intern2" id="Intern2" class="form-control" value="<?php echo $ProjektKosten -> Intern2; ?>" />
				</td>
				<td>
				<input type="number" name="Intern3" id="Intern3" class="form-control" value="<?php echo $ProjektKosten -> Intern3; ?>" />
				</td>
			</tr>
			<tr>
				<td><b>Extern (€)</b></td>
				<td>
				<input type="number" name="Extern1" id="Extern1" class="form-control" value="<?php echo $ProjektKosten -> Extern1; ?>" />
				</td>
				<td>
				<input type="number" name="Extern2" id="Extern2" class="form-control" value="<?php echo $ProjektKosten -> Extern2; ?>" />
				</td>
				<td>
				<input type="number" name="Extern3" id="Extern3" class="form-control" value="<?php echo $ProjektKosten -> Extern3; ?>" />
				</td>
			</tr>
			<tr>
				<td><b>Sonstige (€)</b></td>
				<td>
				<input type="number" name="Sonstig1" id="Sonstig1" class="form-control" value="<?php echo $ProjektKosten -> Sonstig1; ?>" />
				</td>
				<td>
				<input type="number" name="Sonstig2" id="Sonstig2" class="form-control" value="<?php echo $ProjektKosten -> Sonstig2; ?>" />
				</td>
				<td>
				<input type="number" name="Sonstig3" id="Sonstig3" class="form-control" value="<?php echo $ProjektKosten -> Sonstig3; ?>" />
				</td>
			</tr>
		</table>
		</div>
	</div>
	<div class="form-group">
		<label for="KostNFertig" class="col-sm-offset-1 col-sm-3 control-label" style="text-align: left;">Kosten nach Fertigstellung</label>
		<div class="col-sm-8">
			<input type="number" class="form-control" name="KostNFertig" id="KostNFertig" placeholder="in € pro Jahr" value="<?php echo $ProjektKosten->KostNFertig; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="EintrittNutzen" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Eintritt des Nutzes ab Fertigstellung des Projekts</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" name="EintrittNutzen" id="EintrittNutzen" placeholder="in Monaten" value="<?php echo $ProjektKosten->EintrittNutzen; ?>">
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