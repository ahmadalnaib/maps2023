<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('terms')->truncate();
        $pages[]= [
           
            'content' => json_encode( ['de' => "1 Geltungsbereich:
            1. Diese Verkaufsbedingungen gelten ausschließlich gegenüber Unternehmern, juristischen
            Personen des öffentlichen Rechts oder öffentlich-rechtlichen Sondervermögen im Sinne von
            § 310 Absatz 1 BGB. Entgegenstehende oder von unseren Verkaufsbedingungen
            abweichende Bedingungen des Bestellers erkennen wir nur an, wenn wir ausdrücklich
            schriftlich der Geltung zustimmen.
            2. Diese Allgemeinen Verkaufsbedingungen gelten für alle, auch zukünftigen Verträge, die wir
            mit Besteller abschließen, soweit es sich um Rechtsgeschäfte verwandter Art handelt.
            3. Im Einzelfall getroffene, individuelle Vereinbarungen mit dem Käufer (einschließlich
            Nebenabreden, Ergänzungen und Änderungen) haben in jedem Fall Vorrang vor diesen
            Verkaufsbedingungen. Für den Inhalt derartiger Vereinbarungen ist, vorbehaltlich des
            Gegenbeweises, ein schriftlicher Vertrag bzw. unsere schriftliche Bestätigung maßgebend.
            4. Wir behalten uns das Recht vor, Änderungen und Verbesserungen unserer Artikel
            vorzunehmen, soweit sie unter Berücksichtigung unserer Interessen für den Besteller
            zumutbar sind.
            5. Die Rechte des Bestellers aus dem Vertrag sind nur mit unserer vorherigen Zustimmung
            übertragbar.
            6. Der Besteller ist dazu verpflichtet uns auf die gesetzlichen, behördlichen und anderen
            Vorschriften, Bedingungen und Normen aufmerksam zu machen, die sich am Aufstellort des
            Vertragsgegenstandes insbesondere auf die Ausführung der Lieferung, die Montage, den
            Betrieb, auf Krankheits- und Unfallverhütung, auf devisenrechtliche export- bzw.
            importbeschränkende und überhaupt alle behördlichen Bestimmungen beziehen, die
            geeignet sind, die Lieferung zu verzögern oder zu verhindern; der Besteller haftet für die
            Folgen, die sich aus dem Fehlen der notwendigen Genehmigungen ergeben.
            § 2 Angebot und Vertragsabschluss:
            1. Sofern eine Bestellung als Angebot gemäß § 145 BGB anzusehen ist, können wir diese
            innerhalb von zwei Wochen annehmen. 
            Allgemeine Geschäftsbedingungen Stand 08.08.19 FR
            ©LockTec GmbH 2019. Alle Rechte vorbehalten.
            Seite 2 von 8
            § 3 Preise und Zahlungsbedingungen:
            1. Maßgebend für die Preisberechnung ist der am Tag der Lieferung oder Leistung gültige Preis,
            zuzüglich der jeweiligen gesetzlichen Mehrwertsteuer, sofern keine abweichende
            Preisvereinbarung getroffen worden ist. Preise verstehen sich ab Werk zuzüglich
            Verpackungs- und Transportkosten evtl. Transportversicherung sowie Montage, Zoll und
            Fracht. Die Angebotsgültigkeit ist im jeweiligen Angebot zu finden. An genannte Preise und
            Angaben halten wir uns höchstens sechs Monate gebunden, sofern nichts anderes vereinbart
            wurde. Ist eine frachtfreie Lieferung zugesagt, gilt dies frachtfrei an die Empfangsstation des
            Bestellers (Abnehmers), ausschließlich Rollgeld. Mehrkosten und Risiken aufgrund einer vom
            Besteller gewünschten besonderen Versandart (z.B. Expressgut, Eilgut, Luftfracht) gehen zu
            dessen Lasten, ebenso Kosten für gewünschte Teillieferungen. Bei Versand mit dem eigenen
            Fahrzeug erfolgt die Berechnung eines Frachtkostenanteils.
            2. Steuern, Vertragsgebühren, Stempel-, Aus-, Ein- und Durchführungsgebühren, Zoll und
            Zollspesen, behördliche Gebühren und dergleichen trägt der Besteller.
            3. Die in der Auftragsbestätigung genannten Preise sind bei einer Lieferung innerhalb von vier
            Monaten nach Vertragsabschluss verbindlich. Bei einem späteren Liefertermin sind wir
            berechtigt, die Preise zu erhöhen, wenn sich nach Vertragsabschluss die Verhältnisse ändern,
            insbesondere eine Erhöhung der Rohstoffpreise und er Lohn-, Lohnneben- und/oder
            Transportkosten eintritt. Die Preisänderungen sind in diesem Fall nur im Rahmen und zum
            Ausgleich der genannten Preis- und Kostensteigerungen möglich.
            4. Die Zurückhaltung von Zahlungen durch den Besteller ist ausgeschlossen, sofern
            Gegenansprüche aus einem anderen Vertragsverhältnis resultieren. Beruht der
            Gegenanspruch auf demselben Vertragsverhältnis, ist die Zurückhaltung von Zahlungen nur
            zulässig, wenn es sich um unbestrittene oder rechtskräftig festgestellte Gegenansprüche
            handelt.
            5. Im Falle des Zahlungsverzuges mit einer Forderung sind wir berechtigt, die Lieferungen bzw.
            sonstigen Leistungen aus sämtlichen Verträgen mit dem Besteller bis zur vollständigen
            Erfüllung aller uns gegen den Besteller zustehenden Forderungen zurückzuhalten. Nach
            fruchtlosem Ablauf einer dem Besteller gesetzten Zahlungsfrist ist LockTec berechtigt, von
            sämtlichen noch nicht ausgeführten Verträgen zurückzutreten. Die Geltendmachung eines
            weiteren Verzugsschadens bleibt vorbehalten.
            6. Geschuldete Beträge, die sich im Zahlungsverzug befinden sind, vorbehaltlich der
            Geltendmachung weitere Schadensersatzforderungen mit 9 Prozentpunkten über dem
            jeweiligen Basiszinssatz der Deutschen Bundesbank zu verzinsen.
            7. Eingehende Zahlungen, die nicht einer speziellen Rechnungsnummer zugewiesen sind
            werden grundsätzlich immer auf die älteste Schuld angerechnet. " , 'en'=>"1 Geltungsbereich:
            1. Diese Verkaufsbedingungen gelten ausschließlich gegenüber Unternehmern, juristischen
            Personen des öffentlichen Rechts oder öffentlich-rechtlichen Sondervermögen im Sinne von
            § 310 Absatz 1 BGB. Entgegenstehende oder von unseren Verkaufsbedingungen
            abweichende Bedingungen des Bestellers erkennen wir nur an, wenn wir ausdrücklich
            schriftlich der Geltung zustimmen.
            2. Diese Allgemeinen Verkaufsbedingungen gelten für alle, auch zukünftigen Verträge, die wir
            mit Besteller abschließen, soweit es sich um Rechtsgeschäfte verwandter Art handelt.
            3. Im Einzelfall getroffene, individuelle Vereinbarungen mit dem Käufer (einschließlich
            Nebenabreden, Ergänzungen und Änderungen) haben in jedem Fall Vorrang vor diesen
            Verkaufsbedingungen. Für den Inhalt derartiger Vereinbarungen ist, vorbehaltlich des
            Gegenbeweises, ein schriftlicher Vertrag bzw. unsere schriftliche Bestätigung maßgebend.
            4. Wir behalten uns das Recht vor, Änderungen und Verbesserungen unserer Artikel
            vorzunehmen, soweit sie unter Berücksichtigung unserer Interessen für den Besteller
            zumutbar sind.
            5. Die Rechte des Bestellers aus dem Vertrag sind nur mit unserer vorherigen Zustimmung
            übertragbar.
            6. Der Besteller ist dazu verpflichtet uns auf die gesetzlichen, behördlichen und anderen
            Vorschriften, Bedingungen und Normen aufmerksam zu machen, die sich am Aufstellort des
            Vertragsgegenstandes insbesondere auf die Ausführung der Lieferung, die Montage, den
            Betrieb, auf Krankheits- und Unfallverhütung, auf devisenrechtliche export- bzw.
            importbeschränkende und überhaupt alle behördlichen Bestimmungen beziehen, die
            geeignet sind, die Lieferung zu verzögern oder zu verhindern; der Besteller haftet für die
            Folgen, die sich aus dem Fehlen der notwendigen Genehmigungen ergeben.
            § 2 Angebot und Vertragsabschluss:
            1. Sofern eine Bestellung als Angebot gemäß § 145 BGB anzusehen ist, können wir diese
            innerhalb von zwei Wochen annehmen. 
            Allgemeine Geschäftsbedingungen Stand 08.08.19 FR
            ©LockTec GmbH 2019. Alle Rechte vorbehalten.
            Seite 2 von 8
            § 3 Preise und Zahlungsbedingungen:
            1. Maßgebend für die Preisberechnung ist der am Tag der Lieferung oder Leistung gültige Preis,
            zuzüglich der jeweiligen gesetzlichen Mehrwertsteuer, sofern keine abweichende
            Preisvereinbarung getroffen worden ist. Preise verstehen sich ab Werk zuzüglich
            Verpackungs- und Transportkosten evtl. Transportversicherung sowie Montage, Zoll und
            Fracht. Die Angebotsgültigkeit ist im jeweiligen Angebot zu finden. An genannte Preise und
            Angaben halten wir uns höchstens sechs Monate gebunden, sofern nichts anderes vereinbart
            wurde. Ist eine frachtfreie Lieferung zugesagt, gilt dies frachtfrei an die Empfangsstation des
            Bestellers (Abnehmers), ausschließlich Rollgeld. Mehrkosten und Risiken aufgrund einer vom
            Besteller gewünschten besonderen Versandart (z.B. Expressgut, Eilgut, Luftfracht) gehen zu
            dessen Lasten, ebenso Kosten für gewünschte Teillieferungen. Bei Versand mit dem eigenen
            Fahrzeug erfolgt die Berechnung eines Frachtkostenanteils.
            2. Steuern, Vertragsgebühren, Stempel-, Aus-, Ein- und Durchführungsgebühren, Zoll und
            Zollspesen, behördliche Gebühren und dergleichen trägt der Besteller.
            3. Die in der Auftragsbestätigung genannten Preise sind bei einer Lieferung innerhalb von vier
            Monaten nach Vertragsabschluss verbindlich. Bei einem späteren Liefertermin sind wir
            berechtigt, die Preise zu erhöhen, wenn sich nach Vertragsabschluss die Verhältnisse ändern,
            insbesondere eine Erhöhung der Rohstoffpreise und er Lohn-, Lohnneben- und/oder
            Transportkosten eintritt. Die Preisänderungen sind in diesem Fall nur im Rahmen und zum
            Ausgleich der genannten Preis- und Kostensteigerungen möglich.
            4. Die Zurückhaltung von Zahlungen durch den Besteller ist ausgeschlossen, sofern
            Gegenansprüche aus einem anderen Vertragsverhältnis resultieren. Beruht der
            Gegenanspruch auf demselben Vertragsverhältnis, ist die Zurückhaltung von Zahlungen nur
            zulässig, wenn es sich um unbestrittene oder rechtskräftig festgestellte Gegenansprüche
            handelt.
            5. Im Falle des Zahlungsverzuges mit einer Forderung sind wir berechtigt, die Lieferungen bzw.
            sonstigen Leistungen aus sämtlichen Verträgen mit dem Besteller bis zur vollständigen
            Erfüllung aller uns gegen den Besteller zustehenden Forderungen zurückzuhalten. Nach
            fruchtlosem Ablauf einer dem Besteller gesetzten Zahlungsfrist ist LockTec berechtigt, von
            sämtlichen noch nicht ausgeführten Verträgen zurückzutreten. Die Geltendmachung eines
            weiteren Verzugsschadens bleibt vorbehalten.
            6. Geschuldete Beträge, die sich im Zahlungsverzug befinden sind, vorbehaltlich der
            Geltendmachung weitere Schadensersatzforderungen mit 9 Prozentpunkten über dem
            jeweiligen Basiszinssatz der Deutschen Bundesbank zu verzinsen.
            7. Eingehende Zahlungen, die nicht einer speziellen Rechnungsnummer zugewiesen sind
            werden grundsätzlich immer auf die älteste Schuld angerechnet. "]),
    
           
            ];
            
          
            Term::insert($pages);
    }
}
