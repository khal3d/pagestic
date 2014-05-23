<?php
/*
 * This file is part of Pagestic project.
 *
 * (c) Khaled Attia <khaled.attia@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pagestic\ConfigurationFile;

use Pagestic\ConfigurationFile\Reader;

class JsonReader extends Reader
{
    public function read($file)
    {
        try {
            $json = file_get_contents($file);
        } catch (\Exception $e) {
            throw new \RuntimeException('Could not read '. $file ."\n\n". $e->getMessage());
        }

        return json_decode($json, TRUE);
    }

    public function write($file, $data, $merge = TRUE)
    {
        try {
            if( $merge == TRUE && file_exists($file) ) {
                $data = array_merge(self::read($file), $data);
            }

            file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

        } catch (\Exception $e) {
            throw new \RuntimeException('Could not write to '. $file ."\n\n". $e->getMessage());
        }
    }
}
