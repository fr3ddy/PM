<div class="row">
	<label for="Projekttitel" class="col-sm-3 control-label">Projekttitel</label>
	<div class="col-sm-9">
		<?php echo $ProjektAllgemein -> Titel; ?>
	</div>
</div>
<br/>
<div class="row">
	<label for="Projektdauer" class="col-sm-3 control-label">Projektdauer in Monaten</label>
	<div class="col-sm-9">
		<?php echo $ProjektAllgemein -> Dauer; ?>
	</div>
</div>
<br/>
<div class="row">
	<label for="Priorisierung" class="col-sm-3 control-label">Priorisierung</label>
	<div class="col-sm-9">
		<?php
		if ($ProjektAllgemein -> Prio == 2)
			echo "Hoch";
		if ($ProjektAllgemein -> Prio == 1)
			echo "Mittel";
		if ($ProjektAllgemein -> Prio == 0)
			echo "Niedrig";
		?>
	</div>
</div>
<br/>
<div class="row">
	<label for="Projektkategorie" class="col-sm-3 control-label">Projektkategorie</label>
	<div class="col-sm-9">
			<?php
			foreach ($kategorien as $kategorie) {
				if ($kategorie["ID"] == $ProjektAllgemein -> Kategorie)
					echo $kategorie["Titel"];;
			}
			?>
		</select>
	</div>
</div>
<br/>
<div class="row">
	<label for="Hauptstrategie" class="col-sm-3 control-label">Hauptstrategie</label>
	<div class="col-sm-9">
			<?php
			foreach ($strategien as $strategie) {
				if ($strategie["ID"] == $ProjektAllgemein -> Strategie)
					echo $strategie["Bezeichnung"];
			}
			?>
	</div>
</div>
<br/>
<div class="row">
	<label for="Projektbeschreibung" class="col-sm-3 control-label">Projektbeschreibung</label>
	<div class="col-sm-9">
		<?php echo $ProjektAllgemein -> Beschreibung; ?>
	</div>
</div>