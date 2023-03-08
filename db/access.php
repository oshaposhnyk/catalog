<?php

$capabilities = [
        'local/catalog:manageproducts' => [
                'riskbitmask' => RISK_SPAM,
                'captype' => 'read',
                'contextlevel' => CONTEXT_SYSTEM,
                'archetypes' => array(
                        'manager' => CAP_ALLOW,
                )
        ],
];
