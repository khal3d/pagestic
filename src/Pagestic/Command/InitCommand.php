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
    Symfony\Component\Console\Output\OutputInterface,
    Symfony\Component\Console\Input\InputOption;

use Pagestic\Command\Command,
    Pagestic\ConfigurationFile\JsonReader;

class InitCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('init')
            ->setDescription('Creates a basic pagestic.json file in current directory.')
            ->setDefinition(array(
                new InputOption('name', null, InputOption::VALUE_REQUIRED, 'Name of the site')
            ))
            ->setHelp(<<<EOT
The <info>init</info> command creates a basic pagestic.json file
in the current directory.

<info>pagestic init</info>

EOT
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dialog = $this->getHelperSet()->get('dialog');

        $whitelist_options = array('name');

        $options = array_filter(array_intersect_key($input->getOptions(), array_flip($whitelist_options)));

        JsonReader::write('pagestic.json', $options);
    }

}
