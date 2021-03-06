<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2012 Ralf Schneider <ralf@hr-interactive.de>
*  All rights reserved
*
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Pages repository
 *
 * @package Hriseo
 * @subpackage Domain\Model
 * @author Ralf Schneider
 */
class Tx_Hriseo_Domain_Model_Pages extends Tx_Extbase_DomainObject_AbstractEntity
{

    /**
     * timestamp of last change
     *
     * @var string
     */
    protected $lastmod;

    /**
     *
     * @var string
     */
    protected $changefreq;

    /**
     *
     * @var float
     */
    protected $priority;

    /**
     *
     * @return string
     */
    public function getLastmod ()
    {
        return $this->lastmod;
    }

    /**
     *
     * @return string
     */
    public function getChangefreq ()
    {
        return $this->changefreq;
    }

    /**
     *
     * @param string $changefreq            
     */
    public function setChangefreq ($changefreq)
    {
        $this->changefreq = $changefreq;
    }

    /**
     *
     * @return number
     */
    public function getPriority ()
    {
        return $this->priority;
    }

    /**
     *
     * @param string $priority            
     */
    public function setPriority ($priority)
    {
        $this->priority = $priority;
    }

    /**
     *
     * @return boolean
     */
    public function getIsValid ()
    {
        return (boolean) (0 != $this->lastmod);
    }
}
