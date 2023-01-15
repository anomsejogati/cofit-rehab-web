<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{

    protected $table      = 'us_users';
    protected $primaryKey = 'id';

    public function __construct(){
        parent::__construct();

        $this->us_users = $this->db->table($this->table);
        $this->us_users_log = $this->db->table('us_users_log');
    }
    

    public function auth($user_id, $password)
    {

        $sql = "SELECT a.* FROM $this->table a 
                WHERE (a.email='$user_id' OR a.phone_no='$user_id') 
                AND a.password=md5('$password') 
                AND a.role_id IN (1,2,4) 
                AND a.is_active=1
        ";

        $query = $this->db->query($sql)->getRow();
        
        return $query;

    }


    public function createUserLog($data)
    {

        $this->us_users_log->insert($data);

        return $this->db->insertID();

    }


    public function getByID($user_id)
    {

        $query = $this->db->query("SELECT a.*, b.name as role_name FROM $this->table a 
                                    JOIN us_roles b ON a.role_id=b.id 
                                    WHERE a.id='$user_id'
                                ")->getRow();
        
        return $query;

    }


    public function getByEmail($email)
    {

        $query = $this->db->query("SELECT * FROM $this->table WHERE email='$email'")->getRow();
        
        return $query;

    }


    function create($data){

        $this->us_users->insert($data);
        
        return $this->db->insertID();

    }


    function updateData($id, $data){

        $this->us_users->where('id', $id)->update($data);
        
        return $this->db->affectedRows();

    }


    function updateDataByEmail($email, $data){

        $this->us_users->where('email', $email)->update($data);
        
        return $this->db->affectedRows();

    }


    function updatePassword($id, $data)
    {

        $user_id = $data['user_id'];
        $oldPassword = md5($data['old_password']);
        $newPassword = md5($data['new_password']);

        $check = $this->us_users->getWhere(['id'=>$user_id, 'password'=>$oldPassword])->getRow();

        if(isset($check)){

            $newData = [
                'password' => $newPassword
            ];

            $this->us_users->where('id', $id)->update($newData);
            
            return $this->db->affectedRows();

        }else{

            return 0;

        }


    }

    

}