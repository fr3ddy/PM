<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>projekte/speichereQualNutzen/<?php echo $ProjektAllgemein -> ID; ?>">
	<div class="form-group" style="margin-bottom: 0px; font-size: 10px;">
		<div class="col-sm-offset-6"><div style="float: left;">stark verschlechtert</div><div style="float: right;">stark verbessert</div></div>
	</div>
	<div class="form-group">
		<label for="InfoMitarbeiter" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Informationsstand der Mitarbeiter</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="InfoMitarbeiter" id="InfoMitarbeiter" value="<?php echo $NutzenQualitativ->InfoMitarbeiter; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="MotivationMitarbeiter" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Motivation der Mitarbeiter</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="MotivationMitarbeiter" id="MotivationMitarbeiter" value="<?php echo $NutzenQualitativ->MotivationMitarbeiter; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="ZugriffInfo" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Zugriffszeit auf Informationen für Mitarbeiter</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="ZugriffInfo" id="ZugriffInfo" value="<?php echo $NutzenQualitativ->ZugriffInfo; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="AnzFehlent" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Anzahl der Fehlentscheidungen</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="AnzFehlent" id="AnzFehlent" value="<?php echo $NutzenQualitativ->AnzFehlent; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="ZusamArbeit" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Zusammenarbeit der Mitarbeiter</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="ZusamArbeit" id="ZusamArbeit" value="<?php echo $NutzenQualitativ->ZusamArbeit; ?>" />
		</div>
	</div>
	<br/>
	<div class="form-group">
		<label for="ProduktivitaetKunde" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Produktivität des Kunden</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="ProduktivitaetKunde" id="ProduktivitaetKunde" value="<?php echo $NutzenQualitativ->ProduktivitaetKunde; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="AnzReklam" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Anzahl der Reklamationen</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="AnzReklam" id="AnzReklam" value="<?php echo $NutzenQualitativ->AnzReklam; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="KundService" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Kundenservice</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="KundService" id="KundService" value="<?php echo $NutzenQualitativ->KundService; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="KundBindung" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Kundenbindung</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="KundBindung" id="KundBindung" value="<?php echo $NutzenQualitativ->KundBindung; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="VertriebUnter" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Vertriebsunterstützung</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="VertriebUnter" id="VertriebUnter" value="<?php echo $NutzenQualitativ->VertriebUnter; ?>" />
		</div>
	</div>
	<br/>
	<div class="form-group">
		<label for="VerstandProzess" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Nachvollziehbarkeit der Prozessabläufe</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="VerstandProzess" id="VerstandProzess" value="<?php echo $NutzenQualitativ->VerstandProzess; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="ProzessGestalt" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Prozessgestaltungsmöglichkeiten</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="ProzessGestalt" id="ProzessGestalt" value="<?php echo $NutzenQualitativ->ProzessGestalt; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="ErgebnisPruef" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Überprüfung der Prozessereignisse</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="ErgebnisPruef" id="ErgebnisPruef" value="<?php echo $NutzenQualitativ->ErgebnisPruef; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="Simulation" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Simulationsmöglichkeiten</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="Simulation" id="Simulation" value="<?php echo $NutzenQualitativ->Simulation; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="ProzessUeber" class="col-sm-offset-1 col-sm-5 control-label" style="text-align: left;">Realisierung übergreifender Prozesse</label>
		<div class="col-sm-6">
			<input type="range" min="-2" max="2" step="1" name="ProzessUeber" id="ProzessUeber" value="<?php echo $NutzenQualitativ->ProzessUeber; ?>" />
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