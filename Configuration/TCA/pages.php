<?php
/**
 * extend TCA pages
 *
 * the name of the keys & columns matter!
 * There have to be identical fields in the database of pages.
 */
$tmp_hriseo_columns = array(
        
        'tx_hriseo_exclcudeseo' => array(
                'exclude' => 1,
                'label' => 'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.isNotSeo',
                'config' => array(
                        'type' => 'check'
                )
        )
);

return $tmp_hriseo_columns;
?>