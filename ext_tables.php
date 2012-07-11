<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'HR Interactive SEO');

Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Robots', 'Generate a robots.txt');


?>