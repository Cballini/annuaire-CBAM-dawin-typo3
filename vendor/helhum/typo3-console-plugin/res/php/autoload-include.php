<?php
if (!getenv('TYPO3_PATH_COMPOSER_ROOT')) {
    putenv('TYPO3_PATH_COMPOSER_ROOT=' . dirname(dirname(dirname(dirname(dirname(__DIR__))))));
}
if (!getenv('TYPO3_PATH_ROOT')) {
    putenv('TYPO3_PATH_ROOT=' . dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/web');
}
if (!getenv('TYPO3_PATH_WEB')) {
    putenv('TYPO3_PATH_WEB=' . dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/web');
}
if (!getenv('TYPO3_ACTIVE_FRAMEWORK_EXTENSIONS')) {
    putenv('TYPO3_ACTIVE_FRAMEWORK_EXTENSIONS=' . 'backend,core,extbase,extensionmanager,fluid,install,saltedpasswords,scheduler');
}
