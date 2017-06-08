<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "bootstrap_grids".
 *
 * Auto generated | Identifier: 90449f22655ad8bc5053699d2efb0150
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Grids for bootstrap',
	'description' => 'Gridelements for bootstrap. Column grids, grids for simple accordions, tabs and content slider.',
	'category' => 'misc',
	'author' => 'Pascal Mayer',
	'author_email' => 'typo3@bsdist.ch',
	'author_company' => '',
	'version' => '1.3.1',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearCacheOnLoad' => 1,
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '7.6.0-7.6.99',
			'gridelements' => '7.0.0-0.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
	'clearcacheonload' => true,
	'_md5_values_when_last_written' => 'a:92:{s:8:"Classes/";s:4:"d41d";s:19:"Classes/Controller/";s:4:"d41d";s:41:"Classes/Controller/FlexFormController.php";s:4:"a5be";s:13:"composer.json";s:4:"97cf";s:14:"Configuration/";s:4:"d41d";s:23:"Configuration/FlexForm/";s:4:"d41d";s:40:"Configuration/FlexForm/flexform_2col.xml";s:4:"8bf5";s:40:"Configuration/FlexForm/flexform_3col.xml";s:4:"73a9";s:40:"Configuration/FlexForm/flexform_4col.xml";s:4:"2a80";s:45:"Configuration/FlexForm/flexform_accordion.xml";s:4:"ada2";s:42:"Configuration/FlexForm/flexform_slider.xml";s:4:"e7bc";s:41:"Configuration/FlexForm/flexform_tabs4.xml";s:4:"db33";s:41:"Configuration/FlexForm/flexform_tabs6.xml";s:4:"6620";s:47:"Configuration/FlexForm/flexform_tabs_simple.xml";s:4:"44f8";s:25:"Configuration/TypoScript/";s:4:"d41d";s:34:"Configuration/TypoScript/setup.txt";s:4:"c41b";s:35:"Configuration/TypoScript/simpleRow/";s:4:"d41d";s:46:"Configuration/TypoScript/simpleRow/tsconfig.ts";s:4:"84f3";s:36:"Configuration/TypoScript/tsconfig.ts";s:4:"9a0d";s:14:"Documentation/";s:4:"d41d";s:24:"Documentation/Images.txt";s:4:"bca4";s:26:"Documentation/Includes.txt";s:4:"03c3";s:23:"Documentation/Index.rst";s:4:"7b49";s:19:"Documentation/Main/";s:4:"d41d";s:27:"Documentation/Main/Changes/";s:4:"d41d";s:36:"Documentation/Main/Changes/Index.rst";s:4:"8c7f";s:33:"Documentation/Main/Configuration/";s:4:"d41d";s:43:"Documentation/Main/Configuration/Images.txt";s:4:"05e7";s:42:"Documentation/Main/Configuration/Index.rst";s:4:"7270";s:26:"Documentation/Main/Images/";s:4:"d41d";s:41:"Documentation/Main/Images/Administration/";s:4:"d41d";s:58:"Documentation/Main/Images/Administration/IncludeStatic.png";s:4:"2ea5";s:60:"Documentation/Main/Images/Administration/IncludeStatic76.png";s:4:"9ce4";s:40:"Documentation/Main/Images/Configuration/";s:4:"d41d";s:53:"Documentation/Main/Images/Configuration/extconfig.png";s:4:"d5aa";s:34:"Documentation/Main/Images/line.png";s:4:"51d4";s:40:"Documentation/Main/Images/Screenshot.png";s:4:"1888";s:39:"Documentation/Main/Images/typo3logo.png";s:4:"ed7a";s:28:"Documentation/Main/Index.rst";s:4:"df42";s:32:"Documentation/Main/Installation/";s:4:"d41d";s:42:"Documentation/Main/Installation/Images.txt";s:4:"b284";s:41:"Documentation/Main/Installation/Index.rst";s:4:"64da";s:32:"Documentation/Main/Introduction/";s:4:"d41d";s:42:"Documentation/Main/Introduction/Images.txt";s:4:"9c01";s:41:"Documentation/Main/Introduction/Index.rst";s:4:"30be";s:21:"ext_conf_template.txt";s:4:"7ffa";s:12:"ext_icon.gif";s:4:"446e";s:17:"ext_localconf.php";s:4:"91b3";s:14:"ext_tables.php";s:4:"5d77";s:9:"Readme.md";s:4:"9d12";s:10:"Resources/";s:4:"d41d";s:18:"Resources/Private/";s:4:"d41d";s:27:"Resources/Private/.htaccess";s:4:"371a";s:27:"Resources/Private/Language/";s:4:"d41d";s:46:"Resources/Private/Language/de.locallang_db.xlf";s:4:"f287";s:43:"Resources/Private/Language/locallang_db.xlf";s:4:"61cf";s:17:"Resources/Public/";s:4:"d41d";s:29:"Resources/Public/Flexslider2/";s:4:"d41d";s:42:"Resources/Public/Flexslider2/changelog.txt";s:4:"7325";s:33:"Resources/Public/Flexslider2/css/";s:4:"d41d";s:42:"Resources/Public/Flexslider2/css/base.less";s:4:"721b";s:42:"Resources/Public/Flexslider2/css/font.less";s:4:"faf3";s:44:"Resources/Public/Flexslider2/css/mixins.less";s:4:"ec49";s:44:"Resources/Public/Flexslider2/css/resets.less";s:4:"3d0b";s:48:"Resources/Public/Flexslider2/css/responsive.less";s:4:"cea8";s:43:"Resources/Public/Flexslider2/css/theme.less";s:4:"f36b";s:47:"Resources/Public/Flexslider2/css/variables.less";s:4:"4fbf";s:43:"Resources/Public/Flexslider2/flexslider.css";s:4:"1a10";s:44:"Resources/Public/Flexslider2/flexslider.less";s:4:"d343";s:47:"Resources/Public/Flexslider2/flexslider.min.css";s:4:"dda0";s:35:"Resources/Public/Flexslider2/fonts/";s:4:"d41d";s:54:"Resources/Public/Flexslider2/fonts/flexslider-icon.eot";s:4:"9c9c";s:54:"Resources/Public/Flexslider2/fonts/flexslider-icon.svg";s:4:"10e8";s:54:"Resources/Public/Flexslider2/fonts/flexslider-icon.ttf";s:4:"b4c9";s:55:"Resources/Public/Flexslider2/fonts/flexslider-icon.woff";s:4:"f8b9";s:36:"Resources/Public/Flexslider2/images/";s:4:"d41d";s:56:"Resources/Public/Flexslider2/images/bg_direction_nav.png";s:4:"f595";s:53:"Resources/Public/Flexslider2/images/bg_play_pause.png";s:4:"8ce5";s:53:"Resources/Public/Flexslider2/jquery.flexslider-min.js";s:4:"d22c";s:49:"Resources/Public/Flexslider2/jquery.flexslider.js";s:4:"1449";s:39:"Resources/Public/Flexslider2/LICENSE.md";s:4:"a23a";s:41:"Resources/Public/Flexslider2/README.mdown";s:4:"116f";s:23:"Resources/Public/Icons/";s:4:"d41d";s:42:"Resources/Public/Icons/gridlayout_col2.gif";s:4:"7c9c";s:42:"Resources/Public/Icons/gridlayout_col3.gif";s:4:"64a5";s:42:"Resources/Public/Icons/gridlayout_col4.gif";s:4:"0ffd";s:41:"Resources/Public/Icons/gridlayout_row.gif";s:4:"342d";s:41:"Resources/Public/Icons/grid_accordion.png";s:4:"33df";s:42:"Resources/Public/Icons/grid_simpletabs.png";s:4:"c9a9";s:38:"Resources/Public/Icons/grid_slider.png";s:4:"436c";s:37:"Resources/Public/Icons/grid_tabs4.png";s:4:"6c9b";s:37:"Resources/Public/Icons/grid_tabs6.png";s:4:"c4d8";}',
);

?>