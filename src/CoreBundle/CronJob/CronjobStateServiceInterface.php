<?php

/*
 * This file is part of the Chameleon System (https://www.chameleonsystem.com).
 *
 * (c) ESONO AG (https://www.esono.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ChameleonSystem\CoreBundle\CronJob;

use ChameleonSystem\CoreBundle\Exception\CronjobHandlingException;

interface CronjobStateServiceInterface
{
    /**
     * @throws CronjobHandlingException
     */
    public function isCronjobRunning(): bool;
}