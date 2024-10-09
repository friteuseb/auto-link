<?php
defined('TYPO3') or die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'AutoLinking',
        'LinkAnalysis',
        [
            \TalanHdf\AutoLinking\Controller\LinkAnalysisController::class => 'analyze,store,delete',
        ],
        [
            \TalanHdf\AutoLinking\Controller\LinkAnalysisController::class => 'analyze,store,delete',
        ]
    );

    // Register hook for content post-processing
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all']['auto_linking'] = 
        \TalanHdf\AutoLinking\Hooks\ContentPostProcessor::class . '->processContent';

    // Register backend module
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'AutoLinking',
        'web',
        'tx_autolinking_module',
        '',
        [
            \TalanHdf\AutoLinking\Controller\BackendController::class => 'list,analyze,delete',
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:auto_linking/Resources/Public/Icons/module-auto-linking.svg',
            'labels' => 'LLL:EXT:auto_linking/Resources/Private/Language/locallang_mod.xlf',
        ]
    );
})();