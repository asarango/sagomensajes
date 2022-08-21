<?php

namespace App\Http\Controllers;

use App\Http\Process\Users\Login;
use Illuminate\Http\Request;

class MyUsersController extends Controller
{
    public function login(Request $request){
        
        $json = $request->json;        
        $login = new Login($json);

        return response()->json($login->response, 200);
    }
}
