<?php
if (! defined('TYPO3_MODE')) {
    die('Access denied.');
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 
        'HR Interactive SEO');

Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Robots', 
        'Generate a robots.txt');

Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Sitemap',
'Generate a sitemap.xml');


/**
 * Add the new columns to the pages TCA
 */
$tmp_hriseo_columns = include_once t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/pages.php';


// add to TCA
t3lib_div::loadTCA('pages');
t3lib_extMgm::addTCAcolumns('pages',$tmp_hriseo_columns, 1);

// add to TCA::ctrl section
$TCA['pages']['columns'][$TCA['pages']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo.title','Tx_Hriseo_Pages');


// add editing tab to types:1 (pages does only have one type..)

$TCA['pages']['types']['1']['showitem'] = $TCA['pages']['types']['1']['showitem'];
$TCA['pages']['types']['1']['showitem'] .= ',--div--;LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo.title,';
$TCA['pages']['types']['1']['showitem'] .= 'tx_hriseo_frequency, tx_hriseo_priority';




?>