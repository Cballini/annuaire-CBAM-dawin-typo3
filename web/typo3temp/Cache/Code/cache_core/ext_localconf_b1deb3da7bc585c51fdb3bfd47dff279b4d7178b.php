<?php
/**
 * Compiled ext_localconf.php cache file
 */

global $TYPO3_CONF_VARS, $T3_SERVICES, $T3_VAR;

/**
 * Extension: core
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/core/ext_localconf.php
 */

$_EXTKEY = 'core';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);

if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
    // FAL SECURITY CHECKS
    $signalSlotDispatcher->connect(
        \TYPO3\CMS\Core\Resource\ResourceFactory::class,
        \TYPO3\CMS\Core\Resource\ResourceFactoryInterface::SIGNAL_PostProcessStorage,
        \TYPO3\CMS\Core\Resource\Security\StoragePermissionsAspect::class,
        'addUserPermissionsToStorage'
    );
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \TYPO3\CMS\Core\Resource\Security\FileMetadataPermissionsAspect::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \TYPO3\CMS\Core\Hooks\BackendUserGroupIntegrityCheck::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/alt_doc.php']['makeEditForm_accessCheck'][] = \TYPO3\CMS\Core\Resource\Security\FileMetadataPermissionsAspect::class . '->isAllowedToShowEditForm';
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tceforms_inline.php']['checkAccess'][] = \TYPO3\CMS\Core\Resource\Security\FileMetadataPermissionsAspect::class . '->isAllowedToShowEditForm';
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['checkModifyAccessList'][] = \TYPO3\CMS\Core\Resource\Security\FileMetadataPermissionsAspect::class;

    // PACKAGE MANAGEMENT
    $signalSlotDispatcher->connect(
        'PackageManagement',
        'packagesMayHaveChanged',
        \TYPO3\CMS\Core\Package\PackageManager::class,
        'scanAvailablePackages'
    );
}

$signalSlotDispatcher->connect(
    \TYPO3\CMS\Core\Resource\ResourceStorage::class,
    \TYPO3\CMS\Core\Resource\ResourceStorageInterface::SIGNAL_PostFileDelete,
    \TYPO3\CMS\Core\Resource\Processing\FileDeletionAspect::class,
    'removeFromRepository'
);

$signalSlotDispatcher->connect(
    \TYPO3\CMS\Core\Resource\ResourceStorage::class,
    \TYPO3\CMS\Core\Resource\ResourceStorageInterface::SIGNAL_PostFileAdd,
    \TYPO3\CMS\Core\Resource\Processing\FileDeletionAspect::class,
    'cleanupProcessedFilesPostFileAdd'
);

$signalSlotDispatcher->connect(
    \TYPO3\CMS\Core\Resource\ResourceStorage::class,
    \TYPO3\CMS\Core\Resource\ResourceStorageInterface::SIGNAL_PostFileReplace,
    \TYPO3\CMS\Core\Resource\Processing\FileDeletionAspect::class,
    'cleanupProcessedFilesPostFileReplace'
);

if (!\TYPO3\CMS\Core\Core\Bootstrap::usesComposerClassLoading()) {
    $signalSlotDispatcher->connect(
        \TYPO3\CMS\Extensionmanager\Utility\InstallUtility::class,
        'afterExtensionInstall',
        \TYPO3\CMS\Core\Core\ClassLoadingInformation::class,
        'dumpClassLoadingInformation'
    );
    $signalSlotDispatcher->connect(
        \TYPO3\CMS\Extensionmanager\Utility\InstallUtility::class,
        'afterExtensionUninstall',
        \TYPO3\CMS\Core\Core\ClassLoadingInformation::class,
        'dumpClassLoadingInformation'
    );
}
$signalSlotDispatcher->connect(
    TYPO3\CMS\Core\Resource\ResourceStorage::class,
    \TYPO3\CMS\Core\Resource\Service\FileProcessingService::SIGNAL_PreFileProcess,
    \TYPO3\CMS\Core\Resource\OnlineMedia\Processing\PreviewProcessing::class,
    'processFile'
);

unset($signalSlotDispatcher);

$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['dumpFile'] = \TYPO3\CMS\Core\Controller\FileDumpController::class . '::dumpAction';

