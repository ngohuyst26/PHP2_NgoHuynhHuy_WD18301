<section class="section profile">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview">
                            <div class="mb-5" id="profile-overview" role="tabpanel">
                                <h5 class="card-title">Mô tả dự án</h5>
                                <p class="small fst-italic"><?= html_entity_decode(!empty($detailProject['description']) ? $detailProject['description'] : false)  ?></p>
                                <h5 class="card-title">Thông tin cơ bản</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tên dự án</div>
                                    <div class="col-lg-9 col-md-8"><?= (!empty($detailProject['name']) ? $detailProject['name'] : false) ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Địa chỉ</div>
                                    <div class="col-lg-9 col-md-8"><?= (!empty($detailProject['address']) ? $detailProject['address'] : false) ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Ngày bất đầu</div>
                                    <div class="col-lg-9 col-md-8"><?= (!empty($detailProject['start_date']) ? $detailProject['start_date'] : false) ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Ngày dự kiến hoàn thành</div>
                                    <div class="col-lg-9 col-md-8"><?= (!empty($detailProject['end_date']) ? $detailProject['end_date'] : false) ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Vốn đầu tư</div>
                                    <div class="col-lg-9 col-md-8"><?= (!empty($detailProject['invest']) ? number_format($detailProject['invest'], 0, ',', '.') : false) ?>
                                        VNĐ
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>
        </div>
    </div>
</section>

<div class="main-card mb-3 card">
    <div class="card-body " style="max-height: 500px; overflow: scroll; overflow-x: hidden ">
        <h5 class="card-title">Tiến độ dự án</h5>
        <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">

	        <?php if (!empty($listProgress)): ?>
	        <?php foreach ($listProgress as $key => $progress): ?>
            <div class="vertical-timeline-item vertical-timeline-element">
                <div>
                    <span class="vertical-timeline-element-icon bounce-in">
                        <i class="badge badge-dot badge-dot-xl bg-<?= status_project($progress['status']) ?>"> </i>
                    </span>
                    <div class="vertical-timeline-element-content bounce-in">
                        <h4 class="timeline-title"><?= $progress['title'] ?></h4>
                        <?= html_entity_decode($progress['description']) ?>
                        <span class="vertical-timeline-element-date"><?= $progress['time'] ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
	        <?php endif; ?>
