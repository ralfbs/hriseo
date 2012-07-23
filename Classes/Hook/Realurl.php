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
 * generate robots.txt
 *
 * @package Hriseo
 * @subpackage Hook
 * @author Ralf Schneider
 */
class Tx_Hriseo_Hook_Realurl
{

    /**
     * add specific configuration to realUrl
     *
     * @param array $params            
     * @param tx_realurl_autoconfgen $pObj            
     * @return array
     */
    public function addHriseo (array $params, tx_realurl_autoconfgen $pObj)
    {
        $ret = array_merge_recursive($params['config'], 
                array(
                        'fileName' => array(
                                'index' => array(
                                        'robots.txt' => array(
                                                'keyValues' => array(
                                                        'type' => '201'
                                                )
                                        ),
                                        'sitemap.xml' => array(
                                                'keyValues' => array(
                                                        'type' => '202'
                                                )
                                        )
                                )
                        )
                ));
        $ret['init'] = array(
                'enableCHashCache' => '1',
                'appendMissingSlash' => 'ifNotFile',
                'enableUrlDecodeCache' => '1',
                'enableUrlEncodeCache' => '1'
        );
        $ret['fileName']['defaultToHTMLsuffixOnPrev'] = 0;
        $ret['fileName']['acceptHTMLsuffix'] = 0;
        return $ret;
    }
}