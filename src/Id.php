<?php

namespace Kickstart;

class Id
{

    public static function getID()
    {
        if (file_exists('generated/id')) {
            $id = (int) file_get_contents('id');
            $id++;

            file_put_contents('generated/id', $id);

            return $id;
        } else {
            file_put_contents('generated/id', '1');
            return 1;
        }
    }
}
