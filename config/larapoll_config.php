<?php
return [
    'admin_auth' => env('LARAPOLL_ADMIN_AUTH_MIDDLEWARE', 'admin'),
    'admin_guard' => env('LARAPOLL_ADMIN_AUTH_GUARD', 'admin'),
    'pagination' => env('LARAPOLL_PAGINATION', 15),
    'prefix' => env('LARAPOLL_PREFIX', 'polls'),
    'results' => 'components.poll-stub.results',
    'radio' => 'components.poll-stub.radio',
    'checkbox' => 'components.poll-stub.checkbox',
    'user_guard' => 'web',
    'user_model' => App\Models\User::class,
];