<?php

namespace App\Models;

use Core\Model;
use mysql_xdevapi\Exception;

class Projects extends Model
{
    private $table = 'projects';
    private $field = 'id ,name, description, address, invest, start_date, end_date';

    protected function tableName()
    {
        return $this->table;
    }

    protected function fieldFill()
    {
        return $this->field;
    }

    protected function findFill()
    {
        return 'id';
    }

    public function createProject(array $data)
    {
        if (!empty($data)) {
            $this->create($data);
        }
    }

    public function getListProjects()
    {
        $data = $this->db->table('projects')
            ->field('projects.id AS id, 
               projects.name AS name, 
               projects.address AS address, 
               projects.invest AS invest, 
               projects.start_date AS start_date, 
               projects.end_date AS end_date, 
               (SELECT progress.title 
                FROM progress 
                WHERE projects.id = progress.project_id 
                ORDER BY created_at DESC 
                LIMIT 1) AS progress_name, 
               (SELECT progress.status 
                FROM progress 
                WHERE projects.id = progress.project_id 
                ORDER BY created_at DESC 
                LIMIT 1) AS status')
            ->select();
        return $data;
    }

    public function updateProject(array $data, string | int $id){
        $this->update($data,'id','=',$id);
    }

    public function deleteProject(string | int $id){
        $this->delete($id,'id','=');
    }

    public function getOneProject(string | int $id){
        return $this->find($id);
    }

    public function addMaterial($data){
        $this->db->table('materials_projects')->insert($data);
    }

    public function getMaterialProject($id){
        return $this->db->field("materials_projects.id as materials_projects_id,materials.id as id, materials.name as name, materials.unit as unit, 
            materials.price as price, materials_projects.quantity as quantity,
            materials.supplier as supplier, materials_projects.total as total")
            ->table('materials_projects')
            ->innerJoin('materials',"materials_projects.materials_id = materials.id")
            ->where('materials_projects.project_id','=',$id)->orderBy('materials_projects.id','DESC')->select();
    }

	public function updateQuantityMaterial($data,$id){
		$this->db->table('materials_projects')->where('id','=',$id)->updateQuery($data);
	}

	public function deleteMaterialProject($id){
		$this->db->table('materials_projects')->deleteQuery($id,'id','=');
	}

	public function deleteProgress($id){
		$this->db->table('progress')->deleteQuery($id,'id','=');
	}
	public function createProgress($data){
		$this->db->table('progress')->insert($data);
	}

	public function updateProgress($data,$id){
		$this->db->table('progress')->where('id', '=', $id)->updateQuery($data);
	}

	public function getListProgress($id){
		return $this->db->table('progress')->where('project_id','=',$id)->select();
	}

	public function joinProject($data){
		$this->db->table('project_staff')->insert($data);
	}

	public function joinList($staff_id){
		return $this->db->field(' projects.id, projects.name, projects.description,
				projects.address,projects.invest,projects.start_date,projects.end_date ')
				->table('project_staff')->innerJoin('projects','project_staff.project_id = projects.id')
				->where('project_staff.staff_id','=',$staff_id)->where('project_staff.status','=',2)->select();
	}
}
