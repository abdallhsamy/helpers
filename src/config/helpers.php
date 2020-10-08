<?php

return [
    'models' => [
        'activityLog' => AbdallhSamy\Helpers\Models\ActivityLog::class,

        /**
         * User Model Default Path
         * change it if you put User Model in a different path
         */
        'user' => App\Models\User::class,
    ],

    'tables' => [
        'activityLog' => 'activity_logs',
        'user' => 'users'
    ],
];
