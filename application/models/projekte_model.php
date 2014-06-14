<?php

class Projekte_model extends CI_Model {

    function gibProjekte() {
        $i = 0;
        $data = array();
        if ($this -> session -> userdata['Rolle'] != 'Geschäftsleiter') {
            $this -> db -> select("* , ProjektAllgemein.ID as projektID , Kategorien.Titel as kat , ProjektAllgemein.Titel as projektTitel");
            $this -> db -> where("Bearbeiter", $this -> session -> userdata("BenutzerID"));
            $this -> db -> or_where("Owner", $this -> session -> userdata("BenutzerID"));
            $this -> db -> join('Benutzer', 'Benutzer.ID = ProjektAllgemein.Bearbeiter');
            $this -> db -> join("Kategorien", "Kategorien.ID = ProjektAllgemein.Kategorie");
            $query = $this -> db -> get("ProjektAllgemein");

            foreach ($query->result() as $row) {
                $data[$i]["ID"] = $row -> projektID;
                $data[$i]["Titel"] = $row -> projektTitel;
                $data[$i]["Dauer"] = $row -> Dauer;
                $data[$i]["Prio"] = $row -> Prio;
                $data[$i]["Kategorie"] = $row -> kat;
                $data[$i]["Strategie"] = $row -> Strategie;
                $data[$i]["Beschreibung"] = $row -> Beschreibung;
                $data[$i]["Bearbeiter"] = $row -> Benutzername;
                $data[$i]["Vorgeschlagen"] = 0;

                $i++;
            }

            if ($this -> session -> userdata['Rolle'] == 'PMO') {
                foreach ($data as $projekt) {
                    $this -> db -> where('ProjektID', $projekt["ID"]);
                    $query = $this -> db -> get('ProjektePMO');
                    if ($query -> num_rows() == 1) {
                        $projekt['Vorgeschlagen'] = 1;
                    }

                    $userQuery = $this -> db -> query('SELECT * FROM Benutzer WHERE Benutzername = "' . $row -> Benutzername . '"');
                    $userRow = $userQuery -> first_row();
                    $abtQuery = $this -> db -> query("SELECT * FROM Abteilungen WHERE ID = " . $userRow -> Abteilung);
                    $abtRow = $abtQuery -> first_row();

                    $projekt["Abteilung"] = $abtRow -> Abteilungsname;
                }
            }
        } else if ($this -> session -> userdata['Rolle'] == 'Geschäftsleiter') {
            $liste = $this -> db -> get("ProjektePMO");

            foreach ($liste->result() as $zeile) {
                $this -> db -> select("* , ProjektAllgemein.ID as projektID , Kategorien.Titel as kat , ProjektAllgemein.Titel as projektTitel");
                $this -> db -> where("ProjektAllgemein.ID", $zeile -> ProjektID);
                $this -> db -> join("Kategorien", "Kategorien.ID = ProjektAllgemein.Kategorie");
                $query = $this -> db -> get("ProjektAllgemein");
                foreach ($query->result() as $row) {
                    $data[$i]["ID"] = $row -> projektID;
                    $data[$i]["Titel"] = $row -> projektTitel;
                    $data[$i]["Dauer"] = $row -> Dauer;
                    $data[$i]["Prio"] = $row -> Prio;
                    $data[$i]["Kategorie"] = $row -> kat;
                    $data[$i]["Strategie"] = $row -> Strategie;
                    $data[$i]["Beschreibung"] = $row -> Beschreibung;

                    $userQuery = $this -> db -> query('SELECT * FROM Benutzer WHERE ID = "' . $row -> Owner . '"');
                    $userRow = $userQuery -> first_row();
                    $abtQuery = $this -> db -> query("SELECT * FROM Abteilungen WHERE ID = " . $userRow -> Abteilung);
                    $abtRow = $abtQuery -> first_row();

                    $data[$i]["Abteilung"] = $abtRow -> Abteilungsname;

                    $i++;
                }
            }

        }
        return $data;
    }

