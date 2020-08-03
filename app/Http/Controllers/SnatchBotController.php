<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SnatchBotController extends Controller
{
    public function index(Request $request)
    {
        $url = $request->path();
        $users = DB::table('producto') -> where('idCategoria', $url) -> get();

        return view('VistaSnatchBot', ['users' => $users], ['url' => $url]);
    }
}