/** @var \TYPO3\CMS\Core\Resource\Rendering\RendererRegistry $rendererRegistry */
$rendererRegistry = \TYPO3\CMS\Core\Resource\Rendering\RendererRegistry::getInstance();
$rendererRegistry->registerRendererClass(\TYPO3\CMS\Core\Resource\Rendering\AudioTagRenderer::class);
$rendererRegistry->registerRendererClass(\TYPO3\CMS\Core\Resource\Rendering\VideoTagRenderer::class);
$rendererRegistry->registerRendererClass(\TYPO3\CMS\Core\Resource\Rendering\YouTubeRenderer::class);
$rendererRegistry->registerRendererClass(\TYPO3\CMS\Core\Resource\Rendering\VimeoRenderer::class);
unset($rendererRegistry);

$textExtractorRegistry = \TYPO3\CMS\Core\Resource\TextExtraction\TextExtractorRegistry::getInstance();
$textExtractorRegistry->registerTextExtractor(\TYPO3\CMS\Core\Resource\TextExtraction\PlainTextExtractor::class);
unset($textExtractorRegistry);

$extractorRegistry = \TYPO3\CMS\Core\Resource\Index\ExtractorRegistry::getInstance();
$extractorRegistry->registerExtractionService(\TYPO3\CMS\Core\Resource\OnlineMedia\Metadata\Extractor::class);
unset($extractorRegistry);


/**
 * Extension: extbase
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/extbase/ext_localconf.php
 */

$_EXTKEY = 'extbase';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// We set the default implementation for Storage Backend & Query Settings in Backend and Frontend.
// The code below is NO PUBLIC API!
/** @var $extbaseObjectContainer \TYPO3\CMS\Extbase\Object\Container\Container */
$extbaseObjectContainer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class);
// Singleton
$extbaseObjectContainer->registerImplementation(\TYPO3\CMS\Extbase\Persistence\QueryInterface::class, \TYPO3\CMS\Extbase\Persistence\Generic\Query::class);
$extbaseObjectContainer->registerImplementation(\TYPO3\CMS\Extbase\Persistence\QueryResultInterface::class, \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult::class);
$extbaseObjectContainer->registerImplementation(\TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface::class, \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager::class);
$extbaseObjectContainer->registerImplementation(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\BackendInterface::class, \TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbBackend::class);
$extbaseObjectContainer->registerImplementation(\TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface::class, \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class);
unset($extbaseObjectContainer);

// Register type converters
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\ArrayConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\BooleanConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\FloatConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\IntegerConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\ObjectStorageConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\ObjectConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\StringConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\CoreTypeConverter::class);
// Experimental FAL<->extbase converters
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\FileConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\FileReferenceConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\FolderBasedFileCollectionConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\StaticFileCollectionConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\FolderConverter::class);

if (TYPO3_MODE === 'BE') {
    // registers Extbase at the cli_dispatcher with key "extbase".
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['extbase'] = [
        function () {
            $bootstrap = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Core\Bootstrap::class);
            echo $bootstrap->run('', []);
        },
        '_CLI_lowlevel'
    ];
    // register help command
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = \TYPO3\CMS\Extbase\Command\HelpCommandController::class;
}


/**
 * Extension: extensionmanager
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/extensionmanager/ext_localconf.php
 */

