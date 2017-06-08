<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact',
		'label' => 'lastname',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'lastname,firstname,phone,email,address,postal_code,city,picture,description,corporation,position,service,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('cbam_annuairecbam') . 'Resources/Public/Icons/tx_cbamannuairecbam_domain_model_contact.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, lastname, firstname, phone, email, address, postal_code, city, picture, description, corporation, position, service',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, lastname, firstname, phone, email, address, postal_code, city, picture, description;;;richtext:rte_transform[mode=ts_links], corporation, position, service, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_cbamannuairecbam_domain_model_contact',
				'foreign_table_where' => 'AND tx_cbamannuairecbam_domain_model_contact.pid=###CURRENT_PID### AND tx_cbamannuairecbam_domain_model_contact.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'lastname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.lastname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'firstname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'phone' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.phone',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'email' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.address',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'postal_code' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.postal_code',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'city' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.city',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'picture' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.picture',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'picture',
				array(
					'appearance' => array(
						'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
					),
					'foreign_types' => array(
						'0' => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						)
					),
					'maxitems' => 1
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'corporation' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.corporation',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_cbamannuairecbam_domain_model_corporation',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'position' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.position',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_cbamannuairecbam_domain_model_position',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'service' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cbam_annuairecbam/Resources/Private/Language/locallang_db.xlf:tx_cbamannuairecbam_domain_model_contact.service',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_cbamannuairecbam_domain_model_service',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		
	),
);