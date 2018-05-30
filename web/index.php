<?php

require __DIR__ . '/../vendor/autoload.php';

use Kickstart\Id;
use Kickstart\Drupal;
use Kickstart\Lightning;
use Kickstart\Thunder;
use Kickstart\OpenSocial;
use Kickstart\OpenEDU;
use Kickstart\Analytics;
use Kickstart\PackageGenerator;

$analytics = new Analytics();
$id = Id::getID();

header("Access-Control-Allow-Origin: *");

if (isset($_GET['base'])) {
    $base = $_GET['base'];
    switch ($base) {
        case 'lightning':
            $composerJSON = new Lightning();
            break;
        case 'thunder':
            $composerJSON = new Thunder();
            break;
        case 'open-social':
            $composerJSON = new OpenSocial();
            break;
        case 'openedu':
            $composerJSON = new OpenEDU();
            break;
        default:
            $composerJSON = new Drupal();
    }
    $analytics->saveData($id, $_GET['email'], 'base', $base);
} else {
    $composerJSON = new Drupal();
    $analytics->saveData($id, $_GET['email'], 'base', 'drupal');
}

if ($_GET['newsletter'] == 'on') {
// Hubspot Signup.
    $hubspot = SevenShores\Hubspot\Factory::create(
        '3839d48c-f9ea-40fa-8ab9-a71011a36de7'
    );

    $response = $hubspot->contactLists()->addContact(529, [], [$_GET['email']]);
}

// Custom packages
if (isset($_GET['packages'])) {
    $packages = $_GET['packages'];

    if (is_array($packages)) {
        foreach ($packages as $package) {
            $composerJSON->addRequire($package[0], $package[1]);
            $analytics->saveData($id, $_GET['email'], 'module', $package);
        }
    }
}

$filename = PackageGenerator::generatePackage($id, $composerJSON);

echo '//' . $_SERVER['HTTP_HOST'] . '/' . $filename . '.gz';
