<?php
	$router['/'] = 'admin/dashboard/index';
	$router['dashboard'] = 'admin/dashboard/index';

	//Xác thực
	$router['dang-nhap'] = 'AuthUser/login';
	$router['dang-ky'] = 'AuthUser/register';
	$router['post_user'] = 'AuthUser/postUser';
	$router['quen-mat-khau'] = 'AuthUser/forgotPassword';
	$router['xac-nhan'] = 'AuthUser/confirmCode';
	$router['post_code'] = 'AuthUser/postCode';
	$router['post_forgot'] = 'AuthUser/postForgot';
	$router['dang-xuat'] = 'AuthUser/logout';
	$router['check'] = 'AuthUser/checkUser';

	//Role nhân viên
	$router['chua-tham-gia'] = 'projects/listProjectsStaff';
	$router['join_project/(\d+)'] = 'projects/joinProjects/$1';
	$router['da-tham-gia'] = 'projects/listProjectsJoinStaff';
	$router['chi-tiet/(\d+)'] = 'projects/detailProjectsJoinStaff/$1';


	// Model dự án
	$router['du-an'] = 'projects/listProjects';
	$router['du-an/list'] = 'projects/listProjects';
	$router['du-an/detail/(\d+)'] = 'projects/detail/$1';
	$router['post_add_material'] = 'projects/addMaterial/$1';
	$router['update_quantity_material/(\d+)'] = 'projects/updateQuantityMaterial/$1';
	$router['delete_material_project/delete/(\d+)/(\d+)'] = 'projects/deleteMaterialProject/$1/$2';
	$router['post_create_progress/(\d+)'] = 'projects/postCreateProgress/$1';
	$router['update_progress/(\d+)'] = 'projects/postUpdateProgress/$1';
	$router['delete_progress/delete/(\d+)/(\d+)'] = 'projects/deleteProgress/$1/$2';
	$router['du-an/created'] = 'projects/created';
	$router['post_project'] = 'projects/post_project';
	$router['du-an/update/(\d+)'] = 'projects/updateProject/$1';
	$router['update_project/(\d+)'] = 'projects/postUpdate/$1';
	$router['du-an/delete/(\d+)'] = 'projects/deleteProject/$1';
	$router['add_staff/(\d+)/(\d+)'] = 'projects/addStaff/$1/$2';
	$router['delete_staff_project/(\d+)/(\d+)'] = 'projects/deleteStaffProject/$1/$2';


	// Model nhân viên
	$router['nhan-vien'] = 'staff/lists';
	$router['nhan-vien/list'] = 'staff/lists';
	$router['nhan-vien/created'] = 'staff/createdStaff';
	$router['post_create_staff'] = 'staff/postCreateStaff';
	$router['nhan-vien/delete/(\d+)'] = 'staff/deleteStaff/$1';
	$router['nhan-vien/update/(\d+)'] = 'staff/updateStaff/$1';
	$router['post_update_staff/(\d+)'] = 'staff/postUpdateStaff/$1';
	$router['nhan-vien/detail/(\d+)'] = 'staff/detailStaff/$1';

	// Model vật liệu
	$router['vat-lieu'] = 'material/listsMaterial';
	$router['vat-lieu/list'] = 'material/listsMaterial';
	$router['vat-lieu/created'] = 'material/createdMaterial';
	$router['post_create_material'] = 'material/postCreateMaterial';
	$router['vat-lieu/update/(\d+)'] = 'material/updateMaterial/$1';
	$router['post_update_material/(\d+)'] = 'material/postUpdateMaterial/$1';
	$router['vat-lieu/delete/(\d+)'] = 'material/deleteMaterial/$1';

	define('_ROUTE_CONFIG_', $router);
?>