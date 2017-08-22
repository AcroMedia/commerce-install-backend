<?php

namespace Kickstart;

use Accompanist\Accompanist;

class Base extends Accompanist {

  public function __construct() {
    parent::__construct('Kickstart', 'Automatically Generated Commerce Kickstart Composer File');

    // Repositories
    $this->addRepository('drupal', 'composer', 'https://packages.drupal.org/8');
    $this->addRepository(
      'commerce_base',
      'vcs',
      'https://github.com/drupalcommerce/commerce_base'
    );

    // Stability
    $this->setMinimumStability('dev');
    $this->setPreferStable(TRUE);

    // Type
    $this->setType('project');

    // Config
    $this->setConfig(['bin-dir' => 'bin', 'sort-packages' => TRUE]);

    // License
    $this->setLicense('GPL-2.0+');

    // Require
    $this->addRequire('ext-curl');
    $this->addRequire('composer/installers', '^1.2');
    $this->addRequire('cweagans/composer-patches', '^1.6');
    $this->addRequire('drupal-composer/drupal-scaffold', '^2.2');
    $this->addRequire('drupal/admin_toolbar', '~1.0');
    $this->addRequire('drupal/console', '~1.0');
    $this->addRequire('drupal/core', '~8.3.0');
    $this->addRequire('drupal/commerce', '~2.0');
    $this->addRequire('drupal/search_api', '~1.0');
    $this->addRequire('drupal/swiftmailer', '~1.0');
    $this->addRequire('drupalcommerce/commerce_base', "dev-8.x-1.x");
    $this->addRequire('webflo/drupal-finder','^0.3.0');
    $this->addRequire('webmozart/path-util','^2.3');

    // Require Dev
    $this->addRequireDev('behat/mink', '~1.7');
    $this->addRequireDev('behat/mink-goutte-driver', '~1.2');
    $this->addRequireDev('jcalderonzumba/gastonjs', '~1.0.2');
    $this->addRequireDev('jcalderonzumba/mink-phantomjs-driver', '~0.3.1');
    $this->addRequireDev('mikey179/vfsstream', '~1.2');
    $this->addRequireDev('phpunit/phpunit', '>=4.8.28 <5');
    $this->addRequireDev('symfony/css-selector', '~2.8');

    // Conflict
    $this->setConflict(['drupal/drupal' => '*']);

    // Autoloader
    $this->addAutoload('classmap', ['scripts/composer/ScriptHandler.php']);

    // Scripts
    $this->addScript(
      'drupal-scaffold',
      'DrupalComposer\\DrupalScaffold\\Plugin::scaffold'
    );

    $this->addScript(
      'pre-install-cmd',
      'DrupalProject\\composer\\ScriptHandler::checkComposerVersion'
    );

    $this->addScript(
      'pre-update-cmd',
      'DrupalProject\\composer\\ScriptHandler::checkComposerVersion'
    );

    $this->addScript(
      'post-install-cmd',
      'DrupalProject\\composer\\ScriptHandler::createRequiredFiles'
    );

    $this->addScript(
      'post-update-cmd',
      'DrupalProject\\composer\\ScriptHandler::createRequiredFiles'
    );

    // Extra
    $this->setExtra(
      (object) [
        'installer-paths' => [
          'web/core' => [
            'type:drupal-core',
          ],
          'web/libraries/{$name}' => [
            'type:drupal-library',
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
          'web/contrib/{$name}' => [
            'type:drupal-drush',
          ],
        ],
      ]
    );

  }
}
