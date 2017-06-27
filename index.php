<?php

require __DIR__ . '/vendor/autoload.php';

use Accompanist\Accompanist;

$composerJSON = new Accompanist('Kickstart', 'Kickstart Test');

// Base, probably move this into it's on function at some point
$composerJSON->addRepository('drupal', 'composer', 'https://packages.drupal.org/8');
$composerJSON->addRepository('commerce_base', 'vcs', 'https://github.com/drupalcommerce/commerce_base');

$composerJSON->addRequire('ext-curl');
$composerJSON->addRequire('composer/installers', '^1.2');
$composerJSON->addRequire('drupal-composer/drupal-scaffold', '^2.2');
$composerJSON->addRequire('cweagans/composer-patches', '~1.0');
$composerJSON->addRequire('drupal/core');
$composerJSON->addRequire('drupal/commerce');
$composerJSON->addRequire('drupal/swiftmailer');
$composerJSON->addRequire('drupalcommerce/commerce_base');

$composerJSON->addAutoload('classmap', ['scripts/composer/ScriptHandler.php']);

$composerJSON->addScript('drupal-scaffold', 'DrupalComposer\\DrupalScaffold\\Plugin::scaffold');
$composerJSON->addScript('post-update-cmd', ['DrupalProject\\composer\\ScriptHandler::createRequiredFiles']);

// Custom packages
foreach($_GET['packages'] as $package) {
  $composerJSON->addRequire($package);
}

// Package Generation, move into function/class at some point
@mkdir('generated');

$id = getID();
$folder = 'generated/kickstart-' . $id;

$filename = $folder . '.tar';

try {
  $tar = new PharData($filename);

  $tar->addFromString('composer.json', $composerJSON->generateJSON());
  $tar->addEmptyDir('scripts');
  $tar->addEmptyDir('scripts/composer');
  $tar->addFile(
    'templates/ScriptHandler.php',
    'scripts/composer/ScriptHandler.php'
  );

  $tar->compress(Phar::GZ);

  unlink($filename);
}
catch (Exception $e) {
  echo "Exception : " . $e;
}

// The compress option above automatically generates the .gz version
print $filename . '.gz';

function getID() {
  if(file_exists('id')) {
    $id = (int) file_get_contents('id');
    $id++;

    return $id;
  }
  else {
    file_put_contents('id', '1');
    return 1;
  }
}