<?php
namespace App\Http\Process\Message;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model{

    public function get_unread($username){
        $query = "select 	m.id 
                    ,m.date_send 
                    ,m.subject 
                    ,m.date_read 
                    ,concat(uf.first_name,' ',uf.last_name ) as user_from 
            from	message m 
                    inner join my_user uf on uf.id = m.from_user_id
                    inner join my_user ut on ut.id = m.to_user_id 
            where 	ut.username  = '$username'
                    and m.is_read = false;";
                   
        try{
            return  array(
                'status' => 'ok',
                'code' => 200,
                'data' => DB::select($query)
            );
        }catch( Exception $ex ){
            return array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Exception: '.$ex->getMessage()
            );
        }
    }


    public function get_message_id($id){
        
        $this->update_read_message($id);
        
        $query = "select 	m.id 
                    ,m.date_send 
                    ,m.subject 
                    ,m.date_read 
                    ,m.is_read
                    ,concat(uf.first_name,' ',uf.last_name ) as user_from 
            from	message m 
                    inner join my_user uf on uf.id = m.from_user_id
                    inner join my_user ut on ut.id = m.to_user_id 
            where 	m.id = $id";
                   
        try{
            
            return  array(
                'status' => 'ok',
                'code' => 200,
                'data' => DB::select($query)
            );
        }catch( Exception $ex ){
            return array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Exception: '.$ex->getMessage()
            );
        }
    }
    
    private function update_read_message($id){
        $hoy = date("Y-m-d H:i:s");
        $query = "select * from	message m where id = $id";
        
        $res = DB::select($query);
        
        if(!$res[0]->is_read){
            $queryAct = "update message set is_read = true, date_read = '$hoy' where id = $id";
            DB::update($queryAct);
        }
               
    } 

}