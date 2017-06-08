<?php
/**
 * Compiled ext_tables.php cache file
 */

global $T3_SERVICES, $T3_VAR, $TYPO3_CONF_VARS;
global $TBE_MODULES, $TBE_MODULES_EXT, $TCA;
global $PAGES_TYPES, $TBE_STYLES;
global $_EXTKEY;

/**
 * Extension: core
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/core/ext_tables.php
 */

$_EXTKEY = 'core';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

/**
 * $GLOBALS['PAGES_TYPES'] defines the various types of pages (field: doktype) the system
 * can handle and what restrictions may apply to them.
 * Here you can set the icon and especially you can define which tables are
 * allowed on a certain pagetype (doktype)
 * NOTE: The 'default' entry in the $GLOBALS['PAGES_TYPES'] array is the 'base' for all
 * types, and for every type the entries simply overrides the entries in the 'default' type!
 */
$GLOBALS['PAGES_TYPES'] = [
    (string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_LINK => [],
    (string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_SHORTCUT => [],
    (string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_BE_USER_SECTION => [
        'type' => 'web',
        'allowedTables' => '*'
    ],
    (string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_MOUNTPOINT => [],
    (string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_SPACER => [
        'type' => 'sys'
    ],
    (string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_SYSFOLDER => [
        //  Doktype 254 is a 'Folder' - a general purpose storage folder for whatever you like.
        // In CMS context it's NOT a viewable page. Can contain any element.
        'type' => 'sys',
        'allowedTables' => '*'
    ],
    (string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_RECYCLER => [
        // Doktype 255 is a recycle-bin.
        'type' => 'sys',
        'allowedTables' => '*'
    ],
    'default' => [
        'type' => 'web',
        'allowedTables' => 'pages',
        'onlyAllowedTables' => '0'
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('sys_category,sys_file_reference,sys_file_collection');

/**
 * $TBE_MODULES contains the structure of the backend modules as they are
 * arranged in main- and sub-modules. Every entry in this array represents a
 * menu item on either first (key) or second level (value from list) in the
 * left menu in the TYPO3 backend
 * For information about adding modules to TYPO3 you should consult the
 * documentation found in "Inside TYPO3"
 */
$GLOBALS['TBE_MODULES'] = [
    'web' => 'list',
    'file' => '',
    'user' => '',
    'tools' => '',
    'system' => '',
    'help' => '',
    '_configuration' => [
        'web' => [
            'labels' => [
                'll_ref' => 'LLL:EXT:lang/locallang_mod_web.xlf'
            ],
            'name' => 'web',
            'iconIdentifier' => 'module-web'
        ],
        'file' => [
            'labels' => [
                'll_ref' => 'LLL:EXT:lang/locallang_mod_file.xlf'
            ],
            'navigationFrameModule' => 'file_navframe',
            'name' => 'file',
            'workspaces' => 'online,custom',
            'iconIdentifier' => 'module-file'
        ],
        'user' => [
            'labels' => [
                'll_ref' => 'LLL:EXT:lang/locallang_mod_usertools.xlf'
            ],
            'name' => 'user',
            'iconIdentifier' => 'status-user-backend'
        ],
        'tools' => [
            'labels' => [
                'll_ref' => 'LLL:EXT:lang/locallang_mod_admintools.xlf'
            ],
            'name' => 'tools',
            'iconIdentifier' => 'module-tools'
        ],
        'system' => [
            'labels' => [
                'll_ref' => 'LLL:EXT:lang/locallang_mod_system.xlf'
            ],
            'name' => 'system',
            'iconIdentifier' => 'module-system'
        ],
        'help' => [
            'labels' => [
                'll_ref' => 'LLL:EXT:lang/locallang_mod_help.xlf'
            ],
            'name' => 'help',
            'iconIdentifier' => 'module-help'
        ]
    ]
];

// Register the page tree core navigation component
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addCoreNavigationComponent('web', 'typo3-pagetree');

/**
 * $TBE_STYLES configures backend styles and colors; Basically this contains
 * all the values that can be used to create new skins for TYPO3.
 * For information about making skins to TYPO3 you should consult the
 * documentation found in "Inside TYPO3"
 */
$GLOBALS['TBE_STYLES'] = [
    'skinImg' => []
];

/**
 * Setting up $TCA_DESCR - Context Sensitive Help (CSH)
 * For information about using the CSH API in TYPO3 you should consult the
 * documentation found in "Inside TYPO3"
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('pages', 'EXT:lang/locallang_csh_pages.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('be_users', 'EXT:lang/locallang_csh_be_users.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('be_groups', 'EXT:lang/locallang_csh_be_groups.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_filemounts', 'EXT:lang/locallang_csh_sysfilem.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_language', 'EXT:lang/locallang_csh_syslang.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_news', 'EXT:lang/locallang_csh_sysnews.xlf');
// General Core
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('xMOD_csh_corebe', 'EXT:lang/locallang_csh_corebe.xlf');
// Web > Info
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_info', 'EXT:lang/locallang_csh_web_info.xlf');
// Web > Func
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_func', 'EXT:lang/locallang_csh_web_func.xlf');

/**
 * Backend sprite icon-names
 */
$GLOBALS['TBE_STYLES']['spriteIconApi']['coreSpriteImageNames'] = [
    'actions-document-close',
    'actions-document-duplicates-select',
    'actions-document-edit-access',
    'actions-document-export-csv',
    'actions-document-export-t3d',
    'actions-document-history-open',
    'actions-document-import-t3d',
    'actions-document-info',
    'actions-document-localize',
    'actions-document-move',
    'actions-document-new',
    'actions-document-open',
    'actions-document-open-read-only',
    'actions-document-paste-after',
    'actions-document-paste-into',
    'actions-document-save',
    'actions-document-save-cleartranslationcache',
    'actions-document-save-close',
    'actions-document-save-new',
    'actions-document-save-translation',
    'actions-document-save-view',
    'actions-document-select',
    'actions-document-synchronize',
    'actions-document-view',
    'actions-edit-add',
    'actions-edit-copy',
    'actions-edit-copy-release',
    'actions-edit-cut',
    'actions-edit-cut-release',
    'actions-edit-delete',
    'actions-edit-download',
    'actions-edit-hide',
    'actions-edit-insert-default',
    'actions-edit-localize-status-high',
    'actions-edit-localize-status-low',
    'actions-edit-merge-localization',
    'actions-edit-pick-date',
    'actions-edit-rename',
    'actions-edit-replace',
    'actions-edit-restore',
    'actions-edit-undelete-edit',
    'actions-edit-undo',
    'actions-edit-unhide',
    'actions-edit-upload',
    'actions-input-clear',
    'actions-insert-record',
    'actions-insert-reference',
    'actions-markstate',
    'actions-message-error-close',
    'actions-message-information-close',
    'actions-message-notice-close',
    'actions-message-ok-close',
    'actions-message-warning-close',
    'actions-move-down',
    'actions-move-left',
    'actions-move-move',
    'actions-move-right',
    'actions-move-to-bottom',
    'actions-move-to-top',
    'actions-move-up',
    'actions-page-move',
    'actions-page-new',
    'actions-page-open',
    'actions-selection-delete',
    'actions-system-backend-user-emulate',
    'actions-system-backend-user-switch',
    'actions-system-cache-clear',
    'actions-system-cache-clear-impact-high',
    'actions-system-cache-clear-impact-low',
    'actions-system-cache-clear-impact-medium',
    'actions-system-cache-clear-rte',
    'actions-system-extension-configure',
    'actions-system-extension-documentation',
    'actions-system-extension-download',
    'actions-system-extension-import',
    'actions-system-extension-install',
    'actions-system-extension-sqldump',
    'actions-system-extension-uninstall',
    'actions-system-extension-update',
    'actions-system-extension-update-disabled',
    'actions-system-help-open',
    'actions-system-list-open',
    'actions-system-options-view',
    'actions-system-pagemodule-open',
    'actions-system-refresh',
    'actions-system-shortcut-new',
    'actions-system-tree-search-open',
    'actions-system-typoscript-documentation',
    'actions-system-typoscript-documentation-open',
    'actions-template-new',
    'actions-unmarkstate',
    'actions-version-document-remove',
    'actions-version-page-open',
    'actions-version-swap-version',
    'actions-version-swap-workspace',
    'actions-version-workspace-preview',
    'actions-version-workspace-sendtostage',
    'actions-view-go-back',
    'actions-view-go-down',
    'actions-view-go-forward',
    'actions-view-go-up',
    'actions-view-list-collapse',
    'actions-view-list-expand',
    'actions-view-paging-first',
    'actions-view-paging-first-disabled',
    'actions-view-paging-last',
    'actions-view-paging-last-disabled',
    'actions-view-paging-next',
    'actions-view-paging-next-disabled',
    'actions-view-paging-previous',
    'actions-view-paging-previous-disabled',
    'actions-view-table-collapse',
    'actions-view-table-expand',
    'actions-window-open',
    'apps-clipboard-images',
    'apps-clipboard-list',
    'apps-filetree-folder-add',
    'apps-filetree-folder-default',
    'apps-filetree-folder-list',
    'apps-filetree-folder-locked',
    'apps-filetree-folder-media',
    'apps-filetree-folder-news',
    'apps-filetree-folder-opened',
    'apps-filetree-folder-recycler',
    'apps-filetree-folder-temp',
    'apps-filetree-folder-user',
    'apps-filetree-mount',
    'apps-filetree-root',
    'apps-irre-collapsed',
    'apps-irre-expanded',
    'apps-pagetree-backend-user',
    'apps-pagetree-backend-user-hideinmenu',
    'apps-pagetree-collapse',
    'apps-pagetree-drag-copy-above',
    'apps-pagetree-drag-copy-below',
    'apps-pagetree-drag-move-above',
    'apps-pagetree-drag-move-below',
    'apps-pagetree-drag-move-between',
    'apps-pagetree-drag-move-into',
    'apps-pagetree-drag-new-between',
    'apps-pagetree-drag-new-inside',
    'apps-pagetree-drag-place-denied',
    'apps-pagetree-expand',
    'apps-pagetree-folder-contains-approve',
    'apps-pagetree-folder-contains-board',
    'apps-pagetree-folder-contains-fe_users',
    'apps-pagetree-folder-contains-news',
    'apps-pagetree-folder-contains-shop',
    'apps-pagetree-folder-default',
    'apps-pagetree-page-advanced',
    'apps-pagetree-page-advanced-hideinmenu',
    'apps-pagetree-page-advanced-root',
    'apps-pagetree-page-backend-users',
    'apps-pagetree-page-backend-users-hideinmenu',
    'apps-pagetree-page-backend-users-root',
    'apps-pagetree-page-content-from-page',
    'apps-pagetree-page-content-from-page-root',
    'apps-pagetree-page-content-from-page-hideinmenu',
    'apps-pagetree-page-default',
    'apps-pagetree-page-domain',
    'apps-pagetree-page-frontend-user',
    'apps-pagetree-page-frontend-user-hideinmenu',
    'apps-pagetree-page-frontend-user-root',
    'apps-pagetree-page-frontend-users',
    'apps-pagetree-page-frontend-users-hideinmenu',
    'apps-pagetree-page-frontend-users-root',
    'apps-pagetree-page-mountpoint',
    'apps-pagetree-page-mountpoint-hideinmenu',
    'apps-pagetree-page-mountpoint-root',
    'apps-pagetree-page-no-icon-found',
    'apps-pagetree-page-no-icon-found-hideinmenu',
    'apps-pagetree-page-no-icon-found-root',
    'apps-pagetree-page-not-in-menu',
    'apps-pagetree-page-recycler',
    'apps-pagetree-page-shortcut',
    'apps-pagetree-page-shortcut-external',
    'apps-pagetree-page-shortcut-external-hideinmenu',
    'apps-pagetree-page-shortcut-external-root',
    'apps-pagetree-page-shortcut-hideinmenu',
    'apps-pagetree-page-shortcut-root',
    'apps-pagetree-root',
    'apps-pagetree-spacer',
    'apps-tcatree-select-recursive',
    'apps-toolbar-menu-actions',
    'apps-toolbar-menu-cache',
    'apps-toolbar-menu-opendocs',
    'apps-toolbar-menu-search',
    'apps-toolbar-menu-shortcut',
    'apps-toolbar-menu-workspace',
    'mimetypes-compressed',
    'mimetypes-excel',
    'mimetypes-media-audio',
    'mimetypes-media-flash',
    'mimetypes-media-image',
    'mimetypes-media-video',
    'mimetypes-other-other',
    'mimetypes-pdf',
    'mimetypes-powerpoint',
    'mimetypes-text-css',
    'mimetypes-text-csv',
    'mimetypes-text-html',
    'mimetypes-text-js',
    'mimetypes-text-php',
    'mimetypes-text-text',
    'mimetypes-word',
    'mimetypes-x-content-divider',
    'mimetypes-x-content-domain',
    'mimetypes-x-content-form',
    'mimetypes-x-content-form-search',
    'mimetypes-x-content-header',
    'mimetypes-x-content-html',
    'mimetypes-x-content-image',
    'mimetypes-x-content-link',
    'mimetypes-x-content-list-bullets',
    'mimetypes-x-content-list-files',
    'mimetypes-x-content-login',
    'mimetypes-x-content-menu',
    'mimetypes-x-content-multimedia',
    'mimetypes-x-content-page-language-overlay',
    'mimetypes-x-content-plugin',
    'mimetypes-x-content-script',
    'mimetypes-x-content-table',
    'mimetypes-x-content-template',
    'mimetypes-x-content-template-extension',
    'mimetypes-x-content-template-static',
    'mimetypes-x-content-text',
    'mimetypes-x-content-text-picture',
    'mimetypes-x-content-text-media',
    'mimetypes-x-sys_action',
    'mimetypes-x-sys_category',
    'mimetypes-x-sys_language',
    'mimetypes-x-sys_news',
    'mimetypes-x-sys_workspace',
    'mimetypes-x_belayout',
    'status-dialog-error',
    'status-dialog-information',
    'status-dialog-notification',
    'status-dialog-ok',
    'status-dialog-warning',
    'status-overlay-access-restricted',
    'status-overlay-deleted',
    'status-overlay-hidden',
    'status-overlay-icon-missing',
    'status-overlay-includes-subpages',
    'status-overlay-locked',
    'status-overlay-scheduled',
    'status-overlay-scheduled-future-end',
    'status-overlay-translated',
    'status-status-checked',
    'status-status-current',
    'status-status-edit-read-only',
    'status-status-icon-missing',
    'status-status-locked',
    'status-status-permission-denied',
    'status-status-permission-granted',
    'status-status-readonly',
    'status-status-reference-hard',
    'status-status-reference-soft',
    'status-status-sorting-asc',
    'status-status-sorting-desc',
    'status-status-sorting-light-asc',
    'status-status-sorting-light-desc',
    'status-status-workspace-draft',
    'status-system-extension-required',
    'status-user-admin',
    'status-user-backend',
    'status-user-frontend',
    'status-user-group-backend',
    'status-user-group-frontend',
    'status-warning-in-use',
    'status-warning-lock',
    'module-web',
    'module-file',
    'module-system',
    'module-tools',
    'module-user',
    'module-help'
];

$GLOBALS['TBE_STYLES']['spriteIconApi']['spriteIconRecordOverlayPriorities'] = [
    'deleted',
    'hidden',
    'starttime',
    'endtime',
    'futureendtime',
    'fe_group',
    'protectedSection'
];

$GLOBALS['TBE_STYLES']['spriteIconApi']['spriteIconRecordOverlayNames'] = [
    'hidden' => 'status-overlay-hidden',
    'fe_group' => 'status-overlay-access-restricted',
    'starttime' => 'status-overlay-scheduled',
    'endtime' => 'status-overlay-scheduled',
    'futureendtime' => 'status-overlay-scheduled-future-end',
    'readonly' => 'status-overlay-locked',
    'deleted' => 'status-overlay-deleted',
    'missing' => 'status-overlay-missing',
    'translated' => 'status-overlay-translated',
    'protectedSection' => 'status-overlay-includes-subpages'
];

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: extbase
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/extbase/ext_tables.php
 */

$_EXTKEY = 'extbase';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['extbase'][] = \TYPO3\CMS\Extbase\Utility\ExtbaseRequirementsCheckUtility::class;

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Extbase\Scheduler\Task::class] = [
    'extension' => 'extbase',
    'title' => 'LLL:EXT:extbase/Resources/Private/Language/locallang_db.xlf:task.name',
    'description' => 'LLL:EXT:extbase/Resources/Private/Language/locallang_db.xlf:task.description',
    'additionalFields' => \TYPO3\CMS\Extbase\Scheduler\FieldProvider::class
];

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['checkFlexFormValue'][] = \TYPO3\CMS\Extbase\Hook\DataHandler\CheckFlexFormValue::class;

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: fluid
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/fluid/ext_tables.php
 */

$_EXTKEY = 'fluid';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Fluid: (Optional) default ajax configuration');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: extensionmanager
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/extensionmanager/ext_tables.php
 */

$_EXTKEY = 'extensionmanager';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'TYPO3.CMS.Extensionmanager',
        'tools',
        'extensionmanager', '', [
            'List' => 'index,unresolvedDependencies,ter,showAllVersions,distributions',
            'Action' => 'toggleExtensionInstallationState,installExtensionWithoutSystemDependencyCheck,removeExtension,downloadExtensionZip,downloadExtensionData,reloadExtensionData',
            'Configuration' => 'showConfigurationForm,save,saveAndClose',
            'Download' => 'checkDependencies,installFromTer,installExtensionWithoutSystemDependencyCheck,installDistribution,updateExtension,updateCommentForUpdatableVersions',
            'UpdateScript' => 'show',
            'UpdateFromTer' => 'updateExtensionListFromTer',
            'UploadExtensionFile' => 'form,extract',
            'Distribution' => 'show'
        ],
        [
            'access' => 'admin',
            'icon' => 'EXT:extensionmanager/Resources/Public/Icons/module-extensionmanager.svg',
            'labels' => 'LLL:EXT:extensionmanager/Resources/Private/Language/locallang_mod.xlf',
        ]
    );

    // Register extension status report system
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['Extension Manager'][] =
        \TYPO3\CMS\Extensionmanager\Report\ExtensionStatus::class;
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: lang
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/lang/ext_tables.php
 */

$_EXTKEY = 'lang';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {

    // Register the backend module
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'TYPO3.CMS.Lang',
        'tools',
        'language',
        'after:extensionmanager',
        [
            'Language' => 'listLanguages, listTranslations, getTranslations, updateLanguage, updateTranslation, activateLanguage, deactivateLanguage',
        ],
        [
            'access' => 'admin',
            'icon' => 'EXT:lang/Resources/Public/Icons/module-lang.svg',
            'labels' => 'LLL:EXT:lang/Resources/Private/Language/locallang_mod.xlf',
        ]
    );
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: backend
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/backend/ext_tables.php
 */

$_EXTKEY = 'backend';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
        'web',
        'layout',
        'top',
        '',
        [
            'routeTarget' => \TYPO3\CMS\Backend\Controller\PageLayoutController::class . '::mainAction',
            'access' => 'user,group',
            'name' => 'web_layout',
            'labels' => [
                'tabs_images' => [
                    'tab' => 'EXT:backend/Resources/Public/Icons/module-page.svg',
                ],
                'll_ref' => 'LLL:EXT:backend/Resources/Private/Language/locallang_mod.xlf',
            ],
        ]
    );

    // Register BackendLayoutDataProvider for PageTs
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['BackendLayoutDataProvider']['pagets'] = \TYPO3\CMS\Backend\Provider\PageTsBackendLayoutDataProvider::class;
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: filelist
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/filelist/ext_tables.php
 */

$_EXTKEY = 'filelist';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'TYPO3.CMS.Filelist',
        'file',
        'list',
        '',
        [
            'FileList' => 'index, search',
        ],
        [
            'access' => 'user,group',
            'workspaces' => 'online,custom',
            'icon' => 'EXT:filelist/Resources/Public/Icons/module-filelist.svg',
            'labels' => 'LLL:EXT:lang/locallang_mod_file_list.xlf'
        ]
    );
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: frontend
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/frontend/ext_tables.php
 */

$_EXTKEY = 'frontend';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Add allowed records to pages
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('pages_language_overlay,tt_content,sys_template,sys_domain,backend_layout');

if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_layout', 'EXT:frontend/Resources/Private/Language/locallang_csh_weblayout.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_info', 'EXT:frontend/Resources/Private/Language/locallang_csh_webinfo.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
        'web_info',
        \TYPO3\CMS\Frontend\Controller\PageInformationController::class,
        null,
        'LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:mod_tx_cms_webinfo_page'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
        'web_info',
        \TYPO3\CMS\Frontend\Controller\TranslationStatusController::class,
        null,
        'LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:mod_tx_cms_webinfo_lang'
    );
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: install
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/install/ext_tables.php
 */

$_EXTKEY = 'install';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    // Register report module additions
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['typo3'][] = \TYPO3\CMS\Install\Report\InstallStatusReport::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['security'][] = \TYPO3\CMS\Install\Report\SecurityStatusReport::class;

    // Only add the environment status report if not in CLI mode
    if (!defined('TYPO3_cliMode') || !TYPO3_cliMode) {
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['system'][] = \TYPO3\CMS\Install\Report\EnvironmentStatusReport::class;
    }

    // Register backend module
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'TYPO3.CMS.Install',
        'system',
        'install', '', [
            'BackendModule' => 'index, showEnableInstallToolButton, enableInstallTool',
        ],
        [
            'access' => 'admin',
            'icon' => 'EXT:install/Resources/Public/Icons/module-install.svg',
            'labels' => 'LLL:EXT:install/Resources/Private/Language/BackendModule.xlf',
        ]
    );
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: recordlist
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/recordlist/ext_tables.php
 */

$_EXTKEY = 'recordlist';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
        'web',
        'list',
        '',
        '',
        [
            'routeTarget' => \TYPO3\CMS\Recordlist\RecordList::class . '::mainAction',
            'access' => 'user,group',
            'name' => 'web_list',
            'labels' => [
                'tabs_images' => [
                    'tab' => 'EXT:recordlist/Resources/Public/Icons/module-list.svg',
                ],
                'll_ref' => 'LLL:EXT:lang/locallang_mod_web_list.xlf',
            ],
        ]
    );

    // register element browsers
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ElementBrowsers']['db'] =  \TYPO3\CMS\Recordlist\Browser\DatabaseBrowser::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ElementBrowsers']['file'] =  \TYPO3\CMS\Recordlist\Browser\FileBrowser::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ElementBrowsers']['folder'] =  \TYPO3\CMS\Recordlist\Browser\FolderBrowser::class;

    // register default link handlers
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
		TCEMAIN.linkHandler {
			page {
				handler = TYPO3\\CMS\\Recordlist\\LinkHandler\\PageLinkHandler
				label = LLL:EXT:lang/locallang_browse_links.xlf:page
			}
			file {
				handler = TYPO3\\CMS\\Recordlist\\LinkHandler\\FileLinkHandler
				label = LLL:EXT:lang/locallang_browse_links.xlf:file
				displayAfter = page
				scanAfter = page
			}
			folder {
				handler = TYPO3\\CMS\\Recordlist\\LinkHandler\\FolderLinkHandler
				label = LLL:EXT:lang/locallang_browse_links.xlf:folder
				displayAfter = file
				scanAfter = file
			}
			url {
				handler = TYPO3\\CMS\\Recordlist\\LinkHandler\\UrlLinkHandler
				label = LLL:EXT:lang/locallang_browse_links.xlf:extUrl
				displayAfter = folder
				scanAfter = mail
			}
			mail {
				handler = TYPO3\\CMS\\Recordlist\\LinkHandler\\MailLinkHandler
				label = LLL:EXT:lang/locallang_browse_links.xlf:email
				displayAfter = url
			}
		}
	');
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: saltedpasswords
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/saltedpasswords/ext_tables.php
 */

$_EXTKEY = 'saltedpasswords';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Add context sensitive help (csh) for scheduler task
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_txsaltedpasswords', 'EXT:saltedpasswords/Resources/Private/Language/locallang_csh_saltedpasswords.xlf');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: sv
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/sv/ext_tables.php
 */

$_EXTKEY = 'sv';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['sv']['services'] = [
        'title' => 'LLL:EXT:sv/Resources/Private/Language/locallang.xlf:report_title',
        'description' => 'LLL:EXT:sv/Resources/Private/Language/locallang.xlf:report_description',
        'icon' => 'EXT:sv/Resources/Public/Images/service-reports.png',
        'report' => \TYPO3\CMS\Sv\Report\ServicesListReport::class
    ];
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: t3skin
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/t3skin/ext_tables.php
 */

$_EXTKEY = 't3skin';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE' || TYPO3_MODE === 'FE' && isset($GLOBALS['BE_USER'])) {

    // Register as a skin
    $GLOBALS['TBE_STYLES']['skins']['t3skin'] = [
        'name' => 't3skin',
        'stylesheetDirectories' => [
            'sprites' => 'EXT:t3skin/stylesheets/sprites/',
            'css' => 'EXT:t3skin/Resources/Public/Css/'
        ]
    ];

    // Setting up auto detection of alternative icons:
    $GLOBALS['TBE_STYLES']['skinImgAutoCfg'] = [
        'absDir' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3skin') . 'icons/',
        'relDir' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('t3skin') . 'icons/',
        'forceFileExtension' => 'gif',
        // Force to look for PNG alternatives...
        'iconSizeWidth' => 16,
        'iconSizeHeight' => 16
    ];

    // Changing icon for filemounts, needs to be done here as overwriting the original icon would also change the filelist tree's root icon
    $GLOBALS['TCA']['sys_filemounts']['ctrl']['iconfile'] = 'apps-filetree-mount';

    $GLOBALS['TCA']['pages']['columns']['module']['config']['items'][1][2] = 'status-user-frontend';

    // extJS theme
    $GLOBALS['TBE_STYLES']['extJS']['theme'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('t3skin') . 'extjs/xtheme-t3skin.css';
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: cshmanual
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/cshmanual/ext_tables.php
 */

$_EXTKEY = 'cshmanual';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'TYPO3.CMS.Cshmanual',
        'help',
        'cshmanual',
        'top',
        [
            'Help' => 'index,all,detail',
        ],
        [
            'access' => 'user,group',
            'icon' => 'EXT:cshmanual/Resources/Public/Icons/module-cshmanual.svg',
            'labels' => 'LLL:EXT:lang/locallang_mod_help_cshmanual.xlf',
        ]
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/template.php']['preStartPageHook']['cshmanual'] = \TYPO3\CMS\Cshmanual\Service\JavaScriptService::class . '->addJavaScript';
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: scheduler
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/scheduler/ext_tables.php
 */

$_EXTKEY = 'scheduler';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    // Add module
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
        'system',
        'txschedulerM1',
        '',
        '',
        [
            'routeTarget' => \TYPO3\CMS\Scheduler\Controller\SchedulerModuleController::class . '::mainAction',
            'access' => 'admin',
            'name' => 'system_txschedulerM1',
            'labels' => [
                'tabs_images' => [
                    'tab' => 'EXT:scheduler/Resources/Public/Icons/module-scheduler.svg',
                ],
                'll_ref' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang_mod.xlf',
            ],
        ]
    );

    // Add context sensitive help (csh) to the backend module
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        '_MOD_system_txschedulerM1',
        'EXT:scheduler/Resources/Private/Language/locallang_csh_scheduler.xlf'
    );
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: gridelements
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3conf/ext/gridelements/ext_tables.php
 */

