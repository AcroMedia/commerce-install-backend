<?php

namespace Kickstart;

class Thunder extends Base {

  public function __construct() {
    parent::__construct('Kickstart', 'Automatically Generated Commerce Kickstart Composer File');

    // Type
    $this->setType('project');

    // Require Dev
    $this->addRequireDev('burdamagazinorg/thunder-dev-tools', 'dev-master');
    $this->addRequireDev('behat/mink-selenium2-driver', 'dev-master');

    //todo: add replace functionality to accompanist: https://getcomposer.org/doc/04-schema.md#replace

    // Require
    $this->addRequire('drupal-composer/drupal-scaffold', '^2.0.0');
    $this->addRequire('cweagans/composer-patches', '^1.6.0');
    $this->addRequire('burdamagazinorg/infinite_module', '^1.0');
    $this->addRequire('burdamagazinorg/infinite_theme', '^1.0');
    $this->addRequire('composer/installers', '^1.0');
    $this->addRequire('cweagans/composer-patches', '~1.0');
    $this->addRequire('drupal/amp', '1.0');
    $this->addRequire('drupal/amptheme', '1.0');
    $this->addRequire('oomphinc/composer-installers-extender', '^1.1');
    $this->addRequire('drupal/access_unpublished', '^1.0');
    $this->addRequire('drupal/adsense', '^1.0');
    $this->addRequire('drupal/admin_toolbar', '^1.0');
    $this->addRequire('drupal/better_normalizers', '^1.0');
    $this->addRequire('drupal/blazy', '^1.0');
    $this->addRequire('drupal/breakpoint_js_settings', '^1.0');
    $this->addRequire('drupal/checklistapi', '^1.0');
    $this->addRequire('drupal/core', '^8.3.0');
    $this->addRequire('drupal/config_update', '^1.0');
    $this->addRequire('drupal/content_lock', '^1.0');
    $this->addRequire('drupal/crop', '^1.0');
    $this->addRequire('drupal/ctools', '^3.0');
    $this->addRequire('drupal/default_content', '^1.0');
    $this->addRequire('drupal/diff', '1.0-rc1');
    $this->addRequire('drupal/dropzonejs', '1.0-alpha7');
    $this->addRequire('drupal/empty_fields', '^1.0');
    $this->addRequire('drupal/entity', '^1.0');
    $this->addRequire('drupal/entity_browser', '1.0');
    $this->addRequire('drupal/entity_reference_revisions', '^1.0');
    $this->addRequire('drupal/fb_instant_articles', 'dev-1.x');
    $this->addRequire('drupal/field_group', '1.0-rc6');
    $this->addRequire('drupal/focal_point', '^1.0');
    $this->addRequire('drupal/google_analytics', '^2.0');
    $this->addRequire('drupal/inline_entity_form', '^1.0');
    $this->addRequire('drupal/ivw_integration', '^1.0');
    $this->addRequire('drupal/libraries', 'dev-3.x');
    $this->addRequire('drupal/linkit', '^4.0');
    $this->addRequire('drupal/liveblog', '^1.0');
    $this->addRequire('drupal/media_entity', '1.6');
    $this->addRequire('drupal/media_entity_instagram', '^1.0');
    $this->addRequire('drupal/media_entity_image', '^1.0');
    $this->addRequire('drupal/media_entity_pinterest', '1.0-beta1');
    $this->addRequire('drupal/media_entity_slideshow', '^1.0');
    $this->addRequire('drupal/media_entity_twitter', '^1.0');
    $this->addRequire('drupal/media_expire', '^1.0');
    $this->addRequire('drupal/nexx_integration', '^1.0');
    $this->addRequire('drupal/metatag', '^1.0');
    $this->addRequire('drupal/paragraphs', '1.1');
    $this->addRequire('drupal/pathauto', '^1.0');
    $this->addRequire('drupal/responsive_preview', '^1.0');
    $this->addRequire('drupal/riddle_marketplace', '^2.0');
    $this->addRequire('drupal/scheduler', '^1.0');
    $this->addRequire('drupal/simple_sitemap', '^2.0');
    $this->addRequire('drupal/shariff', '^1.0');
    $this->addRequire('drupal/slick', '^1.0');
    $this->addRequire('drupal/slick_media', '^1.0');
    $this->addRequire('drupal/thunder_admin', '>=1');
    $this->addRequire('drupal/token', '^1.0');
    $this->addRequire('drupal/video_embed_field', '^1.0');
    $this->addRequire('drupal/views_load_more', 'dev-1.x');
    $this->addRequire('valiton/harbourmaster', '~8.1');
    $this->addRequire('bower-asset/dropzone', '^4.2');
    $this->addRequire('bower-asset/blazy', '^1.6.0');
    $this->addRequire('bower-asset/slick-carousel', '^1.6');
    $this->addRequire('bower-asset/shariff', '^1.24');

    // Extras
    $this->setExtra([
      'installer-paths' => [
        'docroot/core' => [
          'type:drupal-core',
        ],
        'docroot/modules/contrib/[$name]' => [
          'type:drupal-module',
        ],
        'docroot/profiles/contrib/[$name]' => [
          'type:drupal-profile',
        ],
        'docroot/themes/contrib/[$name]' => [
          'type:drupal-theme',
        ],
        'drush/contrib/[$name]' => [
          'type:drupal-drush',
        ],
      ],
      'patches' => [
        "drupal/media_entity" => [
          "Make the label form element non-required in the entity form" => "https://www.drupal.org/files/issues/2813685-21.patch",
        ],
        "drupal/diff" => [
          "Back button for comparison page" => "https://www.drupal.org/files/issues/back_button_for-2853193-4.patch",
        ],
        "drupal/paragraphs" => [
          "create a NEW paragraph 'in place' between existing ones" => "https://www.drupal.org/files/issues/2899034_7.patch",
        ],
        "drupal/amp" => [
          "Missing schema" => "https://www.drupal.org/files/issues/missing_schema_for-2878769-3.patch",
        ],
        "drupal/amptheme" => [
          "Don't use network for loading logo information" => "https://www.drupal.org/files/issues/amptheme-do_not_use_the_network_for_loading_logo_information-2753089-7.patch",
        ],
        "drupal/entity_browser" => [
          "Provide inline entity form FieldWidgetDisplay" => "https://www.drupal.org/files/issues/2858438_6.patch",
        ],
        "drupal/dropzonejs" => [
          "Theming compatible JS selectors for auto select" => "https://www.drupal.org/files/issues/2870708_2.patch",
        ],
        "drupal/field_group" => [
          "Form mode ignored as field groups always attached to 'default' form mode" => "https://www.drupal.org/files/issues/field_group-form-mode-ignored-2842354-2.patch",
        ],
        "drupal/media_entity_pinterest" => [
          "Media name always 'h'" => "https://www.drupal.org/files/issues/media_name_always_h-2837977-8.patch",
        ],
      ],
    ]);

  }
}
