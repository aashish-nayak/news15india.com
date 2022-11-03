<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "News15India", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'NEWS15INDIA: Read Latest News In Hindi Like Social Media, Crime , Polities, Sports, Google, Bollywood, Education, Entertainment, Video And More On NEWS15INDIA.COM', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['news15india','news15india.com','Latest Rajasthan News','Latest Social Media News','Latest Crime News ','Latest Polities News','Latest Sports News','Latest Google News','Latest Bollywood News','Latest Education News','Latest Entertainment News','Latest Viral Video','Today Rajasthan News','Today Social Media News','Today Crime News ','Today Polities News','Today Sports News','Today Google News','Today Bollywood News','Today Education News','Today Entertainment News','Today Viral Video','Today Rajasthan Breaking News','Today Social Media Breaking News','Today Crime Breaking News ','Today Polities Breaking News','Today Sports Breaking News','Today Google Breaking News','Today Bollywood Breaking News','Today Education Breaking News','Today Entertainment Breaking News','Today Breaking Video','Rajasthan Trending News','Social Media Trending News','Crime Trending News','Polities Trending News','Sports Trending News','Google Trending News','Bollywood Trending News','Education Trending News','Entertainment Trending News','Trending Viral Video'],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'News15India', // set false to total remove
            'description' => 'NEWS15INDIA: Read Latest News In Hindi Like Social Media, Crime , Polities, Sports, Google, Bollywood, Education, Entertainment, Video And More On NEWS15INDIA.COM', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'News15India', // set false to total remove
            'description' => 'NEWS15INDIA: Read Latest News In Hindi Like Social Media, Crime , Polities, Sports, Google, Bollywood, Education, Entertainment, Video And More On NEWS15INDIA.COM', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