$_EXTKEY = 'gridelements';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$_EXTCONF = unserialize($_EXTCONF);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_gridelements_backend_layout');

if (TYPO3_MODE === 'BE') {
    include_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('gridelements') . 'Classes/Backend/TtContent.php');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/',
    'Gridelements');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(array(
    'LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xml:tt_content.CType_pi1',
    $_EXTKEY . '_pi1',
    'gridelements-default'
), 'CType');

// Hooks
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem'][] = 'EXT:gridelements/Classes/Hooks/DrawItem.php:GridElementsTeam\\Gridelements\\Hooks\\DrawItem';

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms']['db_new_content_el']['wizardItemsHook'][] = 'EXT:gridelements/Classes/Hooks/WizardItems.php:GridElementsTeam\\Gridelements\\Hooks\\WizardItems';

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][] = 'EXT:gridelements/Classes/Hooks/DataHandler.php:GridElementsTeam\\Gridelements\\Hooks\\DataHandler';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = 'EXT:gridelements/Classes/Hooks/DataHandler.php:GridElementsTeam\\Gridelements\\Hooks\\DataHandler';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['moveRecordClass'][] = 'EXT:gridelements/Classes/Hooks/DataHandler.php:GridElementsTeam\\Gridelements\\Hooks\\DataHandler';

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_befunc.php']['getFlexFormDSClass'][] = 'EXT:gridelements/Classes/Hooks/BackendUtilityGridelements.php:GridElementsTeam\\Gridelements\\Hooks\\BackendUtilityGridelements';

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tx_templavoila_api']['apiIsRunningTCEmain'] = true;

