<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Pi1',
	array(
		'Registration' => 'list,new,preview,create',

	),
	// non-cacheable actions
	array(
		'Registration' => 'list,new,preview,create',

	)
);


$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc']['T3registrationebTceMainClearCache'] = 'TYPO3\T3registrationeb\Backend\TceMain->clearCacheCommand';
?>