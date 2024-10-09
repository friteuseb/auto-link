<?php
defined('TYPO3') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'AutoLinking',
    'LinkAnalysis',
    'Auto-Linking Analysis'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['autolinking_linkanalysis'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'autolinking_linkanalysis',
    'FILE:EXT:auto_linking/Configuration/FlexForms/LinkAnalysis.xml'
);