if (TYPO3_MODE == 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Hooks/PageRenderer.php:GridElementsTeam\\Gridelements\\Hooks\\PageRenderer->addJSCSS';
}

if ($_EXTCONF['nestingInListModule']) {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/class.db_list.inc']['makeQueryArray'][] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Hooks/AbstractDatabaseRecordList.php:GridElementsTeam\\Gridelements\\Hooks\\AbstractDatabaseRecordList';

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/class.db_list_extra.inc']['actions'][] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Hooks/DatabaseRecordList.php:GridElementsTeam\\Gridelements\\Hooks\\DatabaseRecordList';
}

$GLOBALS['TYPO3_USER_SETTINGS']['columns']['dragAndDropHideNewElementWizardInfoOverlay'] = array(
    'type' => 'check',
    'label' => 'LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xml:dragAndDropHideNewElementWizardInfoOverlay'
);

$GLOBALS['TYPO3_USER_SETTINGS']['columns']['hideColumnHeaders'] = array(
    'type' => 'check',
    'label' => 'LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xml:hideColumnHeaders'
);

$GLOBALS['TYPO3_USER_SETTINGS']['columns']['hideContentPreview'] = array(
    'type' => 'check',
    'label' => 'LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xml:hideContentPreview'
);

$GLOBALS['TYPO3_USER_SETTINGS']['columns']['showGridInformation'] = array(
    'type' => 'check',
    'label' => 'LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xml:showGridInformation'
);

