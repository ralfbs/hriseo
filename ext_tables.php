<?php
if (! defined('TYPO3_MODE')) {
    die('Access denied.');
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 
        'HR Interactive SEO');

Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Robots', 
        'Generate a robots.txt');

/*
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT']['fileName']['defaultToHTMLsuffixOnPrev'] = true;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT']['fileName']['index']['robots.txt'] = array(
        'keyValues' => array(
                'type' => '201'
        )
);
*/
/*
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = array(
        '_DEFAULT' => array(
                'init' => array(
                        'enableCHashCache' => '1',
                        'appendMissingSlash' => 'ifNotFile',
                        'enableUrlDecodeCache' => '1',
                        'enableUrlEncodeCache' => '1'
                ),
                'redirects' => array(),
                'preVars' => array(
                        '0' => array(
                                'GETvar' => 'L',
                                'valueMap' => array(
                                        'de' => '0',
                                        'en' => '1'
                                ),
                                'noMatch' => 'bypass'
                        ),
                        '1' => array(
                                'GETvar' => 'lang',
                                'valueMap' => array(
                                        'de' => 'de',
                                        'en' => 'en'
                                ),
                                'noMatch' => 'bypass'
                        )
                ),
                'pagePath' => array(
                        'type' => 'user',
                        'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
                        'spaceCharacter' => '-',
                        'languageGetVar' => 'L',
                        'expireDays' => '7',
                        'rootpage_id' => '1'
                ),
                'fixedPostVars' => array(),
                'postVarSets' => array(
                        '_DEFAULT' => array(
                                'archive' => array(
                                        '0' => array(
                                                'GETvar' => 'tx_ttnews[year]'
                                        ),
                                        '1' => array(
                                                'GETvar' => 'tx_ttnews[month]',
                                                'valueMap' => array(
                                                        'januar' => '01',
                                                        'februar' => '02',
                                                        'maerz' => '03',
                                                        'april' => '04',
                                                        'mai' => '05',
                                                        'juni' => '06',
                                                        'juli' => '07',
                                                        'august' => '08',
                                                        'september' => '09',
                                                        'oktober' => '10',
                                                        'november' => '11',
                                                        'dezember' => '12'
                                                )
                                        )
                                ),
                                'browse' => array(
                                        '0' => array(
                                                'GETvar' => 'tx_ttnews[pointer]'
                                        )
                                ),
                                'select_category' => array(
                                        '0' => array(
                                                'GETvar' => 'tx_ttnews[cat]'
                                        )
                                ),
                                'article' => array(
                                        '0' => array(
                                                'GETvar' => 'tx_ttnews[tt_news]',
                                                'lookUpTable' => array(
                                                        'table' => 'tt_news',
                                                        'id_field' => 'uid',
                                                        'alias_field' => 'title',
                                                        'addWhereClause' => ' AND NOT deleted',
                                                        'useUniqueCache' => '1',
                                                        'useUniqueCache_conf' => array(
                                                                'strtolower' => '1',
                                                                'spaceCharacter' => '-'
                                                        )
                                                )
                                        ),
                                        '1' => array(
                                                'GETvar' => 'tx_ttnews[swords]'
                                        )
                                )
                        )
                ),
                'fileName' => array(
                        'defaultToHTMLsuffixOnPrev' => true,
                        'index' => array(
                                'rss.xml' => array(
                                        'keyValues' => array(
                                                'type' => '100'
                                        )
                                ),
                                'rss091.xml' => array(
                                        'keyValues' => array(
                                                'type' => '101'
                                        )
                                ),
                                'rdf.xml' => array(
                                        'keyValues' => array(
                                                'type' => '102'
                                        )
                                ),
                                'atom.xml' => array(
                                        'keyValues' => array(
                                                'type' => '103'
                                        )
                                )
                        )
                )
        )
);
*/

?>