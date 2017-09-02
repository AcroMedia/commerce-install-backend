<?php

namespace Kickstart;

class OpenSocial extends Base
{

    public function __construct()
    {
        parent::__construct();

        // Require
        $this->addRequire('cweagans/composer-patches', '^1.5.0');
        $this->addRequire('composer/installers', '^1.0');
        $this->addRequire('drupal-composer/drupal-scaffold', '^2.0.0');
        $this->addRequire('drupal/core', '8.3.7');
        $this->addRequire('drupal/crop', '1.2');
        $this->addRequire('drupal/address', '1.1');
        $this->addRequire('drupal/addtoany', '1.8');
        $this->addRequire('drupal/admin_toolbar', '1.19');
        $this->addRequire('drupal/config_update', '1.3');
        $this->addRequire('drupal/devel', '1.0');
        $this->addRequire('drupal/dynamic_entity_reference', '1.4');
        $this->addRequire('drupal/entity', '1.0-alpha4');
        $this->addRequire('drupal/features', '3.5');
        $this->addRequire('drupal/field_group', '1.0-rc6');
        $this->addRequire('drupal/flag', '4.0-alpha2');
        $this->addRequire('drupal/group', '1.0-rc1');
        $this->addRequire('drupal/image_effects', '1.0');
        $this->addRequire('drupal/image_widget_crop', '1.5');
        $this->addRequire('drupal/like_and_dislike', '1.0-alpha2');
        $this->addRequire('drupal/link_css', '1.x-dev');
        $this->addRequire('drupal/mailsystem', '4.1');
        $this->addRequire('drupal/message', '1.0-beta2');
        $this->addRequire('drupal/override_node_options', '2.1');
        $this->addRequire('drupal/profile', '1.0-beta1');
        $this->addRequire('drupal/r4032login', '1.x-dev#4b2077aa70e3f7b00b8a9cba25af5b948ba2e3b9');
        $this->addRequire('drupal/search_api', '1.3');
        $this->addRequire('drupal/swiftmailer', '1.0-beta1');
        $this->addRequire('drupal/token', '1.0');
        $this->addRequire('drupal/views_infinite_scroll', '1.4');
        $this->addRequire('drupal/votingapi', '3.0-alpha2');
        $this->addRequire('drupal/bootstrap', '3.5');
        $this->addRequire('drupal/csv_serialization', '1.0');
        $this->addRequire('league/csv', '^7.1');
        $this->addRequire('drupal/social_api', '1.1');

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
        $this->addExtra('patches', [
        'drupal/core' => [
          'Clean up user input for exposed checkboxes' => 'https://www.drupal.org/files/issues/2687773-18-Cleanup-user-input-for-checkboxes-8.2.patch',
          'Color module html preview optional' => 'https://www.drupal.org/files/issues/color-optional-html-preview-2844190-2.patch',
        ],
        'drupal/like_and_dislike' => [
          'Fix preview on node' => 'https://www.drupal.org/files/issues/2848080-2-preview-fails-on-node.patch',
        ],
        ]);
    }
}
