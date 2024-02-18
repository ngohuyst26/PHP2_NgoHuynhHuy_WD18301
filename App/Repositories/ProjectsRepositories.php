<?php

namespace App\Repositories;

use App\Models\Materials;
use App\Models\Projects;
use Core\Session;

class ProjectsRepositories
{
    private $_projectsModel;
    private $_materialModel;

    public function __construct()
    {
        $this->_projectsModel = new Projects();
        $this->_materialModel = new Materials();
    }

    public function createProject($data)
    {
        if (!empty($data)) {
            $data = array_filter($data);
            $this->_projectsModel->createProject($data);
        }
    }

    public function updateProject($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            $data = array_filter($data);
            $this->_projectsModel->updateProject($data, $id);
        }
    }

    public function getListProjects()
    {
        return $this->_projectsModel->getListProjects();
    }

    public function deleteProject($id)
    {
        $this->_projectsModel->deleteProject($id);
    }

    public function getOneProject($id)
    {
        $data = $this->_projectsModel->find($id);
        if (!empty($data)) {
            return $data;
        }
        return false;
    }

    public function addMaterial($data)
    {
        if(!empty($data)){
            $material = $this->_materialModel->getOneMaterial($data['materials_id']);
            if(!empty($material)){
                $data = array_filter($data);
                $data['total'] = $material['price'] * $data['quantity'];
                $this->_projectsModel->addMaterial($data);
                return true;
            }
            return false;
        }
    }

    public function getMaterialProject($project_id){
        return $this->_projectsModel->getMaterialProject($project_id);
    }

	public function updateQuantityMaterial($data){
		if(!empty($data)){
			$material = $this->_materialModel->getOneMaterial($data['material_id']);
			if(!empty($material)){
				$id = $data['id'];
				unset($data['material_id']);
				unset($data['id']);
				$data = array_filter($data);
				$data['total'] = $material['price'] * $data['quantity'];
				$this->_projectsModel->updateQuantityMaterial($data,$id);
				return true;
			}
			return false;
		}
	}

	public function deleteMaterialProject($id){
		$this->_projectsModel->deleteMaterialProject($id);
	}

	public function deleteProgress($id){
		$this->_projectsModel->deleteProgress($id);
	}
	public function createProgress($data,$id){
		if(!empty($data)){
			$data = array_filter($data);
			$data['project_id'] = $id;
			$this->_projectsModel->createProgress($data);
			return true;
		}
		return false;
	}

	public function updateProgress($data){
		if(!empty($data)){
			$data = array_filter($data);
			$id = $data['id'];
			$this->_projectsModel->updateProgress($data,$id);
			return true;
		}
		return false;
	}

	public function getListProgress($id){
		return $this->_projectsModel->getListProgress($id);
	}

	public function joinProject($id){
		if(!empty($id)){
			$data['project_id'] = $id;
			$data['staff_id'] = Session::data('user')['id'];
			$this->_projectsModel->joinProject($data);
		}
	}

	public function joinList(){
		return $this->_projectsModel->joinList(Session::data('user')['id']);
	}

	public function staffJoin($project_id,$status){
		return $this->_projectsModel->staffJoin($project_id,$status);
	}

	public function addStaff($staff_id,$project_id){
		$this->_projectsModel->addStaff($staff_id,$project_id);
	}

	public function deleteStaff($staff_id,$project_id){
		$this->_projectsModel->deleteStaff($staff_id,$project_id);
	}
}