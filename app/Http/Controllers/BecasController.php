<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Process\Becas\Hijos;
use App\Http\Process\Becas\Parents;


class BecasController extends Controller
{
    public function becas($email, Request $request){
        $informacion = new Hijos($email);
        $data = array(
            'status' => 'ok',
            'code' => 200,
            'data' => $informacion->response);
        
        
                        
        return response()->json($data, 200);
    }
    
    public function parentdata($cedula, Request $request){
        $parent = new Parents($cedula);
        
        $data = array(
            'status' => 'ok',
            'code' => 200,
            'data' => $parent->response
        );
        
        return response()->json($data, 200);
    } 
}
