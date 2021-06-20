<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Superhero_m extends Model
{
    protected $table = 'master_superhero';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','name', "gender_id"];

    public function getSuperheroAll(){
        $this->select("master_superhero.id, name, gender_name");
        return $this->join("master_gender","gender_id=master_gender.id","left")->findAll();
    }

    public function bySuperheroID($id){
        $this->select("master_superhero.id, name, gender_id");
        return $this
                ->join("master_gender","gender_id=master_gender.id","left")
                ->find($id);
    }

}