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
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setName('init')
            ->setDescription('Creates a basic pagestic.json file in current directory.')
            ->setDefinition(array(
                new InputOption('name', null, InputOption::VALUE_REQUIRED, 'Name of the site', 'Untitled'),
                new InputOption('description', null, InputOption::VALUE_REQUIRED, 'Site description - summary of what your website is about', 'This site is powered by Pagestic - The static sites generator'),
                new InputOption('content-dir', null, InputOption::VALUE_REQUIRED, 'Content directory - Where will you put your source content', './_content/'),
            ))
            ->setHelp(<<<EOT
The <info>init</info> command creates a basic pagestic.json file
in the current directory.

<info>pagestic init</info>

EOT
            )
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Initializing message
        $output->writeln("Initializing new project");

        $dialog = $this->getHelperSet()->get('dialog');

        $whitelist_options = array('name', 'description', 'content-dir');

        $options = array_filter(array_intersect_key($input->getOptions(), array_flip($whitelist_options)));

        // Ask about site name
        $name = $input->getOption('name') ?: FALSE;
        $name = $dialog->ask(
            $output,
            $dialog->getQuestion('Site name', $name),
            $name
        );
        $input->setOption('name', $name);

        // Ask about site description
        $description = $input->getOption('description') ?: FALSE;
        $description = $dialog->ask(
            $output,
            $dialog->getQuestion('Description', $description),
            $description
        );
        $input->setOption('description', $description);

        // Ask about content direcotry
        $content_dir = $input->getOption('content-dir') ?: FALSE;
        $content_dir = $dialog->ask(
            $output,
            $dialog->getQuestion('Content direcotry', $content_dir),
            $content_dir
        );
        $input->setOption('content-dir', $content_dir);


        if ( ! $dialog->askConfirmation($output, '<question>Do you confirm generation?</question> [Y/N] ', TRUE))
        {
            $output->writeln('<error>Command aborted</error>');

            return TRUE;
        }

        JsonReader::write('pagestic.json', $options);
    }
}
