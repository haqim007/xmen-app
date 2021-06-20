<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class SuperheroSkills_m extends Model
{
    protected $table = 'superhero_skills';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','superhero_id', 'skill_id',"created_datetime", "updated_datetime"];

    public function bySuperheroID($id){
        $this->select("superhero_skills.id, superhero_id, master_superhero.name as superhero_name, skill_id, skill_name");
        return $this
                ->join("master_superhero","superhero_id=master_superhero.id","left")
                ->join("master_skills","skill_id=master_skills.id","left")
                ->where("superhero_id", $id)
                ->find();
    }

}