<?php
/*
 * This file is part of Pagestic project.
 *
 * (c) Khaled Attia <khaled.attia@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pagestic\Command\Helper;

use Symfony\Component\Console\Helper\DialogHelper as BaseDialogHelper;

class DialogHelper extends BaseDialogHelper
{
    /**
     * Build text for asking a question. For example:
     *
     *  "Do you want to continue [yes]:"
     *
     * @param string $question  The question you want to ask
     * @param mixed  $default   Default value to add to message, if false no default will be shown
     *
     * @return string
     */
    public function getQuestion($question, $default = NULL)
    {
        return $default !== NULL ?
            sprintf('<question>%s</question> [<comment>%s</comment>]: ', $question, $default) :
            sprintf('<question>%s</question>: ', $question);
    }
}
