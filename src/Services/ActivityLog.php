<?php

namespace AbdallhSamy\Helpers\Services;
use Request;

class ActivityLog
{
    public static function create($subject)
    {
        $data = [
            'subject' => $subject,
            'url' => Request::fullUrl(),
            'method' => Request::method(),
            'ip' => Request::ip(),
            'agent' => Request::header('user-agent'),
            'user_id' => auth()->check() ? auth()->id() : null,
        ];

        config('helpers.models.activityLog')::create($data);
    }
}
