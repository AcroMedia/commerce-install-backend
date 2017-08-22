<?php

require __DIR__ . '/../vendor/autoload.php';

use Kickstart\Id;
use Kickstart\Drupal;
use Kickstart\Lightning;
use Kickstart\Thunder;

header("Access-Control-Allow-Origin: *");

if (isset($_GET['base'])) {
  switch ($_GET['base']) {
    case 'lightning':
      $composerJSON = new Lightning();
      break;
    case 'thunder':
      $composerJSON = new Thunder();
      break;
    default:
      $composerJSON = new Drupal();
  }
}
else {
  $composerJSON = new Drupal();
}


// Custom packages
if (isset($_GET['packages'])) {
  $packages = $_GET['packages'];

  if (is_array($packages)) {
    foreach ($packages as $package) {
      $composerJSON->addRequire($package);
    }
  }
}

// Package Generation, move into function/class at some point
@mkdir('generated');

$id = Id::getID();
$folder = 'generated/kickstart-' . $id;

$filename = $folder . '.tar';

try {
  $tar = new PharData($filename);

  $tar->addFromString('composer.json', $composerJSON->generateJSON());
  $tar->addEmptyDir('scripts');
  $tar->addEmptyDir('scripts/composer');
  $tar->addFile('../templates/README.md', 'README.md');
  $tar->addFile(
    '../templates/ScriptHandler.php',
    'scripts/composer/ScriptHandler.php'
  );

  $tar->compress(Phar::GZ);

  unlink($filename);
} catch (Exception $e) {
  echo "Exception : " . $e;
}

// Dev env will be using http
$protocol = strpos($_SERVER['HTTP_HOST'], 'localhost') === FALSE ? 'https://' : 'http://';
// The compress option above automatically generates the .gz version
print $protocol . $_SERVER['HTTP_HOST'] . '/' . $filename . '.gz';
