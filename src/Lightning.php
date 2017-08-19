<?php

namespace Kickstart;

class Lightning extends Base {

  public function __construct() {
    parent::__construct('Kickstart', 'Automatically Generated Commerce Kickstart Composer File');

    $this->addRepository(
      'acquia_lightning',
      'vcs',
      'https://github.com/acquia/lightning-project'
    );

    $this->addRequire('acquia/lightning');
    // todo shawn: do we need these??
//    $this->addRequire('ext-curl');
//    $this->addRequire('composer/installers', '^1.2');
//    $this->addRequire('drupal/swiftmailer');
    $this->addRequire('drupal/drupal-extension', '~3.2.0');
    $this->addRequire('behat/mink', '~1.7');
    $this->addRequire('behat/mink-goutte-driver', '~1.2');
    $this->addRequire('jcalderonzumba/gastonjs', '~1.0.2');
    $this->addRequire('drupal/coder', '8.*');
    $this->addRequire('mikey179/vfsStream', '~1.2');
    $this->addRequire('phpunit/phpunit', '~4.8');
    $this->addRequire('symfony/css-selector', '~2.8');
    $this->addRequire('behat/behat', '^3.0');
    $this->addRequire('se/selenium-server-standalone', '^2.53');
    $this->addRequire('composer/composer', '^1.3');
    $this->addRequire('drush/drush', '8.1.11');
    $this->addRequire('drupal/console', '^1.0');
    $this->addRequire('drupal-composer/drupal-scaffold', '^2.0.0');
    $this->addRequire('cweagans/composer-patches', '^1.6.0');
    $this->addRequire('drupalcommerce/commerce_base');
  }
}