    function gibAlleProjektTitel() {
        $i = 0;
        $data = array();
        $query = $this -> db -> get('ProjektAllgemein');
        foreach ($query->result() as $row) {
            $data[$i]["ID"] = $row -> ID;
            $data[$i]["Titel"] = $row -> Titel;

            $i++;
        }
        return $data;
    }

    function erstelleProjekt($data) {
        $this -> db -> insert('ProjektAllgemein', $data);
        $projektid = $this -> db -> insert_id();
        //Suche Abteilungsleiter
        $this -> db -> where('ID', $this -> session -> userdata("Abteilung"));
        $query = $this -> db -> get('Abteilungen');
        $row = $query -> first_row();

        //Trage neuen Bearbeiter ein
        $data = array('Bearbeiter' => $row -> Abteilungsleiter, 'Owner' => $this -> session -> userdata('BenutzerID'));
        $this -> db -> where('ID', $projektid);
        $this -> db -> update('ProjektAllgemein', $data);

        //Erstelle die neuen Einträge in den anderen Tabellen !ID muss gleich sein wie in der Tab ProjektAllgemein
        $data = array('ID' => $projektid);
        $this -> db -> insert('ProjektAmort', $data);
        $this -> db -> insert('ProjektKomplex', $data);
        $this -> db -> insert('ProjektKosten', $data);
        $this -> db -> insert('ProjektRisiken', $data);
        $this -> db -> insert('ProjektSonstig', $data);
        $this -> db -> insert('NutzenQualitativ', $data);
    }