$GLOBALS['TYPO3_USER_SETTINGS']['showitem'] .= ',--div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xml:gridElements,dragAndDropHideNewElementWizardInfoOverlay,hideColumnHeaders,hideContentPreview,showGridInformation';

$TBE_STYLES['skins']['gridelements']['name'] = 'gridelements';
$TBE_STYLES['skins']['gridelements']['stylesheetDirectories']['structure'] = 'EXT:' . ($_EXTKEY) . '/Resources/Public/Backend/Css/Skin/';

$GLOBALS['TBE_MODULES_EXT']['xMOD_alt_clickmenu']['extendCMclasses'][] = array('name' => 'GridElementsTeam\\Gridelements\\Backend\\ClickMenuOptions',);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/template.php']['preHeaderRenderHook'][] = 'GridElementsTeam\\Gridelements\\Hooks\\PreHeaderRenderHook->main';

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon('gridelements-default', \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class, array(
    'source' => 'EXT:gridelements/Resources/Public/Icons/gridelements.svg'
));

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: bootstrap_grids
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3conf/ext/bootstrap_grids/ext_tables.php
 */

$_EXTKEY = 'bootstrap_grids';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ('TYPO3_MODE')) die ('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Grids for Bootstrap');



TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: bootstrap_package
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3conf/ext/bootstrap_package/ext_tables.php
 */

