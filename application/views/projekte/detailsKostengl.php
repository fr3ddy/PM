<div class="row">
	<div class="col-sm-offset-1 col-sm-11">
		<table class="table table-striped">
			<tr>
				<th width="20%">Jahre</th><th style="text-align: center;">1</th><th style="text-align: center;">2</th><th style="text-align: center;">3</th>
			</tr>
			<tr>
				<td><b>Geplante Kosten</b></td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Intern1 + $ProjektKosten -> Intern2 + $ProjektKosten -> Intern3; ?> €</td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Extern1 + $ProjektKosten -> Extern2 + $ProjektKosten -> Extern3; ?> €</td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Sonstig1 + $ProjektKosten -> Sonstig2 + $ProjektKosten -> Sonstig3; ?> €</td>
			</tr>
			<tr>
				<td><b>Intern</b></td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Intern1; ?> €</td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Intern2; ?> €</td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Intern3; ?> €</td>
			</tr>
			<tr>
				<td><b>Extern</b></td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Extern1; ?> €</td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Extern2; ?> €</td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Extern3; ?> €</td>
			</tr>
			<tr>
				<td><b>Sonstige</b></td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Sonstig1; ?> €</td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Sonstig2; ?> €</td>
				<td style="text-align: center;"><?php echo $ProjektKosten -> Sonstig3; ?> €</td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<label for="KostNFertig" class="col-sm-offset-1 col-sm-3 control-label" style="text-align: left;">Kosten nach Fertigstellung:</label>
	<div class="col-sm-8">
		<?php echo $ProjektKosten -> KostNFertig; ?> €
	</div>
</div>
<div class="row">
	<label for="EintrittNutzen" class="col-sm-offset-1 col-sm-6 control-label" style="text-align: left;">Eintritt des Nutzes ab Fertigstellung des Projekts nach</label>
	<div class="col-sm-5">
		<?php echo $ProjektKosten -> EintrittNutzen; ?> Monate
	</div>
</div>