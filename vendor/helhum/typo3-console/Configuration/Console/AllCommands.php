<?php
return array (
  'helhum/typo3-console' => 
  array (
    'controllers' => 
    array (
      0 => 'Helhum\\Typo3Console\\Command\\HelpCommandController',
      1 => 'Helhum\\Typo3Console\\Command\\CacheCommandController',
      2 => 'Helhum\\Typo3Console\\Command\\BackendCommandController',
      3 => 'Helhum\\Typo3Console\\Command\\SchedulerCommandController',
      4 => 'Helhum\\Typo3Console\\Command\\CleanupCommandController',
      5 => 'Helhum\\Typo3Console\\Command\\DocumentationCommandController',
      6 => 'Helhum\\Typo3Console\\Command\\InstallCommandController',
      7 => 'Helhum\\Typo3Console\\Command\\DatabaseCommandController',
      8 => 'Helhum\\Typo3Console\\Command\\ConfigurationCommandController',
      9 => 'Helhum\\Typo3Console\\Command\\FrontendCommandController',
      10 => 'Helhum\\Typo3Console\\Command\\ExtensionCommandController',
      11 => 'Helhum\\Typo3Console\\Command\\UpgradeCommandController',
    ),
    'runLevels' => 
    array (
      'typo3_console:install:databasedata' => 'buildBasicRuntimeSequence',
      'typo3_console:install:defaultconfiguration' => 'buildBasicRuntimeSequence',
      'typo3_console:install:*' => 'buildCompiletimeSequence',
      'typo3_console:cache:flush' => 'buildCompiletimeSequence',
      'typo3_console:commandreference:render' => 'buildBasicRuntimeSequence',
      'typo3_console:configuration:show' => 'buildExtendedRuntimeSequence',
      'typo3_console:configuration:showactive' => 'buildExtendedRuntimeSequence',
      'typo3_console:configuration:*' => 'buildBasicRuntimeSequence',
      'typo3_console:database:import' => 'buildBasicRuntimeSequence',
      'typo3_console:database:updateschema' => 'buildBasicRuntimeSequence',
      'typo3_console:upgrade:subprocess' => 'buildExtendedRuntimeSequence',
      'typo3_console:upgrade:*' => 'buildCompiletimeSequence',
    ),
    'bootingSteps' => 
    array (
      'typo3_console:install:databasedata' => 
      array (
        0 => 'helhum.typo3console:database',
      ),
      'typo3_console:install:defaultconfiguration' => 
      array (
        0 => 'helhum.typo3console:database',
      ),
      'typo3_console:cache:flush' => 
      array (
        0 => 'helhum.typo3console:database',
      ),
      'typo3_console:database:updateschema' => 
      array (
        0 => 'helhum.typo3console:database',
        1 => 'helhum.typo3console:persistence',
      ),
    ),
  ),
);