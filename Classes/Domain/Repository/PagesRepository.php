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
 * @subpackage Domain\Repository
 * @author Ralf Schneider
 */
class Tx_Hriseo_Domain_Repository_PagesRepository extends Tx_Extbase_Persistence_Repository
{

    /**
     * Collection of found pages
     * 
     * @var array
     */
    protected $pages = array();

    /**
     * ID of the parent folder|0 if we are at root level
     *
     * @var integer
     */
    protected $_parent = 0;

    /**
     * find all children of given page
     *
     * @param
     *            integer starting point
     * @return array
     */
    public function findSitemap ($uid = 0)
    {
        $page = $this->findByUid($uid);
        if ($page instanceof Tx_Hriseo_Domain_Model_Pages) {
            $this->pages[$uid] = $page;
        }
        foreach ($this->findChildren($uid, $page) as $child) {
            $this->pages[$child->getUid()] = $child;
            $this->findSitemap($child->getUid());
        }
        return $this->pages;
    }

    /**
     * Find all children of the given page
     * optional inherit priority and changefreq
     *
     * @param integer $uid            
     * @param Tx_Hriseo_Domain_Model_Pages $parent            
     * @return array
     */
    public function findChildren ($uid, 
            Tx_Hriseo_Domain_Model_Pages $parent = null)
    {
        $pages = array();
        
        $sql = "SELECT * FROM `pages` ";
        $sql .= "WHERE `no_search` = 0 AND `deleted` = 0 ";
        $sql .= "AND `doktype` = 1 AND `pid` = {$uid} ";
        $query = $this->createQuery();
        $query->statement($sql);
        foreach ($query->execute() as $page) {
            if ($parent instanceof Tx_Hriseo_Domain_Model_Pages) {
                if ('' != $parent->getChangefreq()) {
                    $page->setChangefreq($parent->getChangefreq());
                }
                if (0 < $parent->getPriority()) {
                    $page->setPriority($parent->getPriority());
                }
            }
            $pages[] = $page;
        }
        return $pages;
    }

    /**
     * (non-PHPdoc)
     *
     * @see Tx_Extbase_Persistence_Repository::findByUid()
     */
    public function findByUid ($uid)
    {
        $sql = "SELECT * FROM `pages` WHERE `uid` = {$uid} ";
        $query = $this->createQuery();
        $query->statement($sql);
        $res = $query->execute();
        return $res->getFirst();
    }

    /**
     * find pages that are marked 'no search' (for robots.txt)
     *
     * @return Ambigous <Tx_Extbase_Persistence_QueryResultInterface,
     *         multitype:>
     */
    public function findNoSearch ()
    {
        $sql = "SELECT * FROM `pages` WHERE `no_search` = 1 AND `deleted` = 0 ";
        $query = $this->createQuery();
        $query->statement($sql);
        return $query->execute();
    }
}
?>
