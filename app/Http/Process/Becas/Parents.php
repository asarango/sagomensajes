<?php
namespace App\Http\Process\Becas;

use App\Becas;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parents extends Model{
    private $dni;    
    public $response;
    
    public function __construct($dni){
        $this->dni = $dni;        
        $this->response = $this->get_data();
    }
    
   
    private function get_data(){
        $query = "select 	nombres_estudiante, nombres_representante
                                , email_familia, 'Global2022**' as clave
                    from 	info_xrabecas_ws
                    where 	num_ident_repre = '$this->dni'";
                
        try{
            return array(
                'status' => 'ok',
                'code' => 200,
                'data' => DB::select($query)
            );
        } catch (Exception $ex){
            return array(
                'status' => 'error',
                'code' => '500',
                'message' => 'Exception capturada: '.$ex->getMessage()
            );
        }                
    }
}