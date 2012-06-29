<?php

########################################################################
# Extension Manager/Repository config file for ext "hriseo".
#
# Auto generated 29-06-2012 11:06
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'hr-interactive SEO',
	'description' => 'assembly of SEO tools like meta tags, canonical page tags, real_url etc',
	'category' => 'plugin',
	'author' => 'Ralf Schneider',
	'author_email' => 'ralf@hr-interactive.de',
	'author_company' => 'hr-interactive',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.1.0',
	'constraints' => array(
		'depends' => array(
			'extbase' => '1.3',
			'fluid' => '1.3',
			'typo3' => '4.5-0.0.0',
			'realurl' => '1.11',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:12:{s:21:"ExtensionBuilder.json";s:4:"17d5";s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"6033";s:14:"ext_tables.php";s:4:"227d";s:14:"ext_tables.sql";s:4:"d41d";s:44:"Configuration/ExtensionBuilder/settings.yaml";s:4:"dbb3";s:38:"Configuration/TypoScript/constants.txt";s:4:"4fe0";s:34:"Configuration/TypoScript/setup.txt";s:4:"de2a";s:40:"Resources/Private/Language/locallang.xml";s:4:"03ec";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"e08c";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:14:"doc/manual.sxw";s:4:"760b";}',
);

?>