$_EXTKEY = 'extensionmanager';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Register extension list update task
$_EXTCONF = unserialize($_EXTCONF);
if (empty($_EXTCONF['offlineMode'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Extensionmanager\Task\UpdateExtensionListTask::class] = [
        'extension' => $_EXTKEY,
        'title' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xlf:task.updateExtensionListTask.name',
        'description' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xlf:task.updateExtensionListTask.description',
        'additionalFields' => '',
    ];
}

if (TYPO3_MODE === 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = \TYPO3\CMS\Extensionmanager\Command\ExtensionCommandController::class;
    if (!(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
        $signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
        $signalSlotDispatcher->connect(
            \TYPO3\CMS\Extensionmanager\Service\ExtensionManagementService::class,
            'willInstallExtensions',
            \TYPO3\CMS\Core\Package\PackageManager::class,
            'scanAvailablePackages'
        );
        $signalSlotDispatcher->connect(
            \TYPO3\CMS\Extensionmanager\Utility\InstallUtility::class,
            'tablesDefinitionIsBeingBuilt',
            \TYPO3\CMS\Core\Cache\DatabaseSchemaService::class,
            'addCachingFrameworkRequiredDatabaseSchemaForInstallUtility'
        );
        $signalSlotDispatcher->connect(
            \TYPO3\CMS\Extensionmanager\Utility\InstallUtility::class,
            'tablesDefinitionIsBeingBuilt',
            \TYPO3\CMS\Core\Category\CategoryRegistry::class,
            'addExtensionCategoryDatabaseSchemaToTablesDefinition'
        );
    }
}


/**
 * Extension: lang
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/lang/ext_localconf.php
 */

$_EXTKEY = 'lang';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Register language update command controller
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = \TYPO3\CMS\Lang\Command\LanguageCommandController::class;


/**
 * Extension: backend
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/backend/ext_localconf.php
 */

$_EXTKEY = 'backend';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class)->connect(
        \TYPO3\CMS\Core\Tree\TableConfiguration\DatabaseTreeDataProvider::class,
        \TYPO3\CMS\Core\Tree\TableConfiguration\DatabaseTreeDataProvider::SIGNAL_PostProcessTreeData,
        \TYPO3\CMS\Backend\Security\CategoryPermissionsAspect::class,
        'addUserPermissionsToCategoryTreeData'
    );

    $GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][1435433106] = \TYPO3\CMS\Backend\Backend\ToolbarItems\ClearCacheToolbarItem::class;
    $GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][1435433107] = \TYPO3\CMS\Backend\Backend\ToolbarItems\HelpToolbarItem::class;
    $GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][1435433108] = \TYPO3\CMS\Backend\Backend\ToolbarItems\LiveSearchToolbarItem::class;
    $GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][1435433109] = \TYPO3\CMS\Backend\Backend\ToolbarItems\ShortcutToolbarItem::class;
    $GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][1435433110] = \TYPO3\CMS\Backend\Backend\ToolbarItems\SystemInformationToolbarItem::class;
    $GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][1435433111] = \TYPO3\CMS\Backend\Backend\ToolbarItems\UserToolbarItem::class;

    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['loginProviders'][1433416747] = [
        'provider' => \TYPO3\CMS\Backend\LoginProvider\UsernamePasswordLoginProvider::class,
        'sorting' => 50,
        'icon-class' => 'fa-key',
        'label' => 'LLL:EXT:backend/Resources/Private/Language/locallang.xlf:login.link'
    ];

    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['avatarProviders']['defaultAvatarProvider'] = [
        'provider' => \TYPO3\CMS\Backend\Backend\Avatar\DefaultAvatarProvider::class
    ];
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tsfebeuserauth.php']['frontendEditingController']['default'] = \TYPO3\CMS\Core\FrontendEditing\FrontendEditingController::class;

// Register search key shortcuts
$GLOBALS['TYPO3_CONF_VARS']['SYS']['livesearch']['page'] = 'pages';

// Include base TSconfig setup
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:backend/Configuration/PageTSconfig/NewContentElementWizard.ts">');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:backend/Configuration/UserTSconfig/Options.ts">');


/**
 * Extension: frontend
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/frontend/ext_localconf.php
 */

$_EXTKEY = 'frontend';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'FE' && !isset($_REQUEST['eID'])) {
    \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class)->connect(
        \TYPO3\CMS\Core\Resource\Index\MetaDataRepository::class,
        'recordPostRetrieval',
        \TYPO3\CMS\Frontend\Aspect\FileMetadataOverlayAspect::class,
        'languageAndWorkspaceOverlay'
    );
}

