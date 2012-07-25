<?php
/**
 * extend TCA pages
 *
 * the name of the keys & columns matter!
 * There have to be identical fields in the database of pages.
 */
$tmp_hriseo_columns = array(
        
        'tx_hriseo_frequency' => array(
                'exclude' => 1,
                'label' => 'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.frequency',
                'config' => array(
                        'type' => 'select',
                        'items' => array(
                                array(
                                        'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.frequency.inherit',
                                        ''
                                ),
                                array(
                                        'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.frequency.always',
                                        'always'
                                ),
                                array(
                                        'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.frequency.hourly',
                                        'hourly'
                                ),
                                array(
                                        'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.frequency.daily',
                                        'daily'
                                ),
                                array(
                                        'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.frequency.weekly',
                                        'weekly'
                                ),
                                array(
                                        'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.frequency.monthly',
                                        'monthly'
                                ),
                                array(
                                        'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.frequency.yearly',
                                        'yearly'
                                ),
                                array(
                                        'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.frequency.never',
                                        'never'
                                )
                        )
                )
        ),
        'tx_hriseo_priority' => array(
                'exclude' => 1,
                'label' => 'LLL:EXT:hriseo/Resources/Private/Language/locallang_db.xml:tx_hriseo_domain_model_pages.priority',
                'config' => array(
                        'type' => 'input'
                )
        )
);

return $tmp_hriseo_columns;
?>