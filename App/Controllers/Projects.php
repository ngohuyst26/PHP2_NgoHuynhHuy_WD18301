<?php

	namespace App\Controllers;

	use App\Repositories\MaterialsRepositories;
	use App\Repositories\ProjectsRepositories;
	use Core\Controller;
	use App\Models\Projects as ProjectsModel;
	use Core\Request;
	use Core\Response;
	use Core\Session;

	class  Projects extends Controller
	{
		private $data = [];
		public $active;
		private $_response;
		private $_repo;
		private $_repoMaterial;
		private $request;

		public function __construct()
		{
			$this->_repo = new ProjectsRepositories();
			$this->_repoMaterial = new MaterialsRepositories();
			$this->request = new Request();
			$this->_response = new Response();
		}


		public function created()
		{

			$this->data['title'] = 'Tạo dự án';
			$this->data['active']['url'] = $this->active;
			$this->data['content'] = 'projects/created';
			$this->render('layouts/admin/admin_layout', $this->data);
		}

		public function post_project()
		{
			if ($this->request->isPost()) {
				$field = $this->request->getField();
				$this->request->rule([
					'name' => "required|min:5|max:100",
					'description' => 'required',
					'address' => 'required',
					'start_date' => 'required',
					'end_date' => 'required',
					'invest' => 'required|callback_minInvest|number'
				]);
				$this->request->message([
					'name.required' => 'Không được để trống',
					'name.min' => 'Không được nhỏ hơn 5 kí tự',
					'name.unique' => 'Tên dự án đã tồn tại',
					'name.max' => 'Không được lớn hơn 100 kí tự',
					'description.required' => 'Mô tả không được để trống',
					'address.required' => 'Địa chỉ không được để trống',
					'start_date.required' => 'Ngày bắt đầu không được   bỏ trống',
					'end_date.required' => 'Ngày kết thúc không được để trống',
					'invest.required' => 'Không được để trống',
					'invest.number' => 'Không hợp lệ',
					'invest.callback_minInvest' => 'Không được nhỏ hơn 1 củ'
				]);
				if ($this->request->validate()) {
					set_toast('invalid_create_project', 'Không thể tạo dự án!');
					$this->_response->redirect('du-an/created');
					return false;
				}
				$this->_repo->createProject($field);
				set_toast('isvalid_create_project', 'Tạo dự án thành công');
				$this->_response->redirect('du-an/list');
			}
		}


		public function listProjects()
		{
			if (!empty($this->_repo->getListProjects())) {
				$this->data['listProject'] = $this->_repo->getListProjects();
			}
			$this->data['title'] = 'Danh sách dự án';
			$this->data['active']['url'] = $this->active;
			$this->data['content'] = 'projects/list';
			$this->render('layouts/admin/admin_layout', $this->data);
		}

		public function detail($id)
		{
			if (!empty($id)) {
				$detail = $this->_repo->getOneProject($id);
				if (!empty($detail)) {
					$material = $this->_repoMaterial->getAllMaterial();
					$listMaterial = $this->_repo->getMaterialProject($id);
					$listProgress = $this->_repo->getListProgress($id);
					$staffJoin = $this->_repo->staffJoin($id,1);
					$listStaff = $this->_repo->staffJoin($id,2);

					$this->data['listStaff'] = $listStaff;
					$this->data['staffJoin'] = $staffJoin;
					$this->data['listProgress'] = $listProgress;
					$this->data['materialProject'] = $listMaterial;
					$this->data['listMaterial'] = $material;
					$this->data['detailProject'] = $detail;
					$this->data['title'] = 'Chi tiết dự án';
					$this->data['active']['url'] = $this->active;
					$this->data['content'] = 'projects/detail';
					$this->render('layouts/admin/admin_layout', $this->data);
					return true;
				}
			}
			$this->_response->redirect('du-an/list');
		}

		public function addMaterial()
		{
			if ($this->request->isPost()) {
				$field = $this->request->getField();
				$this->request->rule([
					'project_id' => 'required',
					'materials_id' => 'required',
					'quantity' => 'required|callback_minQuantity|number'
				]);

				$this->request->message([
					'project_id.required' => 'Id không tồn tại',
					'materials_id.required' => 'Vui lòng chọn nguyên vật liệu',
					'quantity.required' => 'Số lượng không được để trống',
					'quantity.number' => 'Không hợp lệ',
					'quantity.callback_minQuality' => 'Số lượng phải lớn hơn 0'
				]);
				if ($this->request->validate()) {
					set_toast('invalid_add_material', 'Thêm nguyên vật liệu thất bại');
					Session::flash('show_modal', "$(window).on('load', function() { $('#material').modal('show'); });");
					$this->_response->redirect('du-an/detail/' . $field['project_id']);
				}
				if (!$this->request->validate()) {
					$this->_repo->addMaterial($field);
					set_toast('isvalid_add_material', 'Thêm nguyên vật liệu thành công');
					$this->_response->redirect('du-an/detail/' . $field['project_id']);
				}
			}
			$this->_response->redirect('du-an/list');
		}

		public function updateQuantityMaterial($id)
		{
			if ($this->request->isPost()) {
				if (!empty($id)) {
					$field = $this->request->getField();
					$this->request->rule([
						'id' => 'required',
						'material_id' => 'required',
						'quantity' => 'required|callback_minQuantity|number'
					]);

					$this->request->message([
						'id.required' => 'Id không tồn tại',
						'material_id.required' => 'Id vật liệu không tồn tại',
						'quantity.required' => 'Số lượng không được để trống',
						'quantity.number' => 'Không hợp lệ',
						'quantity.callback_minQuality' => 'Số lượng phải lớn hơn 0'
					]);

					if ($this->request->validate()) {
						set_toast('invalid_update_quantity', 'Không thể cập nhật số lượng nguyên vật liệu');
						Session::flash('show_modal_update', "$(window).on('load', function() { $('#updateModal" . $field['id'] . "').modal('show'); });");
						$this->_response->redirect("du-an/detail/$id");
					}
					if (!$this->request->validate()) {
						$this->_repo->updateQuantityMaterial($field);
					}
					$this->_response->redirect("du-an/detail/$id");
				}

			}
			$this->_response->redirect('du-an/list');
		}

		public function postCreateProgress($id)
		{
			if ($this->request->isPost()) {
				$field = $this->request->getField();

				$this->request->rule([
					'time' => 'required',
					'title' => 'required',
					'description' => 'required',
					'description' => 'required',
					'status' => 'required',
				]);

				$this->request->message([
					'time.required' => 'Thời gian không được để trống',
					'title.required' => 'Tiêu đề không được để trống',
					'description.required' => 'Mô tả không được để trống',
					'status.required' => 'Trạng thái không được để trống',
				]);

				if($this->request->validate()){
					set_toast('invalid_create_progress','Không thể tạo tiến độ');
					Session::flash('show_modal_progress', "$(window).on('load', function() { $('#progress').modal('show'); });");
					if(Session::data('user')['position_id'] == 2){
						$this->_response->redirect('chi-tiet/'.$id);
					}
					$this->_response->redirect('du-an/detail/'.$id);
				}
				if(!$this->request->validate()){
					$this->_repo->createProgress($field,$id);
					set_toast('isvalid_create_progress','Tạo tiến độ thành công');
					if(Session::data('user')['position_id'] == 2){
						$this->_response->redirect('chi-tiet/'.$id);
					}
					$this->_response->redirect('du-an/detail/'.$id);
				}
			}
			$this->_response->redirect('du-an/list');
		}

		public function postUpdateProgress($id){
				if($this->request->isPost()){
					if(!empty($id)){
						$field = $this->request->getField();
						$this->request->rule([
							'id' => 'required',
							'time' => 'required',
							'title' => 'required',
							'description' => 'required',
							'description' => 'required',
							'status' => 'required',
						]);

						$this->request->message([
							'id.required' => 'Id không tồn tại',
							'time.required' => 'Thời gian không được để trống',
							'title.required' => 'Tiêu đề không được để trống',
							'description.required' => 'Mô tả không được để trống',
							'status.required' => 'Trạng thái không được để trống',
						]);

						if($this->request->validate()){
							set_toast('invalid_update_progress','Không thể cập nhật tiến độ');
							Session::flash('show_modal_update_progress', "$(window).on('load', function() { $('#updateProgress" . $field['id'] . "').modal('show'); });");
							$this->_response->redirect("du-an/detail/$id");
						}
						if(!$this->request->validate()){
							$this->_repo->updateProgress($field);
							set_toast('isvalid_update_progress','Cập nhật tiến độ thành công');
							$this->_response->redirect("du-an/detail/$id");
						}
					}
				}
				$this->_response->redirect('du-an/list');
		}

		public function updateProject($id)
		{
			if (!empty($id)) {
				$data = $this->_repo->getOneProject($id);
				if (!empty($data)) {
					if ($this->request->isGet()) {
						$this->data['valueProject'] = $data;
						$this->data['id'] = $id;
						$this->data['active']['url'] = $this->active;
						$this->data['title'] = 'Cập nhật dự án';
						$this->data['content'] = 'projects/update';
						$this->render('layouts/admin/admin_layout', $this->data);
						return true;
					}
				}
				$this->_response->redirect('du-an/list');
			}
		}

		public function deleteMaterialProject($materials_projects_id, $project_id)
		{
			if (!empty($materials_projects_id) && !empty($project_id)) {
				$this->_repo->deleteMaterialProject($materials_projects_id);
				$this->_response->redirect("du-an/detail/$project_id");
			}
			$this->_response->redirect("du-an/list");
		}

		public function deleteProgress($progress_id, $project_id)
		{
			if (!empty($progress_id) && !empty($project_id)) {
				$this->_repo->deleteProgress($progress_id);
				$this->_response->redirect("du-an/detail/$project_id");
			}
			$this->_response->redirect("du-an/list");
		}

		public function postUpdate($id)
		{
			if (!empty($id)) {
				if ($this->request->isPost()) {
					$field = $this->request->getField();
					$this->request->rule([
						'name' => "required|min:5|max:100",
						'description' => 'required',
						'address' => 'required',
						'start_date' => 'required',
						'end_date' => 'required',
						'invest' => 'required|callback_minInvest|number'
					]);
					$this->request->message([
						'name.required' => 'Không được để trống',
						'name.min' => 'Không được nhỏ hơn 5 kí tự',
						'name.unique' => 'Tên dự án đã tồn tại',
						'name.max' => 'Không được lớn hơn 100 kí tự',
						'description.required' => 'Mô tả không được để trống',
						'address.required' => 'Địa chỉ không được để trống',
						'start_date.required' => 'Ngày bắt đầu không được   bỏ trống',
						'end_date.required' => 'Ngày kết thúc không được để trống',
						'invest.required' => 'Không được để trống',
						'invest.number' => 'Không hợp lệ',
						'invest.callback_minInvest' => 'Không được nhỏ hơn 1 củ'
					]);
					if ($this->request->validate()) {
						set_toast('invalid_update_project', 'Không thể cập nhật dự án!');
						$this->_response->redirect("du-an/update/$id");
						return false;
					}
					$this->_repo->updateProject($field, $id);
					set_toast('isvalid_update_project', 'Cập nhật dự án thành công');
					$this->_response->redirect("du-an/update/$id");
				}
			}
		}

		public function deleteProject($id)
		{
			if (!empty($id)) {
				$this->_repo->deleteProject($id);
				$this->_response->redirect('du-an/list');
			}
		}


		public function listProjectsStaff(){
			if (!empty($this->_repo->getListProjects())) {
				$this->data['listProject'] = $this->_repo->getListProjects();
			}
			$this->data['title'] = 'Danh sách dự án';
			$this->data['active']['url'] = $this->active;
			$this->data['content'] = 'staff_projects/list';
			$this->render('layouts/admin/admin_layout', $this->data);
		}

		public function listProjectsJoinStaff(){
			if (!empty($this->_repo->joinList())) {
				$this->data['listProject'] = $this->_repo->joinList();
			}
			$this->data['title'] = 'Danh sách dự án';
			$this->data['active']['url'] = $this->active;
			$this->data['content'] = 'staff_projects/join_list';
			$this->render('layouts/admin/admin_layout', $this->data);
		}

		public function joinProjects($id){
			if(!empty($id)){
				$this->_repo->joinProject($id);
				$this->_response->redirect('chua-tham-gia');
			}
		}

		public function detailProjectsJoinStaff($id){
			if (!empty($id)) {
				$detail = $this->_repo->getOneProject($id);
				if (!empty($detail)) {
					$material = $this->_repoMaterial->getAllMaterial();
					$listMaterial = $this->_repo->getMaterialProject($id);
					$listProgress = $this->_repo->getListProgress($id);

					$this->data['listProgress'] = $listProgress;
					$this->data['materialProject'] = $listMaterial;
					$this->data['listMaterial'] = $material;
					$this->data['detailProject'] = $detail;
					$this->data['title'] = 'Chi tiết dự án';
					$this->data['active']['url'] = $this->active;
					$this->data['content'] = 'staff_projects/detail';
					$this->render('layouts/admin/admin_layout', $this->data);
					return true;
				}
			}
			$this->_response->redirect('du-an/list');
		}

		public function addStaff($staff_id,$project_id){
			if(!empty($staff_id) && !empty($project_id)){
				$this->_repo->addStaff($staff_id,$project_id);
				$this->_response->redirect("du-an/detail/$project_id");
			}
			$this->_response->redirect("du-an/list");
		}

		public function deleteStaffProject($staff_id,$project_id){
			if(!empty($staff_id)){
				$this->_repo->deleteStaff($staff_id,$project_id);
				$this->_response->redirect("du-an/detail/$project_id");
			}
		}

		public function minInvest($value)
		{
			if ($value < 1000000) return true;
			return false;
		}

		public function minQuantity($quantity)
		{
			if ($quantity <= 0) {
				return true;
			}
			return false;
		}


	}