// Register all available content objects
$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'] = array_merge($GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'], [
    'TEXT'             => \TYPO3\CMS\Frontend\ContentObject\TextContentObject::class,
    'CASE'             => \TYPO3\CMS\Frontend\ContentObject\CaseContentObject::class,
    'COA'              => \TYPO3\CMS\Frontend\ContentObject\ContentObjectArrayContentObject::class,
    'COA_INT'          => \TYPO3\CMS\Frontend\ContentObject\ContentObjectArrayInternalContentObject::class,
    'USER'             => \TYPO3\CMS\Frontend\ContentObject\UserContentObject::class,
    'USER_INT'         => \TYPO3\CMS\Frontend\ContentObject\UserInternalContentObject::class,
    'FILE'             => \TYPO3\CMS\Frontend\ContentObject\FileContentObject::class,
    'FILES'            => \TYPO3\CMS\Frontend\ContentObject\FilesContentObject::class,
    'IMAGE'            => \TYPO3\CMS\Frontend\ContentObject\ImageContentObject::class,
    'IMG_RESOURCE'     => \TYPO3\CMS\Frontend\ContentObject\ImageResourceContentObject::class,
    'CONTENT'          => \TYPO3\CMS\Frontend\ContentObject\ContentContentObject::class,
    'RECORDS'          => \TYPO3\CMS\Frontend\ContentObject\RecordsContentObject::class,
    'HMENU'            => \TYPO3\CMS\Frontend\ContentObject\HierarchicalMenuContentObject::class,
    'LOAD_REGISTER'    => \TYPO3\CMS\Frontend\ContentObject\LoadRegisterContentObject::class,
    'RESTORE_REGISTER' => \TYPO3\CMS\Frontend\ContentObject\RestoreRegisterContentObject::class,
    'TEMPLATE'         => \TYPO3\CMS\Frontend\ContentObject\TemplateContentObject::class,
    'FLUIDTEMPLATE'    => \TYPO3\CMS\Frontend\ContentObject\FluidTemplateContentObject::class,
    'SVG'              => \TYPO3\CMS\Frontend\ContentObject\ScalableVectorGraphicsContentObject::class,
    'EDITPANEL'        => \TYPO3\CMS\Frontend\ContentObject\EditPanelContentObject::class
]);

if (TYPO3_MODE === 'FE') {

    // Register eID provider for showpic
    $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['tx_cms_showpic'] = \TYPO3\CMS\Frontend\Controller\ShowImageController::class . '::processRequest';
    // Register eID provider for ExtDirect for the frontend
    $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['ExtDirect'] = \TYPO3\CMS\Frontend\Controller\ExtDirectEidController::class . '::processRequest';
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
	options.saveDocView = 1
	options.saveDocNew = 1
	options.saveDocNew.pages = 0
	options.saveDocNew.sys_file = 0
	options.saveDocNew.sys_file_metadata = 0
	options.disableDelete.sys_file = 1
');

// Registering hooks for the treelist cache
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \TYPO3\CMS\Frontend\Hooks\TreelistCacheUpdateHooks::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][] = \TYPO3\CMS\Frontend\Hooks\TreelistCacheUpdateHooks::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['moveRecordClass'][] = \TYPO3\CMS\Frontend\Hooks\TreelistCacheUpdateHooks::class;

// Register hook to show preview info
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['hook_previewInfo']['cms'] = \TYPO3\CMS\Frontend\Hooks\FrontendHooks::class . '->hook_previewInfo';

// Register search key shortcuts
$GLOBALS['TYPO3_CONF_VARS']['SYS']['livesearch']['content'] = 'tt_content';

// Register URL handler for external pages.
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['urlProcessing']['urlHandlers']['frontendExternalUrl'] = [
    'handler' => \TYPO3\CMS\Frontend\Page\ExternalPageUrlHandler::class,
];


/**
 * Extension: install
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/install/ext_localconf.php
 */

$_EXTKEY = 'install';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// TYPO3 CMS 7
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['accessRightParameters'] = \TYPO3\CMS\Install\Updates\AccessRightParametersUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['backendUserStartModule'] = \TYPO3\CMS\Install\Updates\BackendUserStartModuleUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['languageIsoCode'] = \TYPO3\CMS\Install\Updates\LanguageIsoCodeUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['PageShortcutParent'] = \TYPO3\CMS\Install\Updates\PageShortcutParentUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['backendShortcuts'] = \TYPO3\CMS\Install\Updates\MigrateShortcutUrlsAgainUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['processedFilesChecksum'] = \TYPO3\CMS\Install\Updates\ProcessedFileChecksumUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['filesReplacePermission'] = \TYPO3\CMS\Install\Updates\FilesReplacePermissionUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['tableCType'] = \TYPO3\CMS\Install\Updates\TableFlexFormToTtContentFieldsUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update'][\TYPO3\CMS\Install\Updates\FileListInAccessModuleListUpdate::class] = \TYPO3\CMS\Install\Updates\FileListInAccessModuleListUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update'][\TYPO3\CMS\Install\Updates\FileListIsStartModuleUpdate::class] = \TYPO3\CMS\Install\Updates\FileListIsStartModuleUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['textmediaCType'] = \TYPO3\CMS\Install\Updates\ContentTypesToTextMediaUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update'][\TYPO3\CMS\Install\Updates\WorkspacesNotificationSettingsUpdate::class] = \TYPO3\CMS\Install\Updates\WorkspacesNotificationSettingsUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['textmediaAssets'] = \TYPO3\CMS\Install\Updates\MigrateMediaToAssetsForTextMediaCe::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['compatibility6Extension'] = \TYPO3\CMS\Install\Updates\Compatibility6ExtractionUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['mediaceExtension'] = \TYPO3\CMS\Install\Updates\MediaceExtractionUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['openidExtension'] = \TYPO3\CMS\Install\Updates\OpenidExtractionUpdate::class;

