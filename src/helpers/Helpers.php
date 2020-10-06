<?php

use Carbon\Carbon;
use Illuminate\Support\{Collection, Facades\DB};


if (!function_exists('tbl')) {
    function tbl($modelName): string
    {
        return config('db.' . $modelName);
    }
}

if (!function_exists('trTbl')) {
    function trTbl($modelName): string
    {
        return tbl($modelName) . '_tr';
    }
}

if (!function_exists('dbSelect')) {
    function dbSelect(string $table, $columns)
    {
        return DB::table($table)->select($columns)->get();
    }
}

if (!function_exists('myRoles')) {
    function myRoles(): Collection
    {
        return auth()->user()->roles->pluck('name');
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date = null, $format = 'Y-m-d')
    {
        if (!$date) {
            return null;
        }

        return Carbon::make($date)->format($format);
    }
}

if (!function_exists('formatTime')) {
    function formatTime($time = null, $format = 'h:i A')
    {
        if (!$time) {
            return null;
        }

        return Carbon::make($time)->format($format);
    }
}

if (!function_exists('check')) {
    function check($value): bool
    {
        return (isset($value) && $value != '');
    }
}

if (!function_exists('locale')) {
    function locale(): string
    {
        return app()->getLocale();
    }
}

if (!function_exists('respondError')) {
    function respondError(string $message, int $code = 400)
    {
        return response()->json([
            'data' => [
                'success' => false,
                'message' => $message
            ]
        ], $code);
    }
}

if (!function_exists('respondSuccess')) {
    function respondSuccess(string $message, int $code = 200)
    {
        return response()->json([
            'data' => [
                'success' => true,
                'message' => $message
            ]
        ], $code);
    }
}

if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('translatedNames')) {
    /**
     * @param string $table
     * @param string $foreign_key foreign key
     * @return Collection
     */
    function translatedNames(string $table, string $foreign_key)
    {
        return DB::table(trTbl($table))
            ->where('locale', locale())
            ->select('name', $foreign_key . ' as id')
            ->get();
    }
}

if (!function_exists('dbTranslation')) {

    /**
     * get table translation based on app locale
     *
     * @param string $table table name
     * @param string $foreign_key foreign_id
     * @param bool $softDeletes default false
     * @return Collection
     */
    function dbTranslation(string $table, string $foreign_key, bool $softDeletes = false)
    {
        if ($softDeletes) {
            return DB::table(trTbl($table))
                ->where('locale', locale())
                ->join(tbl($table), trTbl($table) . '.' . $foreign_key, '=', tbl($table) . '.id')
                ->whereNull(tbl($table) . '.deleted_at')
                ->select('name', tbl($table) . '.id')
                ->get();
        }

        return DB::table(trTbl($table))
            ->where('locale', locale())
            ->join(tbl($table), trTbl($table) . '.' . $foreign_key, '=', tbl($table) . '.id')
            ->select('name', tbl($table) . '.id')
            ->get();
    }
}

