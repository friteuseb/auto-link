<?php
defined('TYPO3') or die();

(static function() {
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