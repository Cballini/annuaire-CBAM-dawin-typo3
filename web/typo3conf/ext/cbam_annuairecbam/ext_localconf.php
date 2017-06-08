<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'CBAM.' . $_EXTKEY,
	'Pi1',
	array(
		'Contact' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Contact' => 'list',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'CBAM.' . $_EXTKEY,
	'Pi2',
	array(
		'Contact' => 'search',
		
	),
	// non-cacheable actions
	array(
		'Contact' => '',
		'Corporation' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'CBAM.' . $_EXTKEY,
	'Pi3',
	array(
		'Corporation' => 'list, show, contactList, serviceList, serviceShow',
		
	),
	// non-cacheable actions
	array(
		'Corporation' => 'list, contactList, serviceList',
		
	)
);
