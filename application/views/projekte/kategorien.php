<table class="table table-hover">
	<tr>
		<th>Kategorie</th>
		<?php
		foreach ($kategorien as $kategorie) {
			echo "<th>" . $kategorie['Kategoriesinformationen']['Kategoriename'] . "</th>";
		}
		?>
	</tr>
	<tr>
		<td></td>
		<?php
		foreach ($kategorien as $kategorie) {
			echo "<td>";
			foreach ($kategorie["Projekte"] as $projekt) {
				echo "<a style='color: #333;' href='" . base_url() . "projekte/details/" . $projekt["ID"] . "'>" . $projekt["Titel"] . "</a> <a style='color: #333;' href='" . base_url() . "projekte/loescheProjektAusPlan/bereiche/" . $projekt["ID"] . "'><span class='glyphicon glyphicon-remove'></span><br/>";
			}
			echo "</td>";
		}
		?>
	</tr>
	<tr>
		<td> Kosten / Gewinn </td>
		<?php
		foreach ($kategorien as $kategorie) {
			echo "<td>" . $kategorie['Kategoriesinformationen']["Kosten"] . "€ / " . $kategorie['Kategoriesinformationen']["Gewinn"] . "€</td>";
		}
		?>
	</tr>
</table>