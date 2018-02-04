<?php

namespace Kickstart;

use Exception;
use Phar;
use PharData;

class PackageGenerator
{

    public static function generatePackage($id, $composerJSON)
    {

        // Package Generation, move into function/class at some point
        @mkdir('generated');

        $folder = 'generated/kickstart-' . $id;

        $filename = $folder . '.tar';

        try {
            $tar = new PharData($filename);

            $tar->addFromString('composer.json', $composerJSON->generateJSON());
            $tar->addEmptyDir('scripts');
            $tar->addEmptyDir('scripts/composer');
            $tar->addFile('../templates/README.md', 'README.md');
            $tar->addFile(
                '../templates/ScriptHandler.php',
                'scripts/composer/ScriptHandler.php'
            );

            $tar->compress(Phar::GZ);

            unlink($filename);
        } catch (Exception $e) {
            echo "Exception : " . $e;
        }

        return $filename;
    }
}
