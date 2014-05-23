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

abstract class Reader
{
    abstract public function read($file);
    abstract public function write($file, $data, $merge);
}
