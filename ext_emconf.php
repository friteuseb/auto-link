<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Auto-Linking',
    'description' => 'Analyzes page content and suggests links based on similarity. Supports local PHP processing and external API.',
    'category' => 'plugin',
    'author' => 'Cyril Wolfangel',
    'author_email' => 'cyril.wolfangel@gmail.com',
    'state' => 'alpha',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.0.0-12.4.99',
            'php' => '8.0.0-8.2.99'
        ],
    ],
];