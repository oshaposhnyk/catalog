<?php

$capabilities = [
        'local/catalog:manageproducts' => [
                'riskbitmask' => RISK_SPAM,
                'captype' => 'write',
                'contextlevel' => CONTEXT_MODULE,
                'archetypes' => [
                        'editingteacher' => CAP_ALLOW,
                ],
        ],
];
