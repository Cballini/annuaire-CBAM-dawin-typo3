<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'CBAM.' . $_EXTKEY,
	'Pi1',
	'Contact_Directory'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_pi1';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pi1.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'CBAM.' . $_EXTKEY,
	'Pi2',
	'Research'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_pi2';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pi2.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'CBAM.' . $_EXTKEY,
	'Pi3',
	'Corporation_Directory'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_pi3';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pi3.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'annuaireCBAM');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_cbamannuairecbam_domain_model_contact', 'EXT:cbam_annuairecbam/Resources/Private/Language/locallang_csh_tx_cbamannuairecbam_domain_model_contact.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_cbamannuairecbam_domain_model_contact');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_cbamannuairecbam_domain_model_corporation', 'EXT:cbam_annuairecbam/Resources/Private/Language/locallang_csh_tx_cbamannuairecbam_domain_model_corporation.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_cbamannuairecbam_domain_model_corporation');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_cbamannuairecbam_domain_model_position', 'EXT:cbam_annuairecbam/Resources/Private/Language/locallang_csh_tx_cbamannuairecbam_domain_model_position.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_cbamannuairecbam_domain_model_position');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_cbamannuairecbam_domain_model_service', 'EXT:cbam_annuairecbam/Resources/Private/Language/locallang_csh_tx_cbamannuairecbam_domain_model_service.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_cbamannuairecbam_domain_model_service');
