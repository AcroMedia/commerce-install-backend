<?php

namespace Kickstart;

class OpenEDU extends Base
{

    public function __construct()
    {
        parent::__construct();
        $this->loadFromFile('https://bitbucket.org/ixm/openedu/raw/8.3.0/composer.json');
    }
}
