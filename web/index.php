<?php

require __DIR__ . '/vendor/autoload.php';

use Kickstart\Id;
use Kickstart\Base;

$composerJSON = new Base();

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
    $tar->addFile(
        'templates/ScriptHandler.php',
        'scripts/composer/ScriptHandler.php'
    );

    $tar->compress(Phar::GZ);

    unlink($filename);
} catch (Exception $e) {
    echo "Exception : " . $e;
}

// The compress option above automatically generates the .gz version
print $filename . '.gz';