$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
$signalSlotDispatcher->connect(
    \TYPO3\CMS\Install\Service\SqlExpectedSchemaService::class,
    'tablesDefinitionIsBeingBuilt',
    \TYPO3\CMS\Core\Cache\DatabaseSchemaService::class,
    'addCachingFrameworkRequiredDatabaseSchemaForSqlExpectedSchemaService'
);
$signalSlotDispatcher->connect(
    \TYPO3\CMS\Install\Service\SqlExpectedSchemaService::class,
    'tablesDefinitionIsBeingBuilt',
    \TYPO3\CMS\Core\Category\CategoryRegistry::class,
    'addCategoryDatabaseSchemaToTablesDefinition'
);

// Do not delete this wizard. This makes sure new installations get the TER repository set in the database.
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update'][\TYPO3\CMS\Install\Updates\ExtensionManagerTables::class]
    = \TYPO3\CMS\Install\Updates\ExtensionManagerTables::class;


/**
 * Extension: saltedpasswords
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/saltedpasswords/ext_localconf.php
 */

$_EXTKEY = 'saltedpasswords';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Form evaluation function for fe_users
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals'][\TYPO3\CMS\Saltedpasswords\Evaluation\FrontendEvaluator::class] = '';
// Form evaluation function for be_users
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals'][\TYPO3\CMS\Saltedpasswords\Evaluation\BackendEvaluator::class] = '';

// Hook for processing "forgotPassword" in felogin
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['felogin']['password_changed'][] = \TYPO3\CMS\Saltedpasswords\Utility\SaltedPasswordsUtility::class . '->feloginForgotPasswordHook';

// Extension may register additional salted hashing methods in this array
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/saltedpasswords']['saltMethods'] = [];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService('saltedpasswords', 'auth', \TYPO3\CMS\Saltedpasswords\SaltedPasswordService::class, [
    'title' => 'FE/BE Authentification salted',
    'description' => 'Salting of passwords for Frontend and Backend',
    'subtype' => 'authUserFE,authUserBE',
    'available' => true,
    'priority' => 70,
    // must be higher than \TYPO3\CMS\Sv\AuthenticationService (50) and rsaauth (60) but lower than OpenID (75)
    'quality' => 70,
    'os' => '',
    'exec' => '',
    'className' => \TYPO3\CMS\Saltedpasswords\SaltedPasswordService::class
]);

// Register bulk update task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Saltedpasswords\Task\BulkUpdateTask::class] = [
    'extension' => 'saltedpasswords',
    'title' => 'LLL:EXT:saltedpasswords/Resources/Private/Language/locallang.xlf:ext.saltedpasswords.tasks.bulkupdate.name',
    'description' => 'LLL:EXT:saltedpasswords/Resources/Private/Language/locallang.xlf:ext.saltedpasswords.tasks.bulkupdate.description',
    'additionalFields' => \TYPO3\CMS\Saltedpasswords\Task\BulkUpdateFieldProvider::class
];


/**
 * Extension: sv
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/sv/ext_localconf.php
 */

$_EXTKEY = 'sv';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Register base authentication service
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService(
    'sv',
    'auth',
    \TYPO3\CMS\Sv\AuthenticationService::class,
    [
        'title' => 'User authentication',
        'description' => 'Authentication with username/password.',
        'subtype' => 'getUserBE,getUserFE,authUserFE,getGroupsFE,processLoginDataBE,processLoginDataFE',
        'available' => true,
        'priority' => 50,
        'quality' => 50,
        'os' => '',
        'exec' => '',
        'className' => \TYPO3\CMS\Sv\AuthenticationService::class
    ]
);


/**
 * Extension: t3skin
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/t3skin/ext_localconf.php
 */

$_EXTKEY = 't3skin';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	RTE.default.skin = EXT:t3skin/rtehtmlarea/htmlarea.css
	RTE.default.FE.skin = EXT:t3skin/rtehtmlarea/htmlarea.css
');


