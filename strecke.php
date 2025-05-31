<?php
// Daten aus JSON laden
$strecken = json_decode(file_get_contents("strecken.json"), true);
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Strecke finden
$strecke = null;
foreach ($strecken as $s) {
  if ($s['id'] === $id) {
    $strecke = $s;
    break;
  }
}

// Wenn nicht gefunden: Fehler
if (!$strecke) {
  echo "<h1>Strecke nicht gefunden.</h1>";
  exit;
}

// Navigation (Vor/Nach)
$prev = null;
$next = null;
foreach ($strecken as $index => $s) {
  if ($s['id'] === $id) {
    if ($index > 0) $prev = $strecken[$index - 1];
    if ($index < count($strecken) - 1) $next = $strecken[$index + 1];
    break;
  }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $id ?>. <?= $strecke['name'] ?></title>
  <link rel="stylesheet" href="assets/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script>
    function toggleMenu() {
      const nav = document.getElementById("nav-links");
      nav.classList.toggle("show");
    }
  </script>
</head>
<body>
<?php include("includes/menu.php"); ?>

<div class="container">
  <h1><?= $id ?>. <?= $strecke['name'] ?></h1>
  <?php if (!empty($strecke['badge'])): ?>
    <div class="badge <?= htmlspecialchars($strecke['badge']) ?>"><?= htmlspecialchars($strecke['badge']) ?></div>
  <?php endif; ?>

  <div class="score">
    <span>Fahrspaß:</span> <?= $strecke['fahrspass'] ?> &nbsp;|&nbsp;
    <span>Panorama:</span> <?= $strecke['panorama'] ?> &nbsp;|&nbsp;
    <span>Höhe:</span> <?= $strecke['hoehe'] ?>
  </div>
  <div class="meta">
    <span>Land:</span> <?= $strecke['land'] ?> &nbsp;|&nbsp;
    <span>Region:</span> <?= $strecke['region'] ?><br />
    <span>Koordinaten:</span> <?= $strecke['koordinaten'] ?>
  </div>

  <div class="section">
    <h2>Beschreibung</h2>
    <p><?= nl2br($strecke['beschreibung']) ?></p>
  </div>

  <div class="section">
    <h2>Reisetipp</h2>
    <div class="tipp-box"><?= nl2br($strecke['reisetipp']) ?></div>
  </div>

  <div class="section table">
    <h2>Fahrtechnische Daten</h2>
    <table>
      <tr><th>Typ</th><td><?= $strecke['typ'] ?></td></tr>
      <tr><th>Straßenbreite</th><td><?= $strecke['breite'] ?></td></tr>
      <tr><th>Belag</th><td><?= $strecke['belag'] ?></td></tr>
      <tr><th>Verkehr</th><td><?= $strecke['verkehr'] ?></td></tr>
    </table>
  </div>

  <a class="maps-link" href="https://www.google.com/maps?q=<?= urlencode($strecke['koordinaten']) ?>" target="_blank">Google Maps öffnen</a>

  <div class="prev-next">
    <div>
      <?php if ($prev): ?>
        <a href="strecke.php?id=<?= $prev['id'] ?>">← <?= $prev['id'] ?>. <?= $prev['name'] ?></a>
      <?php endif; ?>
    </div>
    <div>
      <?php if ($next): ?>
        <a href="strecke.php?id=<?= $next['id'] ?>"><?= $next['id'] ?>. <?= $next['name'] ?> →</a>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>
