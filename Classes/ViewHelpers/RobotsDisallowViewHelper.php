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
 * Generates an disallow entry for robots.txt
 *
 * @package Hriseo
 * @subpackage ViewHelpers
 * @author Ralf Schneider
 */
class Tx_Hriseo_ViewHelpers_RobotsDisallowViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractTagBasedViewHelper
{

    /**
     *
     * @var Tx_Extbase_Configuration_ConfigurationManagerInterface
     */
    protected $configurationManager;

    /**
     *
     * @var array
     */
    protected $settings;

    /**
     * (non-PHPdoc)
     *
     * @see Tx_Fluid_Core_ViewHelper_AbstractTagBasedViewHelper::initialize()
     */
    public function initialize ()
    {
        // 1st param: must be 'Settings'
        // 2nd param: name of extension
        // 3rd param: name of plugin
        $this->settings = $this->configurationManager->getConfiguration(
                'Settings', 'Hriseo', 'Robots');
    }

    /**
     * render the tags for one page (<loc> and <lastmod>)
     *
     * @param Tx_Hriseo_Domain_Model_Pages $page            
     * @return string
     */
    public function render ($page)
    {
        $cObj = new tslib_cObj();
        $path = $cObj->getTypoLink_URL($page->getUid());
        
        return sprintf("Disallow: /%s", $path);
    }

    /**
     * inject configurationMangager
     * 
     * @param Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager            
     */
    public function injectConfigurationManager (
            Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager)
    {
        $this->configurationManager = $configurationManager;
    }
}