/**
 * Extension: scheduler
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3/sysext/scheduler/ext_localconf.php
 */

$_EXTKEY = 'scheduler';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Register the Scheduler as a possible key for CLI calls
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['scheduler'] = [
    function () {
        $schedulerCliController = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Scheduler\Controller\SchedulerCliController::class);
        $schedulerCliController->run();
    },
    '_CLI_scheduler'
];
// Get the extensions's configuration
$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['scheduler']);
// If sample tasks should be shown,
// register information for the test and sleep tasks
if (!empty($extConf['showSampleTasks'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Example\TestTask::class] = [
        'extension' => 'scheduler',
        'title' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:testTask.name',
        'description' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:testTask.description',
        'additionalFields' => \TYPO3\CMS\Scheduler\Example\TestTaskAdditionalFieldProvider::class
    ];
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Example\SleepTask::class] = [
        'extension' => 'scheduler',
        'title' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:sleepTask.name',
        'description' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:sleepTask.description',
        'additionalFields' => \TYPO3\CMS\Scheduler\Example\SleepTaskAdditionalFieldProvider::class
    ];
}

// Add caching framework garbage collection task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\CachingFrameworkGarbageCollectionTask::class] = [
    'extension' => 'scheduler',
    'title' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:cachingFrameworkGarbageCollection.name',
    'description' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:cachingFrameworkGarbageCollection.description',
    'additionalFields' => \TYPO3\CMS\Scheduler\Task\CachingFrameworkGarbageCollectionAdditionalFieldProvider::class
];

// Add task to index file in a storage
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\FileStorageIndexingTask::class] = [
    'extension' => 'scheduler',
    'title' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:fileStorageIndexing.name',
    'description' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:fileStorageIndexing.description',
    'additionalFields' => \TYPO3\CMS\Scheduler\Task\FileStorageIndexingAdditionalFieldProvider::class
];

// Add task for extracting metadata from files in a storage
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\FileStorageExtractionTask::class] = [
    'extension' => 'scheduler',
    'title' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:fileStorageExtraction.name',
    'description' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:fileStorageExtraction.description',
    'additionalFields' => \TYPO3\CMS\Scheduler\Task\FileStorageExtractionAdditionalFieldProvider::class

];

// Add recycler directory cleanup task. Windows is not supported
// because "filectime" does not change after moving a file
if (TYPO3_OS !== 'WIN') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\RecyclerGarbageCollectionTask::class] = [
        'extension' => 'scheduler',
        'title' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:recyclerGarbageCollection.name',
        'description' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:recyclerGarbageCollection.description',
        'additionalFields' => \TYPO3\CMS\Scheduler\Task\RecyclerGarbageCollectionAdditionalFieldProvider::class
    ];
}

// Save any previous option array for table garbage collection task
// to temporary variable so it can be pre-populated by other
// extensions and LocalConfiguration/AdditionalConfiguration
$garbageCollectionTaskOptions = [];
if (is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask::class]['options'])) {
    $garbageCollectionTaskOptions = $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask::class]['options'];
}
// Initialize tables sub-array if not set already
if (!is_array($garbageCollectionTaskOptions['tables'])) {
    $garbageCollectionTaskOptions['tables'] = [];
}
// Add table garbage collection task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask::class] = [
    'extension' => 'scheduler',
    'title' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:tableGarbageCollection.name',
    'description' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:tableGarbageCollection.description',
    'additionalFields' => \TYPO3\CMS\Scheduler\Task\TableGarbageCollectionAdditionalFieldProvider::class,
    'options' => $garbageCollectionTaskOptions
];
unset($garbageCollectionTaskOptions);

// Register sys_log and sys_history table in table garbage collection task
if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask::class]['options']['tables']['sys_log'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask::class]['options']['tables']['sys_log'] = [
        'dateField' => 'tstamp',
        'expirePeriod' => 180
    ];
}

if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask::class]['options']['tables']['sys_history'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask::class]['options']['tables']['sys_history'] = [
        'dateField' => 'tstamp',
        'expirePeriod' => 30
    ];
}

// Add task for optimizing database tables
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\OptimizeDatabaseTableTask::class] = [
    'extension' => 'scheduler',
    'title' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:optimizeDatabaseTable.name',
    'description' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:optimizeDatabaseTable.description',
    'additionalFields' => \TYPO3\CMS\Scheduler\Task\OptimizeDatabaseTableAdditionalFieldProvider::class

];


