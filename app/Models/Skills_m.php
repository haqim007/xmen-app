<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Skills_m extends Model
{
    protected $table = 'master_skills';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','skill_name'];

    // public function getSuperheroAll(){
    //     $this->select("master_superhero.id, name, gender_name");
    //     return $this->join("master_gender","gender_id=master_gender.id","left")->findAll();
    // }

    public function exceptSuperheroID($id){
        $this->select("master_skills.id, skill_name");
        return $this
                ->join("superhero_skills","skill_id=master_skills.id","left")
                ->where("superhero_id !=", $id)
                ->find();
    }

}