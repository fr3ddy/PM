<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>projekte/speichereSonstiges/<?php echo $ProjektAllgemein -> ID; ?>">
	<div class="form-group">
		<label for="" class="col-sm-offset-1 col-sm-6 control-label" style="text-align: left;">Art des Geldnutzens</label>
		<div class="col-sm-5">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="NutzKosten" value="1" <?php if($ProjektSonstig->NutzKosten == 1) echo " checked "; ?>>
					Kosteneinsparend</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="NutzUmsatz" value="1" <?php if($ProjektSonstig->NutzUmsatz == 1) echo " checked "; ?>>
					Umsatzgenerierend</label>
			</div>
		</div>
	</div>
	<div class="col-sm-offset-1 col-sm-6" style="text-align: left;">
		Kanibalisierung
	</div>
	<div class="form-group">
		<label for="KaniRate" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Kanibalisierungsrate</label>
		<div class="col-sm-5">
			<input type="range" min="0" max="100" step="1" name="KaniRate" id="KaniRate" value="<?php echo $ProjektSonstig -> KaniRate; ?>" />
			<div style="float: left;">0%</div><div style="float: right;">100%</div>
		</div>
	</div>
	<div class="form-group">
		<label for="Vorgaenger" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Vorhandenes Vorgängerprojekt</label>
		<div class="col-sm-5">
			<select  class="form-control" name="Vorgaenger" id="Vorgaenger">
				<option value="0">-- kein Vorgänger --</option>
				<?php
					foreach ($projekte as $projekt) {
						echo '<option value="'.$projekt["ID"].'"';
						if($ProjektSonstig -> Vorgaenger == $projekt["ID"]) echo " selected ";
						echo '>'.$projekt["Titel"].'</option>';
					}
				?>
			</select>
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