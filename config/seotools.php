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
            'title'        => "青柠子矜-失去爱,寻找爱",
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => '爱情总是想象比现实美丽，相逢如是，告别亦如是。我们以为爱得很深、很深，来日岁月，会让你知道，它不过很浅、很浅。最深最重的爱，必须和时日一起成长。因为爱情的缘故，两个陌生人可以突然熟络到睡在同一张床上。然而，相同的两个人，在分手时却说，我觉得你越来越陌生。爱情将两个人由陌生变成熟悉，又由熟悉变成陌生。爱情正是一个将一对陌生人变成情侣，又将一对情侣变成陌生人的游戏？', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['青柠子矜,青柠子衿,恋爱博客,恋爱经历,恋爱分析,青青子衿,恋爱电影,恋爱技巧,青柠子,qingningzi'],
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
            'title'        => "青柠子矜-失去爱,寻找爱",
            'description'  => '爱情总是想象比现实美丽，相逢如是，告别亦如是。我们以为爱得很深、很深，来日岁月，会让你知道，它不过很浅、很浅。最深最重的爱，必须和时日一起成长。因为爱情的缘故，两个陌生人可以突然熟络到睡在同一张床上。然而，相同的两个人，在分手时却说，我觉得你越来越陌生。爱情将两个人由陌生变成熟悉，又由熟悉变成陌生。爱情正是一个将一对陌生人变成情侣，又将一对情侣变成陌生人的游戏？', // set false to total remove
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
            'title'        => "青柠子矜-失去爱,寻找爱",
            'description'  => '爱情总是想象比现实美丽，相逢如是，告别亦如是。我们以为爱得很深、很深，来日岁月，会让你知道，它不过很浅、很浅。最深最重的爱，必须和时日一起成长。因为爱情的缘故，两个陌生人可以突然熟络到睡在同一张床上。然而，相同的两个人，在分手时却说，我觉得你越来越陌生。爱情将两个人由陌生变成熟悉，又由熟悉变成陌生。爱情正是一个将一对陌生人变成情侣，又将一对情侣变成陌生人的游戏？', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
