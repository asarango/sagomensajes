<?php
namespace App\Http\Process\Becas;

use App\Becas;
use Exception;
use Illuminate\Database\Eloquent\Model;

class Hijos extends Model{
    private $email_familia;    
    //private $data;    
    public $response;
    
    public function __construct($email){
        $this->email_familia = $email;        
        $this->get_data();
    }
    
    private function get_data(){
        try{
            $data = Becas::where([
                [ 'email_familia', '=', "$this->email_familia" ]
            ])->get();
            
            
            $this->response = $data;
        } catch (Exception $e){
            $this->response = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Exception capturada: '. $e->getMessage()
            );
        }        
    }
}