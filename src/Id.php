<?php

namespace Kickstart;

class Id
{

    public static function getID()
    {
        if (file_exists('id')) {
            $id = (int) file_get_contents('id');
            $id++;

            file_put_contents('id', $id);

            return $id;
        } else {
            file_put_contents('id', '1');
            return 1;
        }
    }
}
