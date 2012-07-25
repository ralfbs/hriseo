<?php



$EM_CONF[$_EXTKEY] = array(
	'title' => 'Search Engine Toolkit',
	'description' => 'Create sitemap.xml, robots.txt, canonical page tags and configures realurl',
	'category' => 'fe',
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
	'version' => '0.5.0',
	'constraints' => array(
		'depends' => array(
			'extbase' => '1.3',
			'fluid' => '1.3',
			'typo3' => '4.5-0.0.0',
			'realurl' => '1.11',
		),
		'conflicts' => array(
		        'mc_googlesitemap' => '0.4.2',
		),
		'suggests' => array(
		),
	),
);

?>