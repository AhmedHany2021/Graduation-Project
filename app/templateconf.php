<?php
return[
    'patient' => [        
        'template' => [
           "wrapperstart"      => TEMPLATE_PATH.DS."templatewrapperstart.php",
           "navmain"           => TEMPLATE_PATH.DS."templatenavmain.php",
           "navpersonal"       => TEMPLATE_PATH.DS."templatenavpersonal.php",
           "leftsidebar"       => TEMPLATE_PATH.DS."templateleftsidebar.php",
           "pageheaderstar"    => TEMPLATE_PATH.DS."templatepageheaderstart.php",
           ":view"             =>":template view",
           "pageheaderend"     =>TEMPLATE_PATH.DS."templatepageheaderend.php",
           "footer"            =>TEMPLATE_PATH.DS."templatefooter.php"
        ],

        'header_resources' => [
            'css' => [
                "/assets/vendor/bootstrap/css/bootstrap.min.css",
                "/assets/vendor/fonts/circular-std/style.css",
                "/assets/libs/css/style.css",
                "/assets/vendor/fonts/fontawesome/css/fontawesome-all.css",
                "/assets/vendor/charts/chartist-bundle/chartist.css",
                "/assets/vendor/charts/morris-bundle/morris.css",
                "/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css",
                "/assets/vendor/charts/c3charts/c3.css",
                "/assets/vendor/fonts/flag-icon-css/flag-icon.min.css"
            ],

            'js' =>[
                '/js/ajaxfile.js'
            ]
        ],

        'footer_resources' => [
            'css' => [],

            'js' => [
                '/assets/vendor/jquery/jquery-3.3.1.min.js',
                '/assets/vendor/bootstrap/js/bootstrap.bundle.js',
                '/assets/vendor/slimscroll/jquery.slimscroll.js',
                '/assets/libs/js/main-js.js',
                '/assets/vendor/charts/chartist-bundle/chartist.min.js',
                '/assets/vendor/charts/sparkline/jquery.sparkline.js',
                '/assets/vendor/charts/morris-bundle/raphael.min.js',
                '/assets/vendor/charts/morris-bundle/morris.js',
                '/assets/vendor/charts/c3charts/c3.min.js',
                '/assets/vendor/charts/c3charts/d3-5.4.0.min.js',
                '/assets/vendor/charts/c3charts/C3chartjs.js',
                '/assets/libs/js/dashboard-ecommerce.js'            
            ]
        ]   
    ],
    
    'doctor'=> [
        'template' => [
           "wrapperstart"      => TEMPLATE_PATH.DS.'doctor'.DS."templatewrapperstart.php",
           "navmain"           => TEMPLATE_PATH.DS.'doctor'.DS."templatenavmain.php",
           "navpersonal"       => TEMPLATE_PATH.DS.'doctor'.DS."templatenavpersonal.php",
           "leftsidebar"       => TEMPLATE_PATH.DS.'doctor'.DS."templateleftsidebar.php",
           "pageheaderstar"    => TEMPLATE_PATH.DS.'doctor'.DS."templatepageheaderstart.php",
           ":view"             =>":template view",
           "pageheaderend"     =>TEMPLATE_PATH.DS.'doctor'.DS."templatepageheaderend.php",
           "footer"            =>TEMPLATE_PATH.DS.'doctor'.DS."templatefooter.php"
        ],

        'header_resources' => [
            'css' => [
                "/assets/vendor/bootstrap/css/bootstrap.min.css",
                "/assets/vendor/fonts/circular-std/style.css",
                "/assets/libs/css/style.css",
                "/assets/vendor/fonts/fontawesome/css/fontawesome-all.css",
                "/assets/vendor/charts/chartist-bundle/chartist.css",
                "/assets/vendor/charts/morris-bundle/morris.css",
                "/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css",
                "/assets/vendor/charts/c3charts/c3.css",
                "/assets/vendor/fonts/flag-icon-css/flag-icon.min.css"
            ],

            'js' =>[
                '/js/ajaxfile.js'
            ]
        ],

        'footer_resources' => [
            'css' => [],

            'js' => [
                '/assets/vendor/jquery/jquery-3.3.1.min.js',
                '/assets/vendor/bootstrap/js/bootstrap.bundle.js',
                '/assets/vendor/slimscroll/jquery.slimscroll.js',
                '/assets/libs/js/main-js.js',
                '/assets/vendor/charts/chartist-bundle/chartist.min.js',
                '/assets/vendor/charts/sparkline/jquery.sparkline.js',
                '/assets/vendor/charts/morris-bundle/raphael.min.js',
                '/assets/vendor/charts/morris-bundle/morris.js',
                '/assets/vendor/charts/c3charts/c3.min.js',
                '/assets/vendor/charts/c3charts/d3-5.4.0.min.js',
                '/assets/vendor/charts/c3charts/C3chartjs.js',
                '/assets/libs/js/dashboard-ecommerce.js'            
            ]
        ] 
    ],
    
    'auth' => [
            'template' => [
                "wrapperstart"      => TEMPLATE_PATH.DS.'auth'.DS."templatewrapperstart.php",
                ":view"             => ":template view",
                "wrapperend"        => TEMPLATE_PATH.DS.'auth'.DS."templatewrapperend.php"
            ],

            'header_resources' => [
                'css' => [
                    "/design/css/bootstrap.css",
                    "/design/css/font-awesome.min.css",
                    "/design/css/roboto-font.csss",
                    "/design/fonts/font-awesome-5/css/fontawesome-all.min.css",
                    "/design/css/style.css",
                    "/design/css/responsive.css",                    
                    "/assets/vendor/bootstrap/css/bootstrap.min.css",
                    "/assets/vendor/fonts/circular-std/style.css",
                    "/assets/libs/css/style.css",
                    "/assets/vendor/fonts/fontawesome/css/fontawesome-all.css",
                    "/assets/vendor/charts/chartist-bundle/chartist.css",
                    "/assets/vendor/charts/morris-bundle/morris.css",
                    "/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css",
                    "/assets/vendor/charts/c3charts/c3.css",
                    "/assets/vendor/fonts/flag-icon-css/flag-icon.min.css"
                ],

                'js' =>[
                    "/design/js/main.js"
                ]
            ],

            'footer_resources' => [
                'css' => [],

                'js' => []
            ] 
    ]
];