<div class="row">
	<div class="col-sm-offset-1 col-sm-11">
		<b>Unterstützte Strategien</b>
		<div class="form-group">
			<?php
			foreach ($strategien as $strategie) {
				echo '<div class="checkbox"><label><input type="checkbox" name="' . $strategie["ID"] . '" value="' . $strategie["ID"] . '" ';
				if ($ProjektAllgemein -> Strategie == $strategie["ID"]) {
					echo " checked ";
				} else {
					foreach ($ProjektStrategien as $pStrategie) {
						if ($pStrategie["ID"] == $strategie["ID"]) {
							echo " checked ";
							break;
						}
					}
				}
				echo 'disabled >' . $strategie["Bezeichnung"] . '</label></div>';
			}
			?>
		</div>
	</div>
</div>