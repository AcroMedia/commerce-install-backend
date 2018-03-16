<?php

namespace Kickstart;

use Accompanist\Accompanist;

class Base extends Accompanist
{

    public function __construct()
    {
        parent::__construct('Commerce Kickstart', 'Generated on commercekickstart.com');
        $this->loadFromFile('https://raw.githubusercontent.com/drupalcommerce/project-base/8.x/composer.json');
        // Conflict
        $this->setConflict(['drupal/drupal' => '*']);
    }
}
