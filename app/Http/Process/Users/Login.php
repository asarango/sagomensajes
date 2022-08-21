<?php

namespace App\Http\Process\Users;

use App\MyUser;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model{

    private $username;
    private $password;

    public $response;

    public function __construct($dataJson){
        $request = json_decode($dataJson);
        $this->username = $request->username;
        $this->password = $request->password;

        // revisa si el usuario existe
        $this->login();

    }


    private function login(){
        $query = "select 	u.first_name 
                            ,u.last_name 
                            ,u.username 
                            ,r.code 
                            ,r.name as rol
                    from 	my_user u
                            inner join rol r ON r.id = u.rol_id 
                    where 	u.username = '$this->username'
                            and u.password='$this->password'
                            and u.is_active = true;";

        try{
            $this->response = array(
                'status' => 'ok',
                'code' => 200,
                'data' => DB::select($query)
            );
        }catch( Exception $ex ){
            $this->response = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Exception: '.$ex->getMessage()
            );
        }
    }

}