<form method="post" action="<?php echo base_url(); ?>admin/saveKonfig">
<div class="row">
	<div class="col-xs-offset-4 col-xs-4" style="text-align: center;">
		Gut
	</div>
	<div class="col-xs-4" style="text-align: center;">
		Schlecht
	</div>
</div>
<div class="row">
	<div class="col-xs-4" style="text-align: right;">
		Kosten Pro Monat:
	</div>
	<div class="col-xs-4">
		<input type="text" class="form-control" name="KpMGut" value="<?php echo $konfig -> KpMGut; ?>"/>
	</div>
	<div class="col-xs-4">
		<input type="text" class="form-control" name="KpMSchlecht" value="<?php echo $konfig -> KpMSchlecht; ?>"/>
	</div>
</div>
<br/>
<br/>
<div class="row">
	<div class="col-xs-4" style="text-align: right;">
		Amortisationsdauer in Monaten:
	</div>
	<div class="col-xs-4">
		<input type="text" class="form-control" name="AmortGut" value="<?php echo $konfig -> AmortGut; ?>"/>
	</div>
	<div class="col-xs-4">
		<input type="text" class="form-control" name="AmortSchlecht" value="<?php echo $konfig -> AmortSchlecht; ?>"/>
	</div>
</div>
<br/>
<br/>
<div class="row">
	<div class="col-xs-4" style="text-align: right;">
		kalkulatorischer Zinssatz (in %):
	</div>
	<div class="col-xs-8">
		<input type="text" class="form-control" name="KalkZins" value="<?php echo $konfig -> KalkZins; ?>"/>
	</div>
</div>
<br/>
<br/>
<div class="row">
	<div class="col-xs-4" style="text-align: right;">
		Anzahl Mitarbeiter im Unternehmen:
	</div>
	<div class="col-xs-8">
		<input type="text" class="form-control" name="AnzMitarbeiter" value="<?php echo $konfig -> AnzMitarbeiter; ?>"/>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-xs-4" style="text-align: right;">
		Verfügbare Mitarbeiter:
	</div>
	<div class="col-xs-8">
		<input type="text" class="form-control" name="AnzVerfuegMitarbeiter" value="<?php echo $konfig -> AnzVerfuegMitarbeiter; ?>"/>
	</div>
</div>
<br/>
<br/>
<div class="row">
	<div class="col-xs-4" style="text-align: right;">
		Gesamtbudget für Projekte:
	</div>
	<div class="col-xs-8">
		<input type="text" class="form-control" name="Budget" value="<?php echo $konfig -> Budget; ?>"/>
	</div>
</div>
<br/>
<br/>
<br/>
<div class="row">
	<div class="col-xs-4" style="text-align: right;">
		Strategien
	</div>
	<div class="col-xs-8">
		<?php
			foreach ($strategien as $strategie) {
				echo '<div class="input-group"><input type="text" class="form-control" name="strategie-'.$strategie["ID"].'" value="'.$strategie["Bezeichnung"].'" /><span class="input-group-addon glyphicon glyphicon-remove"></span></div>';
			}
		?>
		<div class="input-group"><input class="form-control" id="erstelleNeueStrategie" type="text" placeholder="Hier neue Strategie eingeben" /><span class="input-group-addon glyphicon glyphicon-plus"></span></div>
	</div>