    function loescheProjekt($ID) {
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektAllgemein');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektAmort');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektKomplex');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektKosten');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektRisiken');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektSonstig');
        $this -> db -> where('IDProjekt', $ID);
        $this -> db -> delete('ProjektStrategien');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('NutzenQualitativ');
    }

    function reicheProjektWeiter($ProjektID) {
        //Vorgesetzen des Users suchen
        if ($this -> session -> userdata['Rolle'] == "Abteilungsleiter") {
            $this -> db -> select('Bereiche.Bereichsleiter');
            $this -> db -> join('Abteilungen', 'Abteilungen.ID = Benutzer.Abteilung');
            $this -> db -> join('Bereiche', 'Bereiche.ID = Abteilungen.Bereich');
            $this -> db -> where('Benutzer.ID', $this -> session -> userdata['BenutzerID']);
            $query = $this -> db -> get('Benutzer');

            $row = $query -> first_row();

            $query = $this -> db -> query("UPDATE ProjektAllgemein SET Bearbeiter = " . $row -> Bereichsleiter . " WHERE ID = " . $ProjektID);

            if ($query == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else if ($this -> session -> userdata['Rolle'] == "Bereichsleiter") {
            $data = array();
            $i = 0;
            $query = $this -> db -> query("SELECT Benutzer.ID as BenutzerID FROM Benutzer, Abteilungen WHERE Benutzer.Abteilung = 0 AND Benutzer.Abteilung = Abteilungen.ID AND Benutzer.ID != Abteilungen.Abteilungsleiter");
            foreach ($query->result() as $row) {
                $this -> db -> where("Bereichsleiter", $row -> BenutzerID);
                $abfrage = $this -> db -> get("Bereiche");
                if ($abfrage -> num_rows() == 0) {
                    $data[$i] = $row -> BenutzerID;
                    $i++;
                }
            }

            foreach ($data as $ID) {
                $query = $this -> db -> query("UPDATE ProjektAllgemein SET Bearbeiter = " . $ID . " WHERE ID = " . $ProjektID);
            }
        } else if ($this -> session -> userdata['Rolle'] == "PMO") {
            $data = array("ProjektID" => $ProjektID);
            $this -> db -> insert('ProjektePMO', $data);
        } else if ($this -> session -> userdata['Rolle'] == "Geschäftsleiter") {
            $data = array("ProjektID" => $ProjektID);
            $this -> db -> insert('Plan', $data);
        }
    }

    function loeschePMOListe() {
        $this -> db -> where("ProjektID >= 0");
        $this -> db -> delete("ProjektePMO");
    }

    function loeschePlan() {
        $this -> db -> where("ProjektID >= 0");
        $this -> db -> delete("Plan");
    }

    function gibProjektAllgemein($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektAllgemein');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektAllgemein($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektAllgemein", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektAmort($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektAmort');

        $row = $query -> first_row();
        $row -> Amortisationsdauer = $this -> amortisationsdauer($ID);
        $row -> Amortisationsrate = $this -> amortisationsrate($row -> Amortisationsdauer);

        return $row;
    }

    function aendereProjektAmort($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektAmort", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektKomplex($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektKomplex');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektKomplex($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektKomplex", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektKosten($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektKosten');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektKosten($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektKosten", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektRisiken($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektRisiken');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektRisiken($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektRisiken", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektSonstig($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektSonstig');

        $row = $query -> first_row();
        $row -> VorgaengerRisiko = $this -> vorgaenger($ID);
        return $row;
    }

    function aendereProjektSonstig($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektSonstig", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektStrategien($ID) {
        $this -> db -> where("IDProjekt", $ID);
        $query = $this -> db -> get('ProjektStrategien');
        $data = array();
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i]["ID"] = $row -> IDStrategie;
            $i;
        }
        return $data;
    }

    function aendereProjektStrategien($ID, $data) {
        $this -> db -> where('IDProjekt', $ID);
        $this -> db -> delete('ProjektStrategien');

        if ($data != false) {
            foreach ($data as $zeile) {
                $eingabe = array("IDProjekt" => $ID, "IDStrategie" => $zeile);
                $this -> db -> insert("ProjektStrategien", $eingabe);
            }
        }
    }

    function gibNutzenQualitativ($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('NutzenQualitativ');

        $row = $query -> first_row();
        $row -> qualiNutzen = $this -> qualiNutzen($ID);
        return $row;
    }

    function aendereNutzenQualitativ($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("NutzenQualitativ", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibKategorien() {
        $query = $this -> db -> get("Kategorien");
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i]["ID"] = $row -> ID;
            $data[$i]["Titel"] = $row -> Titel;
            $i++;
        }
        return $data;
    }

    function gibProjektUebersicht() {
        if ($this -> session -> userdata['Rolle'] == "Geschäftsleiter") {
            $liste = $this -> db -> get("ProjektePMO");
            $i = 0;
            $data = array();
            foreach ($liste->result() as $zeile) {
                $this -> db -> select("* , ProjektAllgemein.ID as projektID , Kategorien.Titel as kat , ProjektAllgemein.Titel as projektTitel");
                $this -> db -> where("ProjektAllgemein.ID", $zeile -> ProjektID);
                $this -> db -> join("Kategorien", "Kategorien.ID = ProjektAllgemein.Kategorie");
                $query = $this -> db -> get("ProjektAllgemein");
                foreach ($query->result() as $row) {
                    $data[$i]["ID"] = $row -> projektID;
                    $data[$i]["Titel"] = $row -> projektTitel;
                    $data[$i]["Dauer"] = $row -> Dauer;
                    $data[$i]["Prio"] = $row -> Prio;
                    $data[$i]["Kategorie"] = $row -> kat;
                    $data[$i]["Strategie"] = $row -> Strategie;
                    $data[$i]["Beschreibung"] = $row -> Beschreibung;

                    $userQuery = $this -> db -> query('SELECT * FROM Benutzer WHERE ID = "' . $row -> Owner . '"');
                    $userRow = $userQuery -> first_row();
                    $abtQuery = $this -> db -> query("SELECT * FROM Abteilungen WHERE ID = " . $userRow -> Abteilung);
                    $abtRow = $abtQuery -> first_row();

                    $data[$i]["Abteilung"] = $abtRow -> Abteilungsname;

                    $data[$i]['KostenDauer'] = $this -> kostenDauerKPI($row -> projektID);
                    $data[$i]['Kapitalwertrate'] = $this -> kapitalwertrate($row -> projektID);

                    $data[$i]["Amortisationsdauer"] = $this -> amortisationsdauer($row -> projektID);
                    $data[$i]["Amortisationsrate"] = $this -> amortisationsrate($data[$i]["Amortisationsdauer"]);
                    $data[$i]["qualiNutzen"] = $this -> qualiNutzen($row -> projektID);
                    $data[$i]["Risiken"] = $this -> riskien($row -> projektID);
                    $data[$i]["Strategien"] = $this -> strategien($row -> projektID);
                    $data[$i]["Komplexitaet"] = $this -> komplextitaet($row -> projektID);
                    $data[$i]["Vorgaenger"] = $this -> vorgaenger($row -> projektID);
                    $data[$i]["Rating"] = $data[$i]['KostenDauer'] + $data[$i]['Kapitalwertrate'] + $data[$i]["Amortisationsrate"] + $data[$i]["qualiNutzen"] + $data[$i]["Risiken"] + $data[$i]["Strategien"] + $data[$i]["Komplexitaet"] + $this -> kanibalisierung($row -> projektID) + $data[$i]["Vorgaenger"];
                    $data[$i]["Ausgewaehlt"] = 0;
                    $this -> db -> where('ProjektID', $row -> projektID);
                    $query = $this -> db -> get('Plan');
                    if ($query -> num_rows() == 1) {
                        $data[$i]['Ausgewaehlt'] = 1;
                    }
                    $i++;
                }
            }

        } else if ($this -> session -> userdata['Rolle'] == 'PMO') {

            $i = 0;
            $data = array();
            $this -> db -> select("* , ProjektAllgemein.ID as projektID , Kategorien.Titel as kat , ProjektAllgemein.Titel as projektTitel");
            $this -> db -> join("Kategorien", "Kategorien.ID = ProjektAllgemein.Kategorie");
            $this -> db -> where("Bearbeiter", $this -> session -> userdata('BenutzerID'));
            $query = $this -> db -> get("ProjektAllgemein");
            foreach ($query->result() as $row) {
                $data[$i]["ID"] = $row -> projektID;
                $data[$i]["Titel"] = $row -> projektTitel;
                $data[$i]["Dauer"] = $row -> Dauer;
                $data[$i]["Prio"] = $row -> Prio;
                $data[$i]["Kategorie"] = $row -> kat;
                $data[$i]["Strategie"] = $row -> Strategie;
                $data[$i]["Beschreibung"] = $row -> Beschreibung;

                $userQuery = $this -> db -> query('SELECT * FROM Benutzer WHERE ID = "' . $row -> Owner . '"');
                $userRow = $userQuery -> first_row();
                $abtQuery = $this -> db -> query("SELECT * FROM Abteilungen WHERE ID = " . $userRow -> Abteilung);
                $abtRow = $abtQuery -> first_row();

                $data[$i]["Abteilung"] = $abtRow -> Abteilungsname;

                $data[$i]['KostenDauer'] = $this -> kostenDauerKPI($row -> projektID);
                $data[$i]['Kapitalwertrate'] = $this -> kapitalwertrate($row -> projektID);

                $data[$i]["Amortisationsdauer"] = $this -> amortisationsdauer($row -> projektID);
                $data[$i]["Amortisationsrate"] = $this -> amortisationsrate($data[$i]["Amortisationsdauer"]);
                $data[$i]["qualiNutzen"] = $this -> qualiNutzen($row -> projektID);
                $data[$i]["Risiken"] = $this -> riskien($row -> projektID);
                $data[$i]["Strategien"] = $this -> strategien($row -> projektID);
                $data[$i]["Komplexitaet"] = $this -> komplextitaet($row -> projektID);
                $data[$i]["Vorgaenger"] = $this -> vorgaenger($row -> projektID);
                $data[$i]["Rating"] = $data[$i]['KostenDauer'] + $data[$i]['Kapitalwertrate'] + $data[$i]["Amortisationsrate"] + $data[$i]["qualiNutzen"] + $data[$i]["Risiken"] + $data[$i]["Strategien"] + $data[$i]["Komplexitaet"] + $this -> kanibalisierung($row -> projektID) + $data[$i]["Vorgaenger"];
                $data[$i]["Vorgeschlagen"] = 0;
                $this -> db -> where('ProjektID', $row -> projektID);
                $query = $this -> db -> get('ProjektePMO');
                if ($query -> num_rows() == 1) {
                    $data[$i]['Vorgeschlagen'] = 1;
                }

                $i++;
            }

        }
        $daten = array();
        foreach ($data as $rate) {
            $daten[] = $rate['Rating'];
        }
        array_multisort($daten, SORT_DESC, $data);
        return $data;
    }

    function komplextitaet($ProjektID) {
        $this -> db -> where('ID', $ProjektID);
        $projektKomplexQuery = $this -> db -> get('ProjektKomplex');
        $projektKomplex = $projektKomplexQuery -> first_row();

        $konfigQuery = $this -> db -> get_where('Konfiguration', array('ID' => 1));
        $konfig = $konfigQuery -> first_row();

        $mitarbeiter = 100 - ($konfig -> AnzMitarbeiterSchlecht - $projektKomplex -> BeteilMit) * (100 / ($konfig -> AnzMitarbeiterSchlecht - $konfig -> AnzMitarbeiterGut));
        $orgeinheit = 0;
        if ($projektKomplex -> BeteilOrgEin > 1) {
            $orgeinheit = 100;
        }
        $technisch = $projektKomplex -> KompTech * 20;
        $wirtschaft = $projektKomplex -> KompInno * 20;

        $kpi = ($orgeinheit + $technisch + $wirtschaft + $mitarbeiter / 4) * (-1);
        $kpi = $kpi * ($konfig -> GKomplex / 100);
        return round($kpi, 2);
    }

    function kapitalwertrate($ProjektID) {
        $this -> db -> where('ID', $ProjektID);
        $projektKostenQuery = $this -> db -> get('ProjektKosten');
        $projektKosten = $projektKostenQuery -> first_row();

        $this -> db -> where('ID', $ProjektID);
        $projektAmortQuery = $this -> db -> get('ProjektAmort');
        $projektAmort = $projektAmortQuery -> first_row();

        $konfigQuery = $this -> db -> get_where('Konfiguration', array('ID' => 1));
        $konfig = $konfigQuery -> first_row();

        $kpi = ((-($projektKosten -> Intern1 + $projektKosten -> Extern1 + $projektKosten -> Sonstig1)) + ((-($projektKosten -> Intern2 + $projektKosten -> Extern2 + $projektKosten -> Sonstig2)) / pow(($konfig -> KalkZins / 100) + 1, 1)) + ((-($projektKosten -> Intern3 + $projektKosten -> Extern3 + $projektKosten -> Sonstig3)) / pow(($konfig -> KalkZins / 100) + 1, 2)));
        $a = 0;
        for ($a; $a < $projektKosten -> EintrittNutzen / 12; $a++) {
            $kpi = $kpi + ((-$projektKosten -> KostNFertig / 12) / pow(($konfig -> KalkZins / 100) + 1, 3 + $a));
        }

        $b = $a;
        for ($a; $a < 3 + $b; $a++) {
            $kpi = $kpi + ((-$projektKosten -> KostNFertig + $projektAmort -> Gewinn) / pow(($konfig -> KalkZins / 100) + 1, 3 + $a));
        }
        $kpi = $kpi / (($projektKosten -> Intern1 + $projektKosten -> Extern1 + $projektKosten -> Sonstig1) + ($projektKosten -> Intern2 + $projektKosten -> Extern2 + $projektKosten -> Sonstig2) + ($projektKosten -> Intern3 + $projektKosten -> Extern3 + $projektKosten -> Sonstig3));
        $kpi = $kpi * 100;

        $kpi = $kpi * ($konfig -> GKapitalwertrate / 100);

        return round($kpi, 2);
    }

    function riskien($ProjektID) {
        $konfigQuery = $this -> db -> get_where('Konfiguration', array('ID' => 1));
        $konfig = $konfigQuery -> first_row();

        $this -> db -> where('ID', $ProjektID);
        $projektRisikenQuery = $this -> db -> get('ProjektRisiken');
        $projektRisiken = $projektRisikenQuery -> first_row();

        $gesamt = $projektRisiken -> BudgetWirk * $projektRisiken -> BudgetEintritt + $projektRisiken -> ExtMitWirk * $projektRisiken -> ExtMitEintritt + $projektRisiken -> IntMitWirk * $projektRisiken -> IntMitEintritt + $projektRisiken -> AufGebWirk * $projektRisiken -> AufGebEintritt + $projektRisiken -> MitKundWirk * $projektRisiken -> MitKundEintritt + $projektRisiken -> GLKundWirk * $projektRisiken -> GLKundEintritt + $projektRisiken -> AusfallWirk * $projektRisiken -> AusfallEintritt + $projektRisiken -> VerzoegWirk * $projektRisiken -> VerzoegEintritt + $projektRisiken -> TechWirk * $projektRisiken -> TechEintritt + $projektRisiken -> WirtschaftWirk * $projektRisiken -> WirtschaftEintritt + $projektRisiken -> KompNichDaWirk * $projektRisiken -> KompNichDaEintritt;

        $kpi = $gesamt * (100 / (11 * 25 - 11)) * (-1);
        $kpi = $kpi * ($konfig -> GRisiken / 100);
        return round($kpi, 2);
    }

    function strategien($ProjektID) {
        $konfigQuery = $this -> db -> get_where('Konfiguration', array('ID' => 1));
        $konfig = $konfigQuery -> first_row();
        $anzStrategien = $this -> db -> count_all('Strategien');

        $this -> db -> where('IDProjekt', $ProjektID);
        $anzProjektStrategien = $this -> db -> count_all_results('ProjektStrategien');

        $kpi = (100 / $anzStrategien) * $anzProjektStrategien;
        $kpi = $kpi * ($konfig -> GStrategie / 100);
        return round($kpi, 2);
    }

    function amortisationsdauer($ProjektID) {
        $this -> db -> where('ID', $ProjektID);
        $projektKostenQuery = $this -> db -> get('ProjektKosten');
        $projektKosten = $projektKostenQuery -> first_row();

        $this -> db -> where('ID', $ProjektID);
        $projektAmortQuery = $this -> db -> get('ProjektAmort');
        $projektAmort = $projektAmortQuery -> first_row();
        $kostengesamt = $projektKosten -> Intern1 + $projektKosten -> Intern2 + $projektKosten -> Intern3 + $projektKosten -> Extern1 + $projektKosten -> Extern2 + $projektKosten -> Extern3 + $projektKosten -> Sonstig1 + $projektKosten -> Sonstig2 + $projektKosten -> Sonstig3;
        $kpi = (($kostengesamt - $projektAmort -> Restwert) / ($projektAmort -> Gewinn - $projektAmort -> Abschreibung)) * 12;
        return round($kpi, 2);
    }

    function amortisationsrate($amortisationsdauer) {
        $konfigQuery = $this -> db -> get_where('Konfiguration', array('ID' => 1));
        $konfig = $konfigQuery -> first_row();

        $kpi = (($konfig -> AmortSchlecht - $amortisationsdauer) * (100 / ($konfig -> AmortSchlecht - $konfig -> AmortGut)));
        $kpi = $kpi * ($konfig -> GAmort / 100);
        return round($kpi, 2);
    }

    function qualiNutzen($ProjektID) {
        $konfigQuery = $this -> db -> get_where('Konfiguration', array('ID' => 1));
        $konfig = $konfigQuery -> first_row();

        $this -> db -> where('ID', $ProjektID);
        $nutzenQualitativQuery = $this -> db -> get('NutzenQualitativ');
        $nutzenQualitativ = $nutzenQualitativQuery -> first_row();

        $gesamt = $nutzenQualitativ -> InfoMitarbeiter + $nutzenQualitativ -> MotivationMitarbeiter + $nutzenQualitativ -> ZugriffInfo + $nutzenQualitativ -> AnzFehlent + $nutzenQualitativ -> ZusamArbeit + $nutzenQualitativ -> ProduktivitaetKunde + $nutzenQualitativ -> AnzReklam + $nutzenQualitativ -> KundService + $nutzenQualitativ -> KundBindung + $nutzenQualitativ -> VertriebUnter + $nutzenQualitativ -> VerstandProzess + $nutzenQualitativ -> ProzessGestalt + $nutzenQualitativ -> ErgebnisPruef + $nutzenQualitativ -> Simulation + $nutzenQualitativ -> ProzessUeber;

        $kpi = $gesamt * (100 / 30);
        $kpi = $kpi * ($konfig -> GQualitativerNutzen / 100);
        return round($kpi, 2);
    }

    function kanibalisierung($ProjektID) {
        $konfigQuery = $this -> db -> get_where('Konfiguration', array('ID' => 1));
        $konfig = $konfigQuery -> first_row();

        $this -> db -> where("ID", $ProjektID);
        $porjektSonstigQuery = $this -> db -> get('ProjektSonstig');
        $projektSonstig = $porjektSonstigQuery -> first_row();

        $kpi = $projektSonstig -> KaniRate * ($konfig -> GKanibal / 100) * (-1);
        return round($kpi, 2);
    }

    function kostenDauerKPI($ProjektID) {
        $this -> db -> where('ID', $ProjektID);
        $projektKostenQuery = $this -> db -> get('ProjektKosten');
        $projektKosten = $projektKostenQuery -> first_row();

        $this -> db -> where('ID', $ProjektID);
        $projektAllgemeinQuery = $this -> db -> get('ProjektAllgemein');
        $projektAllgemein = $projektAllgemeinQuery -> first_row();

        $konfigQuery = $this -> db -> get_where('Konfiguration', array('ID' => 1));
        $konfig = $konfigQuery -> first_row();
        $gesamtkosten = $projektKosten -> Intern1 + $projektKosten -> Intern2 + $projektKosten -> Intern3 + $projektKosten -> Extern1 + $projektKosten -> Extern2 + $projektKosten -> Extern3 + $projektKosten -> Sonstig1 + $projektKosten -> Sonstig2 + $projektKosten -> Sonstig3;

        $kpi = (($konfig -> KpMSchlecht - ($gesamtkosten / $projektAllgemein -> Dauer)) * (100 / ($konfig -> KpMSchlecht - $konfig -> KpMGut)));
        $kpi = $kpi * ($konfig -> GKostenDauer / 100);
        return round($kpi, 2);
    }

    function vorgaenger($ProjektID) {
        $this -> db -> where("ID", $ProjektID);
        $porjektSonstigQuery = $this -> db -> get('ProjektSonstig');
        $projektSonstig = $porjektSonstigQuery -> first_row();
        $kpi = 0;
        if ($projektSonstig -> Vorgaenger != 0) {
            $kpi = $this -> riskien($projektSonstig -> Vorgaenger);
        }

        return round($kpi, 2);
    }

    function gibBenutzerdatenID($ID) {
        if ($ID != "") {
            $query = $this -> db -> query('SELECT * FROM Benutzer WHERE ID = "' . $ID . '"');
            $row = $query -> first_row();
            return array("Benutzername" => $row -> Benutzername, "Abteilung" => $row -> Abteilung);
        }
    }

    function bereichsProjekte() {
        $data = array();
        $i = 0;

        $query = $this -> db -> query("SELECT Plan.ProjektID, Benutzer.Benutzername, ProjektAllgemein.Titel, Bereiche.ID as BereichsID, Bereiche.Bereichsname, ProjektAmort.Gewinn 
FROM Plan, Benutzer, Abteilungen, Bereiche, ProjektAllgemein, ProjektAmort 
WHERE Plan.ProjektID = ProjektAllgemein.ID 
AND ProjektAllgemein.Owner = Benutzer.ID 
AND Benutzer.Abteilung = Abteilungen.ID 
AND Abteilungen.Bereich = Bereiche.ID 
AND Plan.ProjektID = ProjektAmort.ID");

        foreach ($query as $row) {

            $data[$row -> BereichesID][$row -> ProjektID] = array("ID" => $row -> ProjektID, "Titel" => $row -> Titel, "Gewinn" => $row -> Gewinn, "Bereichsname" => $row->Bereichsname);
        }
        return $data;
    }

}
