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
        'site_meta_title' => 'NEWS15INDIA: Read Latest Breaking News In Hindi (ब्रेकिंग न्यूज़ ) Latest India News In Hindi (ताज़ा हिंदी समाचार) Rajasthan Top News (राजस्थान न्यूज़) Trending News',
        'site_meta_keyword' => 'news15india, news15india.com, Latest Rajasthan News, Latest Social Media News, Latest Crime News , Latest Polities News, Latest Sports News, Latest Google News, Latest Bollywood News, Latest Education News, Latest Entertainment News, Latest Viral Video, Today Rajasthan News, Today Social Media News, Today Crime News , Today Polities News, Today Sports News, Today Google News, Today Bollywood News, Today Education News, Today Entertainment News, Today Viral Video, Today Rajasthan Breaking News, Today Social Media Breaking News, Today Crime Breaking News , Today Polities Breaking News, Today Sports Breaking News, Today Google Breaking News, Today Bollywood Breaking News, Today Education Breaking News, Today Entertainment Breaking News, Today Breaking Video, Rajasthan Trending News, Social Media Trending News, Crime Trending News, Polities Trending News, Sports Trending News, Google Trending News, Bollywood Trending News, Education Trending News, Entertainment Trending News, Trending Viral Video',
        'site_meta_description' => 'NEWS15INDIA: Read Latest News In Hindi Like Social Media, Crime , Polities, Sports, Google, Bollywood, Education, Entertainment, Video And More On NEWS15INDIA.COM',
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
        'razorpay_account' => 1,
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
