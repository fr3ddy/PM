<div class="row">
	<label for="" class="col-sm-offset-1 col-sm-6 control-label" style="text-align: left;">Art des Geldnutzens</label>
	<div class="col-sm-5">
		<div class="checkbox">
			<label>
				<input type="checkbox" name="NutzKosten" value="1" disabled <?php
				if ($ProjektSonstig -> NutzKosten == 1)
					echo " checked ";
 ?>
				>
				Kosteneinsparend</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="NutzUmsatz" value="1" disabled <?php
				if ($ProjektSonstig -> NutzUmsatz == 1)
					echo " checked ";
 ?>
				>
				Umsatzgenerierend</label>
		</div>
	</div>
</div>
<br/>
<div class="col-sm-offset-1 col-sm-6" style="text-align: left;">
	Kanibalisierung
</div>
<div class="row">
	<label for="KaniRate" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Kanibalisierungsrate</label>
	<div class="col-sm-5">
		<output for="KaniRate"></output>
		<input type="range" min="0" max="100" step="1" name="KaniRate" id="KaniRate" disabled value="<?php echo $ProjektSonstig -> KaniRate; ?>" />
		<div style="float: left;">
			0%
		</div>
		<div style="float: right;">
			100%
		</div>
	</div>
</div>
<br/>
<div class="row">
	<label for="Vorgaenger" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Vorhandenes Vorgängerprojekt</label>
	<div class="col-sm-5">
			<?php
			$flag = false;
			foreach ($projekte as $projekt) {
				if ($ProjektSonstig -> Vorgaenger == $projekt["ID"]){
					echo $projekt["Titel"];
					$flag = true;
				}
			}
			if(!$flag){
				echo "-- kein Vorgänger --";
			}
			?>
		</select>
	</div>
</div>
