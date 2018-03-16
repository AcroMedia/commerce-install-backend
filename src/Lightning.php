<?php

namespace Kickstart;

class Lightning extends Base
{

    public function __construct()
    {
        parent::__construct('Commerce Kickstart', 'Generated on commercekickstart.com');
        $this->loadFromFile('https://raw.githubusercontent.com/acquia/lightning-project/master/composer.json');
    }
}
