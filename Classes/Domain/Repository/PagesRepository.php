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
     * ID of the parent folder|0 if we are at root level
     *
     * @var integer
     */
    protected $_parent = 0;

    /**
     * find all children of given page
     *
     * @param integer $uid            
     */
    public function findChildren ($uid)
    {
        $sql = "SELECT * FROM `pages` WHERE `no_search` = 0 AND `pid` = {$uid}";
        $query = $this->createQuery();
        $query->statement($sql);
        return $query->execute();
        
        /*
        
        $query = $this->createQuery();
        // $this->setQuerySettings($query);
        
        $constraint = $query->logicalAnd($query->equals('pid', $uid));
        
        return $query->matching($constraint)->execute();
        */
    }

    /**
     * Set the parent level for all calls
     *
     * @param ingeger $parent            
     */
    public function setParent ($parent = 0)
    {
        $this->_parent = $parent;
    }

    /**
     * return the parent level
     *
     * @return number
     */
    public function getParent ()
    {
        return $this->_parent;
    }

    /**
     * Find files by a group
     *
     * @param Tx_Feupload_Domain_Model_Group $group            
     * @return array
     */
    public function findByGroup ($group)
    {
        $query = $this->createQuery();
        $this->setQuerySettings($query);
        
        $constraint = $query->logicalAnd(
                $query->equals('parent', $this->_parent), 
                $query->contains('feGroups', $group), 
                $query->equals('visibility', 
                        Tx_Feupload_Domain_Model_Folder::VISIBILITY_GROUPS));
        
        return $query->matching($constraint)->execute();
    }

    /**
     * Find by visibility setting
     *
     * @param integer $visibility
     *            for everyone, -1 for "Only guests", -2 for "Only logged-in"
     * @return array
     */
    public function findByVisibility ($visibility)
    {
        $query = $this->createQuery();
        $this->setQuerySettings($query);
        
        $query->matching(
                $query->logicalAnd($query->equals('visibility', $visibility), 
                        $query->equals('parent', $this->_parent)));
        return $query->execute();
    }

    /**
     * all Folders parent folder
     *
     * @param Tx_Feupload_Domain_Model_Folder $parent            
     * @return integer
     */
    public function numChildren (Tx_Feupload_Domain_Model_Folder $parent)
    {
        $query = $this->createQuery();
        
        $this->setQuerySettings($query);
        $query->matching($query->equals('parent', $parent->getUid()));
        $ret = $query->count();
        return $ret;
    }

    /**
     * Sets query settings
     *
     * @param
     *            Tx_Extbase_Persistence_Query		&$query
     */
    protected function setQuerySettings (Tx_Extbase_Persistence_Query &$query)
    {
        if ((int) $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['hriseo']['enableStoragePage'] ==
                 0) {
            $query->getQuerySettings()->setRespectStoragePage(false);
        }
    }
}
?>
