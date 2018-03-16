<?php

namespace Kickstart;

class OpenSocial extends Base
{

    public function __construct()
    {
        parent::__construct();
        $this->loadFromFile('https://raw.githubusercontent.com/goalgorilla/drupal_social/master/composer.json');
    }
}