<!--            <div class="vertical-timeline-item vertical-timeline-element">-->
<!--                <div>-->
<!--                            <span class="vertical-timeline-element-icon bounce-in">-->
<!--                                <i class="badge badge-dot badge-dot-xl bg-warning"> </i>-->
<!--                            </span>-->
<!--                    <div class="vertical-timeline-element-content bounce-in">-->
<!--                        <p>Another meeting with UK client today, at <b class="text-danger">3:00 PM</b>-->
<!--                        </p>-->
<!--                        <p>Yet another one, at <span class="text-success">5:00 PM</span></p>-->
<!--                        <span class="vertical-timeline-element-date">12:25 PM</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vertical-timeline-item vertical-timeline-element">-->
<!--                <div>-->
<!--                            <span class="vertical-timeline-element-icon bounce-in">-->
<!--                                <i class="badge badge-dot badge-dot-xl bg-danger"> </i>-->
<!--                            </span>-->
<!--                    <div class="vertical-timeline-element-content bounce-in">-->
<!--                        <h4 class="timeline-title">Discussion with team about new product launch</h4>-->
<!--                        <p>meeting with team mates about the launch of new product. and tell them about-->
<!--                            new features</p>-->
<!--                        <span class="vertical-timeline-element-date">6:00 PM</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vertical-timeline-item vertical-timeline-element">-->
<!--                <div>-->
<!--                            <span class="vertical-timeline-element-icon bounce-in">-->
<!--                                <i class="badge badge-dot badge-dot-xl bg-primary"> </i>-->
<!--                            </span>-->
<!--                    <div class="vertical-timeline-element-content bounce-in">-->
<!--                        <h4 class="timeline-title text-success">Discussion with marketing team</h4>-->
<!--                        <p>Discussion with marketing team about the popularity of last product</p>-->
<!--                        <span class="vertical-timeline-element-date">9:00 AM</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vertical-timeline-item vertical-timeline-element">-->
<!--                <div>-->
<!--                            <span class="vertical-timeline-element-icon bounce-in">-->
<!--                                <i class="badge badge-dot badge-dot-xl bg-success"> </i>-->
<!--                            </span>-->
<!--                    <div class="vertical-timeline-element-content bounce-in">-->
<!--                        <h4 class="timeline-title">Purchase new hosting plan</h4>-->
<!--                        <p>Purchase new hosting plan as discussed with development team, today at <a-->
<!--                                    href="javascript:void(0);" data-abc="true">10:00 AM</a></p>-->
<!--                        <span class="vertical-timeline-element-date">10:30 PM</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vertical-timeline-item vertical-timeline-element">-->
<!--                <div>-->
<!--                            <span class="vertical-timeline-element-icon bounce-in">-->
<!--                                <i class="badge badge-dot badge-dot-xl bg-warning"> </i>-->
<!--                            </span>-->
<!--                    <div class="vertical-timeline-element-content bounce-in">-->
<!--                        <p>Another conference call today, at <b class="text-danger">11:00 AM</b></p>-->
<!--                        <p>Yet another one, at <span class="text-success">1:00 PM</span></p>-->
<!--                        <span class="vertical-timeline-element-date">12:25 PM</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vertical-timeline-item vertical-timeline-element">-->
<!--                <div>-->
<!--                            <span class="vertical-timeline-element-icon bounce-in">-->
<!--                                <i class="badge badge-dot badge-dot-xl bg-warning"> </i>-->
<!--                            </span>-->
<!--                    <div class="vertical-timeline-element-content bounce-in">-->
<!--                        <p>Another meeting with UK client today, at <b class="text-danger">3:00 PM</b>-->
<!--                        </p>-->
<!--                        <p>Yet another one, at <span class="text-success">5:00 PM</span></p>-->
<!--                        <span class="vertical-timeline-element-date">12:25 PM</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vertical-timeline-item vertical-timeline-element">-->
<!--                <div>-->
<!--                            <span class="vertical-timeline-element-icon bounce-in">-->
<!--                                <i class="badge badge-dot badge-dot-xl bg-danger"> </i>-->
<!--                            </span>-->
<!--                    <div class="vertical-timeline-element-content bounce-in">-->
<!--                        <h4 class="timeline-title">Discussion with team about new product launch</h4>-->
<!--                        <p>meeting with team mates about the launch of new product. and tell them about-->
<!--                            new features</p>-->
<!--                        <span class="vertical-timeline-element-date">6:00 PM</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vertical-timeline-item vertical-timeline-element">-->
<!--                <div>-->
<!--                            <span class="vertical-timeline-element-icon bounce-in">-->
<!--                                <i class="badge badge-dot badge-dot-xl bg-primary"> </i>-->
<!--                            </span>-->
<!--                    <div class="vertical-timeline-element-content bounce-in">-->
<!--                        <h4 class="timeline-title text-success">Discussion with marketing team</h4>-->
<!--                        <p>Discussion with marketing team about the popularity of last product</p>-->
<!--                        <span class="vertical-timeline-element-date">9:00 AM</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vertical-timeline-item vertical-timeline-element">-->
<!--                <div>-->
<!--                            <span class="vertical-timeline-element-icon bounce-in">-->
<!--                                <i class="badge badge-dot badge-dot-xl bg-success"> </i>-->
<!--                            </span>-->
<!--                    <div class="vertical-timeline-element-content bounce-in">-->
<!--                        <h4 class="timeline-title">Purchase new hosting plan</h4>-->
<!--                        <p>Purchase new hosting plan as discussed with development team, today at <a-->
<!--                                    href="javascript:void(0);" data-abc="true">10:00 AM</a></p>-->
<!--                        <span class="vertical-timeline-element-date">10:30 PM</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vertical-timeline-item vertical-timeline-element">-->
<!--                <div>-->
<!--                            <span class="vertical-timeline-element-icon bounce-in">-->
<!--                                <i class="badge badge-dot badge-dot-xl bg-warning"> </i>-->
<!--                            </span>-->
<!--                    <div class="vertical-timeline-element-content bounce-in">-->
<!--                        <p>Another conference call today, at <b class="text-danger">11:00 AM</b></p>-->
<!--                        <p>Yet another one, at <span class="text-success">1:00 PM</span></p>-->
<!--                        <span class="vertical-timeline-element-date">12:25 PM</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>

