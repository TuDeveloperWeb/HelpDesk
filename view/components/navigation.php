<?php
    
    $navigation = [
        [
            'label' => 'Dashboard',
            'url' => '../Dashboard/',
            'icon' => 'font-icon font-icon-chart-2',
            'requiredRole' => 2 
        ],
        [
            'label' => 'New Ticket',
            'url' => '../NuevoTicket/',
            'icon' => 'font-icon font-icon-list-square',
            'requiredRole' => 2
        ],
        [
            'label' => 'Request Ticket',
            'url' => '../ConsultarTicket/',
            'icon' => 'font-icon font-icon-folder',
            'requiredRole' => 2
        ],
        [
            'label' => 'Support',
            'url' => '../Support/',
            'icon' => 'font-icon font-icon-help',
            'requiredRole' => 2
        ],
        [
            'label' => 'Setting',
            'url' => '../Setting/',
            'icon' => 'font-icon font-icon-cogwheel',
            'requiredRole' => 2
        ]

        ];


    $arrRoles = isset($_SESSION['roles']) && is_array($_SESSION['roles']) ? array_column($_SESSION['roles'], 'rol_id') : [];

?>