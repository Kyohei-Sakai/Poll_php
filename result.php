<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Poll.php');

try {
  $poll = new \MyApp\Poll();
} catch (Exception $e) {
  echo $e->getMessage();
  exit;
}

$results = $poll->getResults();
$rate = $poll->getSexRate();
// var_dump($rate);
// exit;

// $results = [
//   0 => 12,
//   1 => 33,
//   2 => 56
// ];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Poll Result</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Result ...</h1>
  <div class="row">
    <?php for ($i = 0; $i < 3; $i++) : ?>
    <div class="box" id="box_<?= h($i); ?>"><?= h($results[$i]); ?></div>
    <?php endfor; ?>
  </div>
  <div class="rate">
    <div id="rate_male" data-rate="<?= h($rate['male']); ?>">male : <?= h($rate['male']); ?></div>
    <div id="rate_female" data-rate="<?= h($rate['female']); ?>">female : <?= h($rate['female']); ?></div>
  </div>
  <a href="/"><div id="btn">Go Back</div></a>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
  $(function() {
    'use strict';

    var width = 450;
    var male = $('#rate_male').data('rate');
    var female = $('#rate_female').data('rate');

    $('#rate_male').css('width', width * (male / (male + female)));
    $('#rate_female').css('width', width * (female / (male + female)));

  });
  </script>
</body>
</html>
