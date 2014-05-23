<?php
/*
 * This file is part of Pagestic project.
 *
 * (c) Khaled Attia <khaled.attia@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pagestic\Console;

use Symfony\Component\Console\Application;

class Console extends Application
{
    private static $logo = '
# # # # # # # # # # # # # # # # # # # # # # # #
#    ____                       _   _         #
#   |  _ \ __ _  __ _  ___  ___| |_(_) ___    #
#   | |_) / _` |/ _` |/ _ \/ __| __| |/ __|   #
#   |  __/ (_| | (_| |  __/\__ \ |_| | (__    #
#   |_|   \__,_|\__, |\___||___/\__|_|\___|   #
#               |___/                         #
# # # # # # # # # # # # # # # # # # # # # # # #

';

    /**
     * {@inheritDoc}
     */
    protected function getDefaultCommands()
    {
        $commands = parent::getDefaultCommands();
        $commands[] = new \Pagestic\Command\AboutCommand();
        $commands[] = new \Pagestic\Command\InitCommand();
        return $commands;
    }

    /**
     * {@inheritDoc}
     */
    public function getHelp()
    {
        return self::$logo . parent::getHelp();
    }

}