</div>
<br/>
<br/>
<br/>
<div class="row">
	<div class="col-xs-offset-4 col-xs-8">
		<small>Bitte gewichten Sie nachfolgend die Kategorien. Dies beeinflusst die Bewertung der Projekte und beeinflusst den berechneten Score eiens Projekts.</small>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-xs-4">
		Kosten/Dauer:
	</div>
	<div class="col-xs-8">
		<input type="range" min="0" max="100" name="GKostenDauer" id="GKostenDauer" class="gewichtet" value="<?php echo $konfig -> GKostenDauer; ?>" />
		<div class="row"><div class="col-xs-2">0 %</div><div class="col-xs-offset-8 col-xs-2" style="text-align: right;">100 %</div></div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-xs-4">
		Kapitalwertrate:
	</div>
	<div class="col-xs-8">
		<input type="range" min="0" max="100" name="GKapitalwertrate" id="GKapitalwertrate" class="gewichtet" value="<?php echo $konfig -> GKapitalwertrate; ?>" />
		<div class="row"><div class="col-xs-2">0 %</div><div class="col-xs-offset-8 col-xs-2" style="text-align: right;">100 %</div></div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-xs-4">
		Amortisationsrate:
	</div>
	<div class="col-xs-8">
		<input type="range" min="0" max="100" name="GAmort" id="GAmort" class="gewichtet" value="<?php echo $konfig -> GAmort; ?>" />
		<div class="row"><div class="col-xs-2">0 %</div><div class="col-xs-offset-8 col-xs-2" style="text-align: right;">100 %</div></div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-xs-4">
		Qualitativer Nutzen:
	</div>
	<div class="col-xs-8">
		<input type="range" min="0" max="100" name="GQualitativerNutzen" id="GQualitativerNutzen" class="gewichtet" value="<?php echo $konfig -> GQualitativerNutzen; ?>" />
		<div class="row"><div class="col-xs-2">0 %</div><div class="col-xs-offset-8 col-xs-2" style="text-align: right;">100 %</div></div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-xs-4">
		Risiken:
	</div>
	<div class="col-xs-8">
		<input type="range" min="0" max="100" name="GRisiken" id="GRisiken" class="gewichtet" value="<?php echo $konfig -> GRisiken; ?>" />
		<div class="row"><div class="col-xs-2">0 %</div><div class="col-xs-offset-8 col-xs-2" style="text-align: right;">100 %</div></div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-xs-4">
		Strategiebeitrag:
	</div>
	<div class="col-xs-8">
		<input type="range" min="0" max="100" name="GStrategie" id="GStrategie" class="gewichtet" value="<?php echo $konfig -> GStrategie; ?>" />
		<div class="row"><div class="col-xs-2">0 %</div><div class="col-xs-offset-8 col-xs-2" style="text-align: right;">100 %</div></div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-xs-4">
		Komplexität:
	</div>
	<div class="col-xs-8">
		<input type="range" min="0" max="100" name="GKomplex" id="GKomplex" class="gewichtet" value="<?php echo $konfig -> GKomplex; ?>" />
		<div class="row"><div class="col-xs-2">0 %</div><div class="col-xs-offset-8 col-xs-2" style="text-align: right;">100 %</div></div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-xs-4">
		Art des Geldnutzens:
	</div>
	<div class="col-xs-8">
		<input type="range" min="0" max="100" name="GArtGeldNutzen" id="GArtGeldNutzen" class="gewichtet" value="<?php echo $konfig -> GArtGeldNutzen; ?>" />
		<div class="row"><div class="col-xs-2">0 %</div><div class="col-xs-offset-8 col-xs-2" style="text-align: right;">100 %</div></div>
	</div>
</div>
<div class="row">
	<div class="col-xs-4" style="font-size: 12px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kosteneinsparend:
	</div>
	<div class="col-xs-8">
		<input type="range" min="0" max="100" name="GKostEinsparend" id="GKostEinsparend" class="gnutzen" value="<?php echo $konfig -> GKostEinsparend; ?>" />
		<div class="row"><div class="col-xs-2">0 %</div><div class="col-xs-offset-8 col-xs-2" style="text-align: right;">100 %</div></div>
	</div>
</div>
<div class="row">
	<div class="col-xs-4" style="font-size: 12px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Umsatzgenerierend:
	</div>
	<div class="col-xs-8">
		<input type="range" min="0" max="100" name="GUmsatzGener" id="GUmsatzGener" class="gnutzen" value="<?php echo $konfig -> GUmsatzGener; ?>" />
		<div class="row"><div class="col-xs-2">0 %</div><div class="col-xs-offset-8 col-xs-2" style="text-align: right;">100 %</div></div>
	</div>
</div>
<br/><br/>
<div class="row"><div class="col-xs-offset-4 col-xs-8"><input type="SUBMIT" value="Speichern" class="btn btn-default" /></div></div>
</form>
