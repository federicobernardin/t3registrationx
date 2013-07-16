<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Registration2'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_pi1';
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pi1.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TYPO3 Registration');

$tmp_t3registrationeb_columns = array(

	'privacy' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3registrationeb/Resources/Private/Language/locallang_db.xlf:tx_t3registrationeb_domain_model_frontenduser.privacy',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'authentication_code' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3registrationeb/Resources/Private/Language/locallang_db.xlf:tx_t3registrationeb_domain_model_frontenduser.authentication_code',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'moderator_approval' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3registrationeb/Resources/Private/Language/locallang_db.xlf:tx_t3registrationeb_domain_model_frontenduser.moderator_approval',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'moderator_approvalate_d' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3registrationeb/Resources/Private/Language/locallang_db.xlf:tx_t3registrationeb_domain_model_frontenduser.moderator_approvalate_d',
		'config' => array(
			'type' => 'input',
			'size' => 4,
			'eval' => 'int'
		),
	),
	'user_approval' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3registrationeb/Resources/Private/Language/locallang_db.xlf:tx_t3registrationeb_domain_model_frontenduser.user_approval',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
);

t3lib_extMgm::addTCAcolumns('fe_users',$tmp_t3registrationeb_columns);

$TCA['fe_users']['columns'][$TCA['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:t3registrationeb/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_T3registrationeb_FrontendUser','Tx_T3registrationeb_FrontendUser');

$TCA['fe_users']['types']['Tx_T3registrationeb_FrontendUser']['showitem'] = $TCA['fe_users']['types']['Tx_Extbase_Domain_Model_FrontendUser']['showitem'];
$TCA['fe_users']['types']['Tx_T3registrationeb_FrontendUser']['showitem'] .= ',--div--;LLL:EXT:t3registrationeb/Resources/Private/Language/locallang_db.xlf:tx_t3registrationeb_domain_model_frontenduser,';
$TCA['fe_users']['types']['Tx_T3registrationeb_FrontendUser']['showitem'] .= 'privacy, authentication_code, moderator_approval, moderator_approvalate_d, user_approval';

?>