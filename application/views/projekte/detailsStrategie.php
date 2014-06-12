<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>projekte/speichereStrategie/<?php echo $ProjektAllgemein -> ID; ?>">
	<div class="col-sm-offset-1 col-sm-11">
		<b>Bitte wählen Sie aus, zu welchen Strategien dieses Projekt beiträgt</b>
		<div class="form-group">
			<?php
			foreach ($strategien as $strategie) {
				echo '<div class="checkbox"><label><input type="checkbox" name="' . $strategie["ID"] . '" value="' . $strategie["ID"] . '" ';
				if ($ProjektAllgemein -> Strategie == $strategie["ID"]) {
					echo " checked disabled ";
				} else {
					foreach ($ProjektStrategien as $pStrategie) {
						if ($pStrategie["ID"] == $strategie["ID"]){
							echo " checked ";
							break;
						}
					}
				}
				echo '>' . $strategie["Bezeichnung"] . '</label></div>';
			}
			?>
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