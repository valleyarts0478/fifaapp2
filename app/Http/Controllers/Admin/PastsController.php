<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Convention;
use App\Models\League;
use App\Models\ConventionsResult;
use Artisan; //追加


class PastsController extends Controller
{
    public function pastmove()
    {
        Artisan::call('command:past');

        return redirect('/admin/dashboard')->with('success', 'コピーしました!');
    }
}