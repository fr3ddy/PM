	<div class="row"><div class="col-sm-offset-7 col-sm-5"><div style="float: left; font-size: 10px;">gering</div><div style="float: right; font-size: 10px;">hoch</div></div></div>
	<div class="col-sm-offset-1">Budgetüberschreitung</div>
	<div class="row">
		<label for="BudgetWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="BudgetWirk" id="BudgetWirk" disabled disabled value="<?php echo $ProjektRisiken->BudgetWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="BudgetEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="BudgetEintritt" id="BudgetEintritt" disabled disabled value="<?php echo $ProjektRisiken->BudgetEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Stakeholder externe Mitarbeiter</div>
	<div class="row">
		<label for="ExtMitWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="ExtMitWirk" id="ExtMitWirk" disabled value="<?php echo $ProjektRisiken->ExtMitWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="ExtMitEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="ExtMitEintritt" id="ExtMitEintritt" disabled value="<?php echo $ProjektRisiken->ExtMitEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Stakeholder interne Mitarbeiter</div>
	<div class="row">
		<label for="IntMitWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="IntMitWirk" id="IntMitWirk" disabled value="<?php echo $ProjektRisiken->IntMitWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="IntMitEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="IntMitEintritt" id="IntMitEintritt" disabled value="<?php echo $ProjektRisiken->IntMitEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Stakeholder Auftraggeber</div>
	<div class="row">
		<label for="AufGebWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="AufGebWirk" id="AufGebWirk" disabled value="<?php echo $ProjektRisiken->AufGebWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="AufGebEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="AufGebEintritt" id="AufGebEintritt" disabled value="<?php echo $ProjektRisiken->AufGebEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Stakeholder Mitarbeiter des Kunden</div>
	<div class="row">
		<label for="MitKundWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="MitKundWirk" id="MitKundWirk" disabled value="<?php echo $ProjektRisiken->MitKundWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="MitKundEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="MitKundEintritt" id="MitKundEintritt" disabled value="<?php echo $ProjektRisiken->MitKundEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Stakeholder Führungsebene des Kunden</div>
	<div class="row">
		<label for="GLKundWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="GLKundWirk" id="GLKundWirk" disabled value="<?php echo $ProjektRisiken->GLKundWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="GLKundEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="GLKundEintritt" id="GLKundEintritt" disabled value="<?php echo $ProjektRisiken->GLKundEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Krankheit/Schwangerschaft</div>
	<div class="row">
		<label for="AusfallWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="AusfallWirk" id="AusfallWirk" disabled value="<?php echo $ProjektRisiken->AusfallWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="AusfallWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="AusfallWirk" id="AusfallWirk" disabled value="<?php echo $ProjektRisiken->AusfallWirk; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Verzögerung / Termine werden nicht eingehalten</div>
	<div class="row">
		<label for="VerzoegWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="VerzoegWirk" id="VerzoegWirk" disabled value="<?php echo $ProjektRisiken->VerzoegWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="VerzoegEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="VerzoegEintritt" id="VerzoegEintritt" disabled value="<?php echo $ProjektRisiken->VerzoegEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Technisch</div>
	<div class="row">
		<label for="TechWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="TechWirk" id="TechWirk" disabled value="<?php echo $ProjektRisiken->TechWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="TechEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="TechEintritt" id="TechEintritt" disabled value="<?php echo $ProjektRisiken->TechEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Wirtschaftlich</div>
	<div class="row">
		<label for="WirtschaftWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="WirtschaftWirk" id="WirtschaftWirk" disabled value="<?php echo $ProjektRisiken->WirtschaftWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="WirtschaftEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="WirtschaftEintritt" id="WirtschaftEintritt" disabled value="<?php echo $ProjektRisiken->WirtschaftEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Kompetenz nicht vorhanden</div>
	<div class="row">
		<label for="KompNichDaWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="KompNichDaWirk" id="KompNichDaWirk" disabled value="<?php echo $ProjektRisiken->KompNichDaWirk; ?>">
		</div>
	</div>
	<div class="row">
		<label for="KompNichDaEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="KompNichDaEintritt" id="KompNichDaEintritt" disabled value="<?php echo $ProjektRisiken->KompNichDaEintritt; ?>">
		</div>
	</div>