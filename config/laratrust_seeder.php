<?php

return [
    'role_structure' => [
        'super' => [
            'users'           => 'c,r,u,d',
            'roles'           => 'c,r,u,d',
            'sliders'         => 'c,r,u,d',
            'settings'        => 'c,r,u,d',
            'services'        => 'c,r,u,d',
            'comments'        => 'c,r,u,d',
            'blogs'           => 'c,r,u,d',
            'blog_contents'   => 'c,r,u,d',
            'faqs'            => 'c,r,u,d',
            'contact_addresses' => 'c,r,u,d',
            'contact_emails'  => 'c,r,u,d',
            'contact_phones'  => 'c,r,u,d',
            'messages'        => 'c,r,u,d',
            'blog_subscribes' => 'c,r,u,d',
            'galleries'       => 'c,r,u,d',


        ],
    ],
    // 'permission_structure' => [
    //     'cru_user' => [
    //         'profile' => 'c,r,u'
    //     ],
    // ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
