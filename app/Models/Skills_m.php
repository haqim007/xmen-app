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

    public function getSkillBySuperhero($id){
        return $this
            ->select("master_skills.id")
            ->join("superhero_skills","skill_id=master_skills.id","left")
            ->where("superhero_id", $id)
            ->findAll();
    }

    public function exceptSuperheroID($id){

        // skills that the superhero has
        $skills = $this->getSkillBySuperhero($id);
        $skill_ids = array_column($skills, "id");
        $skill_ids = count($skill_ids) > 0 ? $skill_ids : [""];
        return $this
            ->select("master_skills.id, skill_name")
            ->whereNotIn("id", $skill_ids)
            ->findAll();
    }

}