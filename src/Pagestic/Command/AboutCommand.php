<?php
/*
 * This file is part of Pagestic project.
 *
 * (c) Khaled Attia <khaled.attia@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pagestic\Command;

use Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface;

use Pagestic\Command\Command;

class AboutCommand extends Command {

    protected function configure()
    {
        $this
            ->setName('about')
            ->setDescription('Short information about Pagestic')
            ->setHelp('<info>pagestic about</info>')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(<<<EOT
<info>Pagestic - The static site generator</info>
<comment>See http://github.com/khal3d/pagestic for more information.</comment>
EOT
        );
    }

}
