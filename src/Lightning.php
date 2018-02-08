<?php

namespace Kickstart;

class Lightning extends Base
{

    public function __construct()
    {
        parent::__construct();

        // Require Dev
        $this->addRequireDev('drupal/drupal-extension', '~3.3.0');
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
        $this->addRequireDev('drush/drush', '^9.0.0');
        $this->addRequireDev('drupal/console', '^1.0');
        $this->addRequireDev('drupal/media_entity_generic', '^1.0');
        $this->addRequireDev('acquia/lightning_dev', 'dev-8.x-1.x');

        // Require
        $this->addRequire('drupal-composer/drupal-scaffold', '^2.0.0');
        $this->addRequire('cweagans/composer-patches', '^1.6.0');
        $this->addRequire('acquia/lightning', '~3.0.0');

        // Repositories
        $this->addRepository(
            'assets',
            'composer',
            'https://asset-packagist.org'
        );
        $this->addRepository(
          'dev',
          'vcs',
          'https://github.com/acquia/lightning-dev'
        );

        // Scripts
        $this->addScript(
            'post-install-cmd',
            'DrupalComposer\\DrupalScaffold\\Plugin::scaffold'
        );
        $this->addScript(
            'post-update-cmd',
            'DrupalComposer\\DrupalScaffold\\Plugin::scaffold'
        );

        // Config
        $this->setConfig(['bin-dir' => 'bin/']);

        // Extras
        $this->addExtra('installer-types', ['bower-asset', 'npm-asset']);
        $this->addExtra('enable-patching', true);
        $this->addExtra('installer-paths', [
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
        ]);
    }
}
