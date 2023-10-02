<?php
/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 w-vision AG (https://www.w-vision.ch)
 * @license    https://github.com/w-vision/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace Wvision\Bundle\DataDefinitionsBundle\Interpreter;

use Carbon\Carbon;
use Wvision\Bundle\DataDefinitionsBundle\Context\InterpreterContextInterface;

class CarbonInterpreter implements InterpreterInterface
{
    public function interpret(InterpreterContextInterface $context): bool|null|\Carbon\Carbon
    {
        if ($context->getValue()) {
            $format = $context->getConfiguration()['date_format'];
            if (!empty($format)) {
                return Carbon::createFromFormat($format, $context->getValue());
            }

            return new Carbon($context->getValue());
        }

        return null;
    }
}