$_EXTKEY = 'bootstrap_package';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

/***************
 * Make the extension configuration accessible
 */
if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}

/***************
 * Backend Styling
 */
if (TYPO3_MODE == 'BE') {
    /**
     * Configure TBE_STYLES (TYPO3 = 7)
     */
    if (!isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['Logo'])
        || empty($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['Logo'])
    ) {
        $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['Logo'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Images/Backend/TopBarLogo@2x.png';
    }
    $GLOBALS['TBE_STYLES']['logo'] = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['Logo'];

    /**
     * Configure Backend Extension
     */
    if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'])) {
        $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'] = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']);
    }
    // Login Logo (TYPO3 >= 7)
    if (!isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginLogo'])
        || empty(trim($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginLogo']))
    ) {
        $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginLogo'] = 'EXT:bootstrap_package/Resources/Public/Images/Backend/LoginLogo.png';
    }
    // Backend Logo (TYPO3 >= 8)
    if (!isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['backendLogo'])
        || empty(trim($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['backendLogo']))
    ) {
        $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['backendLogo'] = 'EXT:bootstrap_package/Resources/Public/Images/Backend/TopBarLogo@2x.png';
    }
    if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'])) {
        $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'] = serialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']);
    }
}

/***************
 * Register Icons
 */
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'content-bootstrappackage-tab',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/tab.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-tab-item',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/tab-item.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-textcolumn',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/textcolumn.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-textteaser',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/textteaser.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-texticon',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/texticon.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-textmedia',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/textmedia.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-panel',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/panel.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-accordion',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/accordion.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-accordion-item',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/accordion-item.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/carousel.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel-item',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/carousel-item.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel-item-header',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/carousel-item-header.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel-item-textandimage',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/carousel-item-textandimage.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel-item-backgroundimage',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/carousel-item-backgroundimage.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel-item-html',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/carousel-item-html.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-audio',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/audio.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-externalmedia',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/externalmedia.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-listgroup',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/listgroup.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-menu-thumbnail',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/menu-thumbnail.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-quote',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bootstrap_package/Resources/Public/Icons/ContentElements/quote.svg']
);

