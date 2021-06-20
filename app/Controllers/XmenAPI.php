<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Superhero_m;
use App\Models\Skills_m;
use App\Models\SuperheroSkills_m;
 
class XmenAPI extends ResourceController
{
    use ResponseTrait;

    // get all superhero
    public function index()
    {
        $model = new Superhero_m();
        $data = $model->getSuperheroAll();
        return $this->respond($data, 200);
    }
 
    // get single superhero
    public function show($id = null)
    {
        $model = new Superhero_m();

        try {
            $data = $model->bySuperheroID($id);
            if($data){
                return $this->respond($data, 200);
            }else{
                return $this->failNotFound('No Data Found with id '.$id);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->failServerError('Server error. Please contact the Administrator');
        }
    }
 
    // update superhero
    public function update($id = null)
    {
        try {
            $model = new Superhero_m();
            // check prevData
            $prevData = $model->find($id);
            if(!$prevData){
                return $this->failNotFound('No Data Found with id '.$id);
            }
            // end of check prevData

            $json = $this->request->getJSON();
            if($json){
                $data = [
                    'name' => $json->superhero_name,
                    'gender_id' => $json->superhero_gender
                ];
            }else{
                $input = $this->request->getRawInput();
                $data = [
                    'name' => $input['superhero_name'],
                    'gender_id' => $input['superhero_gender']
                ];
            }
            // Insert to Database
            $model->update($id, $data);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' =>  'Data Updated'
            ];
            return $this->respond($response);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->failServerError('Server error. Please contact the Administrator');
        }
    }

    public function create_or_update_superhero_skill($id=null){
        $db = \Config\Database::connect();
        try {
            $db->transBegin();

            $skills_m = new Skills_m();
            $superhero_skills_m = new SuperheroSkills_m();
            $superhero_m = new Superhero_m();

            // check prev data superhero
            $prevData = $superhero_m->find($id);
            if(!$prevData){
                return $this->failNotFound('No Data Found with id '.$id);
            }
            // end of check prev data superhero

            // check whether skill exist or not
            $json = $this->request->getJSON();
            
            if($json){
                    $check_skill = $skills_m->find($json->new_skill);
                    $data = [
                        'skill_name' => $json->new_skill
                    ];
            }else{
                $input = $this->request->getRawInput();
                $data = [
                    'skill_name' => $input['new_skill']
                ];
                $check_skill = $skills_m->find($input['new_skill']);
            }
            
            if($check_skill){
                $skill_id = $new_skil;
            }else{
                
                $data['created_datetime'] = date("Y-m-d H:i:s");
                $data['updated_datetime'] = date("Y-m-d H:i:s");

                $skills_m->insert($data);
                $query_skill = $skills_m->getLastQuery();
                $skill_id = $skills_m->getInsertID();
            }

            $superhero_skill_data = [
                "superhero_id" => $id,
                "skill_id" => $skill_id
            ];
            
            $superhero_skills_m->insert($superhero_skill_data);

            if ($db->transStatus() === FALSE)
            {
                $db->transRollback();
                $this->fail("Transaction failed. Failed to create skill");
            }
            else
            {
                $db->transCommit();
                return $this->setResponseFormat('json')
                    ->respond([
                        'error' => false, 
                        'status' => 200, 
                        'messages'=>'Success update data'
                    ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->failServerError('Server error. Please contact the Administrator');
        }

        return $this->respond("hello");
    }

    // get superhero skills
    public function show_skills($id = null)
    {
        $model = new SuperheroSkills_m();

        try {
            $data = $model->bySuperheroID($id);
            if($data){
                return $this->respond($data, 200);
            }else{
                return $this->failNotFound('No Data Found with id '.$id);
            }
        } catch (\Throwable $th) {
            // throw $th;
            return $this->failServerError('Server error. Please contact the Administrator');
        }
    }
 
}