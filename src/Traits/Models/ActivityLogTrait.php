<?php


namespace AbdallhSamy\Helpers\Traits\Models;

//use App\Services\ActivityLog;

trait ActivityLogTrait
{
    protected static function booted()
    {
        /**
         * @TODO :: create activity log model
         *
         */
        static::created(function () {
//            ActivityLog::create('Add ' . class_basename(__CLASS__));
        });

        static::updated(function () {
//            ActivityLog::create('Update ' . class_basename(__CLASS__));
        });

        static::updated(function () {
//            ActivityLog::create('Delete ' . class_basename(__CLASS__));
        });
    }
}