/***************
 * Allow Carousel Item & Accordion Item on Standart Pages
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bootstrappackage_carousel_item');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bootstrappackage_accordion_item');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bootstrappackage_tab_item');

/***************
 * Remove new content element wizard registration for indexed_search
 * to override it and use the the extbase version instead
 */
if (TYPO3_MODE === 'BE' && \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('indexed_search')) {
    unset($GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses']['tx_indexed_search_pi_wizicon']);
}

/***************
 * Reset extConf array to avoid errors
 */
if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = serialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: cbam_annuairecbam
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3conf/ext/cbam_annuairecbam/ext_tables.php
 */

$_EXTKEY = 'cbam_annuairecbam';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


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

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: extension_builder
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3conf/ext/extension_builder/ext_tables.php
 */

$_EXTKEY = 'extension_builder';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}



if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
	/**
	 * Register Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'EBT.' . $_EXTKEY,
		'tools',
		'extensionbuilder',
		'',
		array(
			'BuilderModule' => 'index,domainmodelling,dispatchRpc',
		),
		array(
			'access' => 'user,group',
			'icon' => 'EXT:extension_builder/ext_icon.gif',
			'labels' => 'LLL:EXT:extension_builder/Resources/Private/Language/locallang_mod.xlf',
		)
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler(
	     'ExtensionBuilder::wiringEditorSmdEndpoint',
		   'EBT\ExtensionBuilder\Configuration\ConfigurationManager->getWiringEditorSmd'
	);

}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

#