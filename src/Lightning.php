<?php

namespace Kickstart;

class Lightning extends Base {

  public function __construct() {
    parent::__construct();

    // Require Dev
    $this->addRequireDev('drupal/drupal-extension', '~3.2.0');
    $this->addRequireDev('behat/mink', '~1.7');
    $this->addRequireDev('behat/mink-goutte-driver', '~1.2');
    $this->addRequireDev('jcalderonzumba/gastonjs', '~1.0.2');
    $this->addRequireDev('drupal/coder', '8.*');
    $this->addRequireDev('mikey179/vfsStream', '~1.2');
    $this->addRequireDev('phpunit/phpunit', '~4.8');
    $this->addRequireDev('symfony/css-selector', '~2.8');
    $this->addRequireDev('behat/behat', '^3.0');
    $this->addRequireDev('se/selenium-server-standalone', '^2.53');
    $this->addRequireDev('composer/composer', '^1.3');
    $this->addRequireDev('drush/drush', '8.1.11');
    $this->addRequireDev('drupal/console', '^1.0');

    // Require
    $this->addRequire('drupal-composer/drupal-scaffold', '^2.0.0');
    $this->addRequire('cweagans/composer-patches', '^1.6.0');
    $this->addRequire('acquia/lightning', '~2.1.6');

    // Repositories
    $this->addRepository(
      'acquia_lightning',
      'vcs',
      'https://github.com/acquia/lightning-project'
    );

    // Scripts
    $this->addScript(
      'post-install-cmd',
      'DrupalComposer\\DrupalScaffold\\Plugin::scaffold'
    );

    // Config
    $this->setConfig(['bin-dir' => 'bin/']);

    // Extras
    $this->setExtra(
      (object) [
      'installer-types' => ['bower-asset', 'npm-asset'],
      'installer-paths' => [
        'web/core' => [
          'type:drupal-core',
        ],
        'web/libraries/{$name}' => [
          'type:drupal-library',
          'type:bower-asset',
          'type:npm-asset',
        ],
        'web/modules/contrib/{$name}' => [
          'type:drupal-module',
        ],
        'web/profiles/contrib/{$name}' => [
          'type:drupal-profile',
        ],
        'web/themes/contrib/{$name}' => [
          'type:drupal-theme',
        ],
        'drush/contrib/{$name}' => [
          'type:drupal-drush',
        ],
      ],
      'enable-patching' => TRUE,
    ]);
  }
}
