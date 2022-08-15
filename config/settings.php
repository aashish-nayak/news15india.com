<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Settings
    |--------------------------------------------------------------------------

    | This option controls the default settings that will be used by the
    | settings manager. You are free to customize these settings according
    | to your needs.
    |
    */

    'defaults' => [
        'admin_logo' => null,
        'admin_favicon' => null,
        'site_name' => 'News15India',
        'site_url' => 'https://www.news15india.com',
        'site_logo' => null,
        'site_favicon' => null,
        'site_keyword' => null,
        'site_description' => null,
        'site_phone' => '1234567890',
        'site_email' => null,
        'site_address' => null,
        'site_country' => null,
        'site_state' => null,
        'site_city' => null,
        'site_pincode' => null,
        'site_social_links' => null,
        'site_copyright' => 'Copyright © 20219 All Rights Reserved | 
        <a href="javascript:void(0)" class="text-decoration-none text-light">
            <b>
                <span style="color:orange;">NEWS</span>
                <span style="color:white;">15</span>
                <span style="color:green">INDIA</span>
            </b>
        </a>
        (Mahira News Network Pvt. Ltd.)',
        'site_analytics' => null,
        'site_status' => 'up',
        'live_stream_url' => null,
        'whatsapp_group_url' => null,
        'play_store_app_link' => null,
        'apple_store_app_link' => null,
        'special_coverage' => json_encode([
            'block_1' => [
                'image' => null,
                'url' => null,
                'status' => 1
            ],
            'block_2' => [
                'image' => null,
                'url' => null,
                'status' => 1
            ],
            'block_3' => [
                'image' => null,
                'url' => null,
                'status' => 1
            ],
        ]),
        'home_page_settings' => json_encode([
            'sections' => [
                1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 37
            ],
            'sections_limit' => [
                14, 14, 14, 12, 16, 18, 20, 12, 12, 10, 10, 10
            ],
            'sidebars' => [
                18, 14, 15, 16, 17
            ],
            'sidebars_limit' => [
                10, 10, 8, 8, 5
            ],
        ]),
        'category_page_settings' => json_encode([
            'news_per_page' => 25,
            'sidebars' => [
                18, 19, 20
            ],
            'sidebars_limit' => [
                8, 10, 5
            ],
            'bottom_section' => 6,
            'bottom_section_limit' => 15,
        ]),
        'tag_page_settings' => json_encode([
            'news_per_page' => 25,
            'sidebars' => [
                18, 19, 20
            ],
            'sidebars_limit' => [
                8, 10, 5
            ],
            'bottom_section' => 6,
            'bottom_section_limit' => 15,
        ]),
        'single_page_settings' => json_encode([
            'category_news_limit' => 14,
            'related_news_limit' => 10,
            'sidebars' => [
                18, 19, 20, 5
            ],
            'sidebars_limit' => [
                8, 10, 5, 5
            ],
            'bottom_section' => 6,
            'bottom_section_limit' => 15,
        ]),
        'author_page_settings' => json_encode([
            'news_per_page' => 18,
            'section' => 13,
            'section_limit' => 14,
            'sidebars' => [
                18, 19, 20, 5
            ],
            'sidebars_limit' => [
                8, 10, 5, 10
            ],
        ]),
    ],

];
