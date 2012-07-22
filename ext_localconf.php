<?php
if (! defined('TYPO3_MODE')) {
    die('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin($_EXTKEY, 'Robots', 
        array(
                'Robots' => 'show'
        ), 
        // non-cacheable actions
        array(
                'Robots' => 'show'
        )
        );

Tx_Extbase_Utility_Extension::configurePlugin($_EXTKEY, 'Sitemap',
array(
        'Sitemap' => 'show'
        ),
        // non-cacheable actions
        array(
        'Sitemap' => 'show'
                )
);


// hook into realurl auto configuration
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/realurl/class.tx_realurl_autoconfgen.php']['extensionConfiguration']['hriseo'] = 'EXT:hriseo/Classes/Hook/Realurl.php:Tx_Hriseo_Hook_Realurl->addHriseo';

?>