<?php
// Strecke.php – dynamische Streckenseite
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = json_decode(file_get_contents(__DIR__ . '/daten/strecken.json'), true);

if (!$id || !isset($data[$id - 1])) {
  http_response_code(404);
  echo "<h1>Strecke nicht gefunden</h1>";
  exit;
}

$strecke = $data[$id - 1];
$prevId = $id > 1 ? $id - 1 : null;
$nextId = $id < count($data) ? $id + 1 : null;
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $id ?>. <?= htmlspecialchars($strecke['name']) ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        onerror="this.onerror=null;this.href='/assets/fontawesome/css/all.min.css';" />
  <link rel="stylesheet" href="/assets/style.css" />
</head>
<body>
<?php include('includes/menu.php'); ?>

<div class="container">
  <h1><?= $id ?>. <?= htmlspecialchars($strecke['name']) ?></h1>

  <?php if (!empty($strecke['badge'])): ?>
    <div class="badge <?= htmlspecialchars($strecke['badge']) ?>"><?= htmlspecialchars($strecke['badge']) ?></div>
  <?php endif; ?>

  <div class="score">
    <span>Fahrspaß:</span> <?= $strecke['fahrspass'] ?> &nbsp;|
    <span>Panorama:</span> <?= $strecke['panorama'] ?> &nbsp;|
    <span>Höhe:</span> <?= $strecke['hoehe'] ?>
  </div>

  <div class="meta">
    <span>Land:</span> <?= $strecke['land'] ?> &nbsp;|
    <span>Region:</span> <?= $strecke['region'] ?><br />
    <span>Koordinaten:</span> <?= $strecke['koordinaten'] ?>
  </div>

  <div class="section">
    <h2>Beschreibung</h2>
    <p><?= nl2br(htmlspecialchars($strecke['beschreibung_lang'])) ?></p>
  </div>

  <div class="section">
    <h2>Reisetipp</h2>
    <div class="tipp-box">
      <?= nl2br(htmlspecialchars($strecke['reisetipp'])) ?>
    </div>
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

  <a class="maps-link" href="<?= $strecke['maps'] ?>" target="_blank">Google Maps öffnen</a>

  <div class="prev-next">
    <?php if ($prevId): ?>
      <a href="?id=<?= $prevId ?>">← <?= $prevId ?>. <?= $data[$prevId - 1]['name'] ?></a>
    <?php endif; ?>
    <?php if ($nextId): ?>
      <a href="?id=<?= $nextId ?>"><?= $nextId ?>. <?= $data[$nextId - 1]['name'] ?> →</a>
    <?php endif; ?>
  </div>
</div>
</body>
</html>
