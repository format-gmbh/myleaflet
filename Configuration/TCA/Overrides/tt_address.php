<?php
defined('TYPO3_MODE') || die('Access denied.');

$tmp_myleaflet_columns = array(

	'leafletmapicon' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:myleaflet/Resources/Private/Language/locallang_db.xlf:tx_myleaflet_domain_model_address.leafletmapicon',
		'config' => array(
			"type" => "group",
			"internal_type" => "file",
			"allowed" => "gif,png,jpeg,jpg",	
			"max_size" => 500,	
			"uploadfolder" => "uploads/tx_myleaflet/icons",
			"show_thumbs" => 1,	
			"size" => 1,	
			"minitems" => 0,
			"maxitems" => 1,
			"default" => '',

		),
	),
	'mapgeocode' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:myleaflet/Resources/Private/Language/locallang_db.xlf:tx_myleaflet_domain_model_address.geocode',
		'config' => array(
			'type' => 'check',
			'default' => '1',
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_address',$tmp_myleaflet_columns);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_address', 'leafletmapicon,mapgeocode;;,', '', 'after:title');

$GLOBALS['TCA']['tt_address']['types']['Tx_Myleaflet_Address']['showitem'] = $TCA['tt_address']['types']['0']['showitem'];
$GLOBALS['TCA']['tt_address']['types']['Tx_Myleaflet_Address']['showitem'] .= ',--div--;LLL:EXT:myleaflet/Resources/Private/Language/locallang_db.xlf:tx_myleaflet_domain_model_address,';
$GLOBALS['TCA']['fe_users']['types']['Tx_Myleaflet_Address']['showitem'] .= 'leafletmapicon, mapgeocode';
        

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_myleaflet_domain_model_address', 'EXT:myleaflet/Resources/Private/Language/locallang_csh_tx_myleaflet_domain_model_address.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_myleaflet_domain_model_address');
