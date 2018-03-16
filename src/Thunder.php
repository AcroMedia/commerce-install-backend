<?php

namespace Kickstart;

class Thunder extends Base
{

    public function __construct()
    {
        parent::__construct();
        $this->loadFromFile('https://raw.githubusercontent.com/BurdaMagazinOrg/thunder-project/2.x/composer.json');
    }
}
