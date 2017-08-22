<?php

namespace Kickstart;

use Accompanist\Accompanist;

class Base extends Accompanist {

  public function __construct() {
    parent::__construct('Kickstart', 'Automatically Generated Commerce Kickstart Composer File');

    $this->addRepository('drupal', 'composer', 'https://packages.drupal.org/8');
    $this->addRepository(
      'commerce_base',
      'vcs',
      'https://github.com/drupalcommerce/commerce_base'
    );
    $this->addRequire('drupal/commerce');

    $this->addAutoload('classmap', ['scripts/composer/ScriptHandler.php']);

    $this->addScript(
      'drupal-scaffold',
      'DrupalComposer\\DrupalScaffold\\Plugin::scaffold'
    );
    $this->addScript(
      'post-update-cmd',
      'DrupalProject\\composer\\ScriptHandler::createRequiredFiles'
    );
  }
}
