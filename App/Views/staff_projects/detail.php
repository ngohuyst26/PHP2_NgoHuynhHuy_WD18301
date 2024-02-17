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
										<input type="text" name="title" class="form-control" id="inputunit" placeholder="Tiêu đề">
										<?= form_errors('title', '<span style="color: red;">', '</span>') ?>
									</div>
									<div class="col-12 mt-3">
										<label for="inputunit" class="form-label">Nội dung mô tả</label>
										<textarea name="description" id="editor" >

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
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
		</table>
		<!-- End Table with hoverable rows -->

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
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
		</table>
		<!-- End Table with hoverable rows -->

	</div>
</div>


