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
 * Generates an url entry for the sitemap.xml
 *
 * @package Hriseo
 * @subpackage ViewHelpers
 * @author Ralf Schneider
 */
class Tx_Hriseo_ViewHelpers_SitemapUrlViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractTagBasedViewHelper
{
    /**
     * 
     * @var Tx_Fluid_Core_ViewHelper_TagBuilder
     */
    protected $tagBuilder;
    
    /**
     * loc tag
     *
     * @var Tx_Fluid_Core_ViewHelper_TagBuilder
     */
    protected $loc;

    /**
     * lastmod tag
     *
     * @var Tx_Fluid_Core_ViewHelper_TagBuilder
     */
    protected $lastmod;

    /**
     *
     * @var array
     */
    protected $settings;

    /**
     *
     * @var Tx_Extbase_Configuration_ConfigurationManagerInterface
     */
    protected $configurationManager;

    public function injectConfigurationManager (
            Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager)
    {
        $this->configurationManager = $configurationManager;
    }

    /**
     * (non-PHPdoc)
     *
     * @see Tx_Fluid_Core_ViewHelper_AbstractTagBasedViewHelper::initialize()
     */
    public function initialize ()
    {
        $this->loc = new Tx_Fluid_Core_ViewHelper_TagBuilder();
        $this->loc->setTagName('loc');
        
        $this->lastmod = new Tx_Fluid_Core_ViewHelper_TagBuilder();
        $this->lastmod->setTagName('lastmod');
        
        $this->tagBuilder = new Tx_Fluid_Core_ViewHelper_TagBuilder();
        
        // 1st param: must be 'Settings'
        // 2nd param: name of extension
        // 3rd param: name of plugin
        $this->settings = $this->configurationManager->getConfiguration(
                'Settings', 'Hriseo', 'Sitemap');
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
        
        // @see http://sitemaps.org and
        // http://php.net/manual/de/function.htmlspecialchars.php
        $link = htmlspecialchars($this->settings['baseURL'] . $path, ENT_QUOTES, 
                'UTF-8', false);
        
        $this->loc->setContent($link);
        $ret = $this->loc->render();
        
        $date = new DateTime();
        $date->setTimestamp($page->getLastmod());
        
        $this->lastmod->setContent($date->format('Y-m-d'));
        $ret .= $this->lastmod->render();
        
        $changefreq = $page->getChangefreq();
        if (!empty($changefreq)) {
            $this->tagBuilder->reset();
            $this->tagBuilder->setTagName('changefreq');
            $this->tagBuilder->setContent($changefreq);
            $ret .= $this->tagBuilder->render();
        }
        
        $priority = $page->getPriority();
        // 0.0: ignore
        // 0.5: default - do not display
        if (0 < $priority and 0.5 != $priority) {
            $this->tagBuilder->reset();
            $this->tagBuilder->setTagName('priority');
            $this->tagBuilder->setContent(number_format($priority, 1));
            $ret .= $this->tagBuilder->render();            
        }
        
        return $ret;
    }
}
