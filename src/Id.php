<?php

namespace Kickstart;

class Id {

  public static function getID() {
    $filename = 'generated/id';
    if (file_exists($filename)) {
      $id = (int) file_get_contents($filename);
      $id++;

      file_put_contents($filename, $id);

      return $id;
    }
    else {
      file_put_contents($filename, '1');
      return 1;
    }
  }
}
