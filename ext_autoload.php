<?php
// DO NOT CHANGE THIS FILE! It is automatically generated by extdeveval::buildAutoloadRegistry.
// This file was generated on 2013-04-12 10:30

$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3registrationeb');
$extensionClassesPath = $extensionPath . 'Classes/';
require_once($extensionClassesPath . 'Lib/UserModelBuilder.php');
$default =  array(
	'TYPO3\T3registrationeb\Lib\UserModelBuilder' => $extensionClassesPath . 'Lib/UserModelBuilder.php',
	'TYPO3\T3registrationeb\Backend\TceMain' => $extensionClassesPath . 'Backend/TceMain.php',
);

if(@file_exists(\TYPO3\T3registrationeb\Lib\UserModelBuilder::getInstance()->getCachedFileName())){
	$default['TYPO3\CMS\Extbase\Domain\Model\FrontendUser'] = \TYPO3\T3registrationeb\Lib\UserModelBuilder::getInstance()->getCachedFileName();
}

return $default;
?>