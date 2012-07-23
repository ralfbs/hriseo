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
 * generate sitemap.xml
 *
 * @package Hriseo
 * @subpackage Controller
 * @author Ralf Schneider
 */
class Tx_Hriseo_Controller_SitemapController extends Tx_Extbase_MVC_Controller_ActionController
{

    /**
     * pagesRepository
     *
     * @var Tx_Hriseo_Domain_Repository_PagesRepository
     */
    protected $pagesRepository;

    /**
     *
     * @return void
     */
    public function showAction ()
    {   
        $pages = $this->pagesRepository->findSitemap();
        $this->view->assign('tree', $pages);
    }

    /**
     * injectPagesRepository
     *
     * @param $pagesRepository Tx_Hriseo_Domain_Repository_PagesRepository            
     * @return void
     */
    public function injectPagesRepository (
            Tx_Hriseo_Domain_Repository_PagesRepository $pagesRepository)
    {
        $this->pagesRepository = $pagesRepository;
    }
}