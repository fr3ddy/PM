<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>projekte/speichereRisiken/<?php echo $ProjektAllgemein -> ID; ?>">
	<div class="row"><div class="col-sm-offset-7 col-sm-5"><div style="float: left; font-size: 10px;">gering</div><div style="float: right; font-size: 10px;">hoch</div></div></div>
	<div class="col-sm-offset-1">Budgetüberschreitung</div>
	<div class="form-group">
		<label for="BudgetWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="BudgetWirk" id="BudgetWirk" value="<?php echo $ProjektRisiken->BudgetWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="BudgetEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="BudgetEintritt" id="BudgetEintritt" value="<?php echo $ProjektRisiken->BudgetEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Stakeholder externe Mitarbeiter</div>
	<div class="form-group">
		<label for="ExtMitWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="ExtMitWirk" id="ExtMitWirk" value="<?php echo $ProjektRisiken->ExtMitWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="ExtMitEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="ExtMitEintritt" id="ExtMitEintritt" value="<?php echo $ProjektRisiken->ExtMitEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Stakeholder interne Mitarbeiter</div>
	<div class="form-group">
		<label for="IntMitWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="IntMitWirk" id="IntMitWirk" value="<?php echo $ProjektRisiken->IntMitWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="IntMitEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="IntMitEintritt" id="IntMitEintritt" value="<?php echo $ProjektRisiken->IntMitEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Stakeholder Auftraggeber</div>
	<div class="form-group">
		<label for="AufGebWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="AufGebWirk" id="AufGebWirk" value="<?php echo $ProjektRisiken->AufGebWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="AufGebEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="AufGebEintritt" id="AufGebEintritt" value="<?php echo $ProjektRisiken->AufGebEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Stakeholder Mitarbeiter des Kunden</div>
	<div class="form-group">
		<label for="MitKundWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="MitKundWirk" id="MitKundWirk" value="<?php echo $ProjektRisiken->MitKundWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="MitKundEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="MitKundEintritt" id="MitKundEintritt" value="<?php echo $ProjektRisiken->MitKundEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Stakeholder Führungsebene des Kunden</div>
	<div class="form-group">
		<label for="GLKundWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="GLKundWirk" id="GLKundWirk" value="<?php echo $ProjektRisiken->GLKundWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="GLKundEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="GLKundEintritt" id="GLKundEintritt" value="<?php echo $ProjektRisiken->GLKundEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Krankheit/Schwangerschaft</div>
	<div class="form-group">
		<label for="AusfallWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="AusfallWirk" id="AusfallWirk" value="<?php echo $ProjektRisiken->AusfallWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="AusfallWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="AusfallWirk" id="AusfallWirk" value="<?php echo $ProjektRisiken->AusfallWirk; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Verzögerung / Termine werden nicht eingehalten</div>
	<div class="form-group">
		<label for="VerzoegWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="VerzoegWirk" id="VerzoegWirk" value="<?php echo $ProjektRisiken->VerzoegWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="VerzoegEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="VerzoegEintritt" id="VerzoegEintritt" value="<?php echo $ProjektRisiken->VerzoegEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Technisch</div>
	<div class="form-group">
		<label for="TechWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="TechWirk" id="TechWirk" value="<?php echo $ProjektRisiken->TechWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="TechEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="TechEintritt" id="TechEintritt" value="<?php echo $ProjektRisiken->TechEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Wirtschaftlich</div>
	<div class="form-group">
		<label for="WirtschaftWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="WirtschaftWirk" id="WirtschaftWirk" value="<?php echo $ProjektRisiken->WirtschaftWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="WirtschaftEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="WirtschaftEintritt" id="WirtschaftEintritt" value="<?php echo $ProjektRisiken->WirtschaftEintritt; ?>">
		</div>
	</div>
	<div class="col-sm-offset-1">Kompetenz nicht vorhanden</div>
	<div class="form-group">
		<label for="KompNichDaWirk" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Auswirkung</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="KompNichDaWirk" id="KompNichDaWirk" value="<?php echo $ProjektRisiken->KompNichDaWirk; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="KompNichDaEintritt" class="col-sm-offset-2 col-sm-5 control-label" style="text-align: left;">Eintrittswarscheinlichkeit</label>
		<div class="col-sm-5">
			<input type="range" min="1" max="5" step="1" name="KompNichDaEintritt" id="KompNichDaEintritt" value="<?php echo $ProjektRisiken->KompNichDaEintritt; ?>">
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