/**
 * Extension: gridelements
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3conf/ext/gridelements/ext_localconf.php
 */

$_EXTKEY = 'gridelements';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$_EXTCONF = unserialize($_EXTCONF);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
	options.saveDocNew.tx_gridelements_backend_layout=1
');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43($_EXTKEY, 'Classes/Plugin/Gridelements.php', '_pi1',
    'CType', 1);

// XCLASS
if ($_EXTCONF['nestingInListModule']) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Recordlist\\RecordList\\DatabaseRecordList'] = array('className' => 'GridElementsTeam\\Gridelements\\Xclass\\DatabaseRecordList',);
}


/**
 * Extension: bootstrap_grids
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3conf/ext/bootstrap_grids/ext_localconf.php
 */

$_EXTKEY = 'bootstrap_grids';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ('TYPO3_MODE')) die ('Access denied.');

// --- Get extension configuration ---
$extConf = array();
if ( strlen($_EXTCONF) ) {
	$extConf = unserialize($_EXTCONF);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:bootstrap_grids/Configuration/TypoScript/tsconfig.ts">');

// Only if enabled
if ( isset($extConf['enableGridSimpleRow']) && $extConf['enableGridSimpleRow'] ) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:bootstrap_grids/Configuration/TypoScript/simpleRow/tsconfig.ts">');
}



/**
 * Extension: bootstrap_package
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3conf/ext/bootstrap_package/ext_localconf.php
 */

$_EXTKEY = 'bootstrap_package';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

/***************
 * Define TypoScript as content rendering template
 */
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'bootstrappackage/Configuration/TypoScript/';

/***************
 * Make the extension configuration accessible
 */
if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}

/***************
 * PageTS
 */

// Add Bootstrap Content Elements to newContentElement Wizard
if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disablePageTsNewContentElementWizard']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/Mod/Wizards/newContentElement.txt">');
}

// Add Previews for Bootstrap Content Elements
if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disablePageTsTtContentPreviews']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/Mod/WebLayout/TtContent/preview.txt">');
}

// Add BackendLayouts BackendLayouts for the BackendLayout DataProvider
if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disablePageTsBackendLayouts']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/Mod/WebLayout/BackendLayouts.txt">');
}

// AdminPanel
if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disablePageTsAdmPanel']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/admPanel.txt">');
}

// TCEMAIN
if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disablePageTsTCEMAIN']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/TCEMAIN.txt">');
}

// TCEFORM
if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disablePageTsTCEFORM']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/TCEFORM.txt">');
}

// Configure the RTE to match the needs of Bootstrap Package
if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disablePageTsRTE']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/RTE.txt">');
}

if (TYPO3_MODE === 'BE') {
    /**
     * Provides an example .htaccess file for Apache after extension is installed and shows a warning if TYPO3 is not running on Apache.
     */
    $signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher');
    $signalSlotDispatcher->connect(
        'TYPO3\\CMS\\Extensionmanager\\Service\\ExtensionManagementService',
        'hasInstalledExtensions',
        'BK2K\\BootstrapPackage\\Service\\InstallService',
        'generateApacheHtaccess'
    );
}

/***************
 * Register hook for processing less files
 */
if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disableLessProcessing']) {
    if (TYPO3_MODE === 'FE') {
        require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('bootstrap_package') . '/Contrib/less.php/Less.php');
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][] = 'BK2K\\BootstrapPackage\\Hooks\\PageRenderer\\PreProcessHook->execute';
    }
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][] = 'BK2K\\BootstrapPackage\\Hooks\\TceMain\\ClearCacheHook->clearLessCache';
}

/***************
 * Reset extConf array to avoid errors
 */
if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = serialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}

/***************
 * Set alias for menu processor as fallback if the core menu
 * processor does not exist for TYPO3 Versions below 8.5
 */
if (!class_exists('TYPO3\CMS\Frontend\DataProcessing\MenuProcessor')) {
    class_alias(
        \BK2K\BootstrapPackage\DataProcessing\MenuProcessor::class,
        'TYPO3\CMS\Frontend\DataProcessing\MenuProcessor'
    );
}


/**
 * Extension: cbam_annuairecbam
 * File: /mnt/roon/users/cballini/DAWIN/dawin-typo3-cms-distribution/web/typo3conf/ext/cbam_annuairecbam/ext_localconf.php
 */

$_EXTKEY = 'cbam_annuairecbam';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


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


#