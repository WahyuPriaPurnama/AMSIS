<?php


namespace App\Helpers;

use App\Models\LogActivity as ModelsLogActivity;
use Illuminate\Support\Facades\Request;

class LogActivity
{


    public static function addToLog()
    {
        $log = [];
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['user_role'] = auth()->check() ? auth()->user()->role : 1;
        ModelsLogActivity::create($log);
    }


    public static function logActivityLists()
    {
        return ModelsLogActivity::latest()->get();
    }
}
