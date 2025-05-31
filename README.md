# Dein PassGuide – Kurvenführer Europa

Dies ist das Repository für den interaktiven, PHP-basierten Streckenführer "PassGuide".

## 📁 Projektstruktur

```
/strecke.php              # Hauptseite für alle Strecken – aufrufbar per ?id=XX
/verzeichnis.php          # Inhaltsverzeichnis (nach Region & Nummer sortiert)
/includes/menu.php        # Zentrales, responsives Menü mit Navigation
/assets/style.css         # Einheitliches Layout & Design
/strecken.json            # Zentrale Datendatei mit allen Streckendetails
/PassGuide_Karte_*.html   # Interaktive Karten (mit & ohne Cluster)
/DeinPassGuide.pdf        # PDF-Version aller Strecken
/index.html               # Startseite (z. B. mit Kartenübersicht)
```

## ✅ Funktionen
- Vollständig dynamisches Streckenlayout via `strecke.php?id=X`
- Automatisches Menü & Navigation
- Interaktive Karte zur Streckenauswahl
- PDF-Export als Gesamtübersicht
- PWA-kompatibel (Icons, manifest, service-worker)

## 📌 Anforderungen
- PHP 7.4+ (z. B. via Apache, nginx oder lokalem PHP-Server)

## 🚀 Schnellstart (lokal)
```bash
php -S localhost:8000
```
Dann im Browser öffnen: [http://localhost:8000/strecke.php?id=1](http://localhost:8000/strecke.php?id=1)

## 🛠️ Bearbeiten von Strecken
Die Datei `strecken.json` enthält alle Streckeninformationen und wird aus einer Excel-Vorlage generiert. Änderungen erfolgen dort und werden regelmäßig synchronisiert.

## 🔄 Strukturierte Erweiterungen
- JSON basiert
- keine HTML-Duplikate notwendig
- regionensortiertes Menü & Inhaltsverzeichnis

---

© Idel Versandhandel GmbH · Stand: Mai 2025

# PassGuide – Interaktive Karte

Dies ist die interaktive Karte aller 183 kurvigen Strecken.

## 📄 Inhalte

- `index.html`: Interaktive Karte mit Cluster, Filter, Suche, PDF-Link
- `PassGuide_Karte_OhneCluster.html`: Variante ohne Cluster-Funktion
- `DeinPassGuide.pdf`: Platzhalter für deine PDF (bitte ersetzen!)
- `README.md`: Diese Anleitung

## 📥 Anleitung

1. Ersetze die Datei `DeinPassGuide.pdf` durch deine eigene PDF-Datei
   - Achtung: Der Dateiname muss **genau so** bleiben

2. Öffne `index.html` oder `PassGuide_Karte_OhneCluster.html` in einem Browser

## 🌐 GitHub Pages aktivieren (nach Upload)

1. Erstelle ein Repository z. B. `passguide`
2. Lade alle Dateien hoch (auch `DeinPassGuide.pdf`)
3. Gehe in die Repository-Einstellungen → „Pages“
4. Wähle unter „Branch“ z. B. `main`, Ordner: `/root`
5. Deine Karte ist online unter: `https://DEINNAME.github.io/passguide/`

