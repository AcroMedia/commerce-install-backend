<?php

namespace Kickstart;

class Thunder extends Base {

  public function __construct() {
    parent::__construct('Kickstart', 'Automatically Generated Commerce Kickstart Composer File');

    // Base, probably move this into it's on function at some point
    $this->addRepository('drupal', 'composer', 'https://packages.drupal.org/8');
    $this->addRepository(
      'commerce_base',
      'vcs',
      'https://github.com/drupalcommerce/commerce_base'
    );

    $this->addRequire('ext-curl');
    $this->addRequire('composer/installers', '^1.2');
    $this->addRequire('drupal-composer/drupal-scaffold', '^2.2');
    $this->addRequire('cweagans/composer-patches', '~1.0');
    $this->addRequire('drupal/core');
    $this->addRequire('drupal/commerce');
    $this->addRequire('drupal/swiftmailer');
    $this->addRequire('drupalcommerce/commerce_base');

    $this->addAutoload('classmap', ['scripts/composer/ScriptHandler.php']);

    $this->addScript(
      'drupal-scaffold',
      'DrupalComposer\\DrupalScaffold\\Plugin::scaffold'
    );
    $this->addScript(
      'post-update-cmd',
      ['DrupalProject\\composer\\ScriptHandler::createRequiredFiles']
    );
  }
}
