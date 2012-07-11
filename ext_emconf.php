<?php



$EM_CONF[$_EXTKEY] = array(
	'title' => 'hr-interactive SEO',
	'description' => 'assembly of SEO tools like meta tags, canonical page tags, real_url etc',
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
	'version' => '0.1.1',
	'constraints' => array(
		'depends' => array(
			'extbase' => '1.3',
			'fluid' => '1.3',
			'typo3' => '4.5-0.0.0',
			'realurl' => '1.11',
			'mc_googlesitemap' => '0.4.2',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

?>