<!--Bảng tiến độ dự án-->
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="card-title">Tiến độ</h5>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#progress"><i class="bi bi-plus-circle"></i> Tạo tiến độ </button>
                <div class="modal fade" id="progress" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <form class="row g-3" method="post" action="/post_create_progress/<?= (!empty($detailProject['id']) ? $detailProject['id'] : false) ?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tạo tiến độ cho dự án</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12 mt-3">
                                        <label for="inputunit" class="form-label">Thời gian</label>
                                        <input type="datetime-local" name="time" value="<?= form_value('time') ?>" class="form-control" id="inputunit" placeholder="Thời gian">
										<?= form_errors('time', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label for="inputunit" class="form-label">Tiêu đề</label>
                                        <input type="text" name="title" value="<?= form_value('title') ?>" class="form-control" id="inputunit" placeholder="Tiêu đề">
		                                <?= form_errors('title', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label for="inputunit" class="form-label">Nội dung mô tả</label>
                                        <textarea name="description" id="editor" >
                                        <?= form_value('description') ?>
                                        </textarea>
		                                <?= form_errors('description', '<span style="color: red;">', '</span>') ?>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <label for="inputEmail4" class="form-label">Trạng thái</label>
                                        <select class="selectpicker" name="status" data-width="100%" style="border: 1px solid black;" data-style="btn-info">
                                            <option value="1" data-content="<span class='badge bg-warning'>Chuẩn bị</span>"></option>
                                            <option value="2" data-content="<span class='badge bg-primary'>Đang thực hiện</span>"></option>
                                            <option value="3" data-content="<span class='badge bg-success'>Hoàn thành</span>"></option>
                                            <option value="4" data-content="<span class='badge bg-danger'>Tạm hoãn</span>"></option>
                                        </select>
                                        <?= form_errors('position_id', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Tạo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-hover align-middle">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
			<?php if (!empty($listProgress)): ?>
				<?php foreach ($listProgress as $key => $progress): ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $progress['time'] ?></td>
                        <td><?= $progress['title'] ?></td>
                        <td style="max-width: 300px; ">
                            <div  class="text-limit-row">
                                <?= html_entity_decode($progress['description']) ?>
                            </div>
                        </td>
                        <td><span class="<?= status_project($progress['status']) ?>"><?= status_progress($progress['status']) ?></span></td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateProgress<?= $progress['id'] ?>"><i class="ri-edit-2-fill"></i></button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProgress<?= $progress['id'] ?>"><i class="bi bi-x-circle"></i></button>

                            <div class="modal fade" id="updateProgress<?= $progress['id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <form method="post" action="/update_progress/<?= (!empty($detailProject['id']) ? $detailProject['id'] : false) ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Cập nhật tiến độ</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= ((!empty($progress['id']))?$progress['id']: false) ?>">
                                                <div class="col-12 mt-3">
                                                    <label for="inputunit" class="form-label">Thời gian</label>
                                                    <input type="datetime-local" name="time" value="<?= ((!empty($progress['time']))?$progress['time']: false) ?>" class="form-control" id="inputunit" placeholder="Thời gian">
			                                        <?= form_errors('time', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <label for="inputunit" class="form-label">Tiêu đề</label>
                                                    <input type="text" name="title" value="<?= ((!empty($progress['title']))?$progress['title']: false) ?>" class="form-control" id="inputunit" placeholder="Tiêu đề">
			                                        <?= form_errors('title', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <label for="inputunit" class="form-label">Nội dung mô tả</label>
                                                    <textarea name="description" class="editor_update" ><?= ((!empty($progress['description']))?$progress['description']: false) ?></textarea>
			                                        <?= form_errors('description', '<span style="color: red;">', '</span>') ?>
                                                </div>

                                                <div class="col-12 mt-3">
                                                    <label for="inputEmail4" class="form-label">Trạng thái</label>
                                                    <select class="selectpicker" name="status" data-width="100%" style="border: 1px solid black;" data-style="btn-info">
                                                        <option value="1" <?= (($progress['status'] == 1)?'selected':false) ?> data-content="<span class='badge bg-warning'>Chuẩn bị</span>"></option>
                                                        <option value="2" <?= (($progress['status'] == 2)?'selected':false) ?> data-content="<span class='badge bg-primary'>Đang thực hiện</span>"></option>
                                                        <option value="3" <?= (($progress['status'] == 3)?'selected':false) ?> data-content="<span class='badge bg-success'>Hoàn thành</span>"></option>
                                                        <option value="4" <?= (($progress['status'] == 4)?'selected':false) ?> data-content="<span class='badge bg-danger'>Tạm hoãn</span>"></option>
                                                    </select>
			                                        <?= form_errors('status', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-warning">Cập nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--Modal xóa dự án-->
                            <div class="modal fade" id="deleteProgress<?= $progress['id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa vật liệu trong dự án</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc là muốn xóa tiến độ "<?= $progress['title'] ?>"
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <a href="/delete_progress/delete/<?= $progress['id'] ?>/<?= (!empty($detailProject['id']) ? $detailProject['id'] : false) ?>" type="button" class="btn btn-danger">Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
				<?php endforeach; ?>
			<?php endif; ?>
            </tbody>
        </table>
        <!-- End Table with hoverable rows -->

    </div>
</div>
<!--Danh sách chờ duyệt-->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Danh sách nhân viên chờ duyệt</h5>
        <div class="table-responsive">
            <table class="table table-hover table align-middle ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Bộ phận làm việc</th>
                    <th scope="col">Hành động</th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($staffJoin)): ?>
					<?php foreach ($staffJoin as $key => $staff): ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $staff['name'] ?></td>
                            <td><?= $staff['phone'] ?></td>
                            <td><?= $staff['email'] ?></td>
                            <td><?= position($staff['position_id']) ?></td>
                            <td><?= (empty($staff['department'])?'Chưa có':$staff['department']) ?></td>
                            <td>
                                <a href="/nhan-vien/detail/<?= $staff['id']?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Chi tiết nhân viên"><i class="bi bi-info-circle"></i></a>
                                <a href="/add_staff/<?= $staff['id']?>/<?= (!empty($detailProject['id']) ? $detailProject['id'] : false) ?>" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Duyệt">Duyệt</a>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStaffJoin<?= $staff['id'] ?>"><i class="bi bi-x-circle"></i></button>
                                <!--Modal xóa dự án-->
                                <div class="modal fade" id="deleteStaffJoin<?= $staff['id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xóa nhân viên</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc là muốn xóa nhân viên "<?= $staff['name'] ?>"
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                <a href="/delete_staff_project/<?= $staff['id'] ?>/<?= (!empty($detailProject['id']) ? $detailProject['id'] : false) ?>" type="button" class="btn btn-danger">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
					<?php endforeach; ?>
				<?php endif; ?>
                </tbody>
            </table>
	        <?= (empty($staffJoin)?'<p class="text-center">Không có dữ liệu</p>':false) ?>
        </div>
    </div>
</div>

<!--Danh sách đã tham gia-->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Danh sách nhân viên đã tham gia</h5>
        <div class="table-responsive">
            <table class="table table-hover table align-middle ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Bộ phận làm việc</th>
                    <th scope="col">Hành động</th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($listStaff)): ?>
					<?php foreach ($listStaff as $key => $staff): ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $staff['name'] ?></td>
                            <td><?= $staff['phone'] ?></td>
                            <td><?= $staff['email'] ?></td>
                            <td><?= position($staff['position_id']) ?></td>
                            <td><?= (empty($staff['department'])?'Chưa có':$staff['department']) ?></td>
                            <td>
                                <a href="/nhan-vien/detail/<?= $staff['id']?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Chi tiết nhân viên"><i class="bi bi-info-circle"></i></a>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $staff['id'] ?>"><i class="bi bi-x-circle"></i></button>
                                <!--Modal xóa dự án-->
                                <div class="modal fade" id="deleteModal<?= $staff['id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xóa nhân viên</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc là muốn xóa nhân viên "<?= $staff['name'] ?>" khỏi dự án
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                <a href="/delete_staff_project/<?= $staff['id'] ?>/<?= (!empty($detailProject['id']) ? $detailProject['id'] : false) ?>" type="button" class="btn btn-danger">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
					<?php endforeach; ?>
				<?php endif; ?>
                </tbody>
            </table>
			<?= (empty($listStaff)?'<p class="text-center">Không có dữ liệu</p>':false) ?>
        </div>
    </div>
</div>

<!--Bảng nguyên vật liệu-->
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="card-title">Nguyên vật liệu</h5>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#material"><i class="bi bi-plus-circle"></i> Thêm </button>
                <!--Modal xóa dự án-->
                <div class="modal fade" id="material" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <form class="row g-3" method="post" action="/post_add_material">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Thêm nguyên vật liệu cho dự án</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12 form-group">
                                        <input type="hidden" name="project_id" value="<?= (!empty($detailProject['id']) ? $detailProject['id'] : false) ?>">
                                        <label for="material" class="form-label">Nguyên vật liệu</label>
                                        <select id="material" name="materials_id" class="selectpicker form-control" data-live-search="true" data-size="5" data-width="100%" style="border: 1px solid black;">
                                            <option value="0">Chọn nguyên vật liệu</option>
                                            <?php if (!empty($listMaterial)): ?>
                                                <?php foreach ($listMaterial as $material): ?>
                                                    <option value="<?= $material['id'] ?>"
                                                            data-tokens="<?= $material['name'] ?>"><?= $material['name'] ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <?= form_errors('materials_id', '<span style="color: red;">', '</span>') ?>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <label for="inputunit" class="form-label">Số lượng</label>
                                        <input type="text" name="quantity" value="<?= form_value('quantity') ?>" class="form-control" id="inputunit" placeholder="Số lượng">
                                        <?= form_errors('quantity', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table with hoverable rows -->
        <table class="table table-hover align-middle">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên vật liệu</th>
                <th scope="col">Đơn vị</th>
                <th scope="col">Giá/Đơn vị</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng giá</th>
                <th scope="col">Nhà cung cấp</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($materialProject)): ?>
                <?php foreach ($materialProject as $key => $material): ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $material['name'] ?></td>
                        <td><?= $material['unit'] ?></td>
                        <td><?= number_format($material['price'],0,',','.').' VNĐ/'.$material['unit'] ?></td>
                        <td><?= $material['quantity'] ?></td>
                        <td><?= number_format($material['total'],0,',','.') ?> VNĐ</td>
                        <td><?= $material['supplier'] ?></td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?= $material['materials_projects_id'] ?>"><i class="ri-edit-2-fill"></i></button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $material['materials_projects_id'] ?>"><i class="bi bi-x-circle"></i></button>
                            <div class="modal fade" id="updateModal<?= $material['materials_projects_id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <form method="post" action="/update_quantity_material/<?= (!empty($detailProject['id']) ? $detailProject['id'] : false) ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Cập nhật số lượng vật liệu</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12 mt-3">
                                                    <label for="inputunit" class="form-label">Số lượng</label>
                                                    <input type="text" name="quantity" value="<?= $material['quantity'] ?>" class="form-control" id="inputunit"
                                                           placeholder="Số lượng">
                                                    <input type="hidden" name="id" value="<?= $material['materials_projects_id'] ?>">
                                                    <input type="hidden" name="material_id" value="<?= $material['id'] ?>">
                                                    <?= form_errors('quantity', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-warning">Cập nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--Modal xóa dự án-->
                            <div class="modal fade" id="deleteModal<?= $material['materials_projects_id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa vật liệu trong dự án</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc là muốn xóa vật liệu "<?= $material['name'] ?>"
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <a href="/delete_material_project/delete/<?= $material['materials_projects_id'] ?>/<?= (!empty($detailProject['id']) ? $detailProject['id'] : false) ?>" type="button" class="btn btn-danger">Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <!-- End Table with hoverable rows -->

    </div>
</div>


