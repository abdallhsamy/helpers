<?php

namespace AbdallhSamy\Helpers\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['subject', 'url', 'method', 'ip', 'agent', 'user_id'];

    public function getTable()
    {
        return config('helpers.tables.activityLog');
    }

    public function user()
    {
        return $this->belongsTo(config('helpers.models.user'), 'user_id');
    }
}
