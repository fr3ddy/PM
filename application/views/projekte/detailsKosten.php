<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>projekte/speichereKosten/<?php echo $ProjektAllgemein -> ID; ?>">
	<table class="table table-striped form-group">
		<tr>
			<th width="20%">Jahre</th><th style="text-align: center;">1</th><th style="text-align: center;">2</th><th style="text-align: center;">3</th>
		</tr>
		<tr>
			<td>Geplante Kosten (€)</td>
			<td id="gkj1" style="text-align: center;"></td>
			<td id="gkj2" style="text-align: center;"></td>
			<td id="gkj3" style="text-align: center;"></td>
		</tr>
		<tr>
			<td>Intern (€)</td>
			<td><input type="text" name="Intern1" id="Intern1" class="form-control" value="<?php echo $ProjektKosten->Intern1; ?>" /></td>
			<td><input type="text" name="Intern2" id="Intern2" class="form-control" value="<?php echo $ProjektKosten->Intern2; ?>" /></td>
			<td><input type="text" name="Intern3" id="Intern3" class="form-control" value="<?php echo $ProjektKosten->Intern3; ?>" /></td>
		</tr>
		<tr>
			<td>Extern (€)</td>
			<td><input type="text" name="Extern1" id="Extern1" class="form-control" value="<?php echo $ProjektKosten->Extern1; ?>" /></td>
			<td><input type="text" name="Extern2" id="Extern2" class="form-control" value="<?php echo $ProjektKosten->Extern2; ?>" /></td>
			<td><input type="text" name="Extern3" id="Extern3" class="form-control" value="<?php echo $ProjektKosten->Extern3; ?>" /></td>
		</tr>
		<tr>
			<td>Sonstige (€)</td>
			<td><input type="text" name="Sonstig1" id="Sonstig1" class="form-control" value="<?php echo $ProjektKosten->Sonstig1; ?>" /></td>
			<td><input type="text" name="Sonstig2" id="Sonstig2" class="form-control" value="<?php echo $ProjektKosten->Sonstig2; ?>" /></td>
			<td><input type="text" name="Sonstig3" id="Sonstig3" class="form-control" value="<?php echo $ProjektKosten->Sonstig3; ?>" /></td>
		</tr>
	</table>
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-2">
			<button type="submit" class="btn btn-default" style="margin-left: 36px;">
				Speichern
			</button>
		</div>
	</div>
</form>