<div class="card">
	<div class="card-body">
		<h5 class="card-title">Bảng danh sách dự án</h5>
		<!-- Table with hoverable rows -->
		<div class="table-responsive">
			<table class="table table-hover table align-middle ">
				<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Tên</th>
					<th scope="col">Địa chỉ</th>
					<th scope="col">Bắt đầu</th>
					<th scope="col">Hoàn thành</th>
					<th scope="col">Tiến độ</th>
					<th scope="col">Hành động</th>
				</tr>
				</thead>
				<tbody>
				<?php if (!empty($listProject)): ?>
					<?php foreach ($listProject as $key => $project):
                        ?>
						<tr>
							<th scope="row"><?= $key + 1 ?></th>
							<td><p class="text-limit"><?= $project['name'] ?></p></td>
							<td><p class="text-limit"><?= $project['address'] ?></p></td>
							<td style="min-width: 100px;"><?= $project['start_date'] ?></td>
							<td style="min-width: 100px;"><?= $project['end_date'] ?></td>
							<td><span class="text-limit <?= status_project($project['status']) ?>"><?= (empty($project['progress_name'])?'Đang chuẩn bị':$project['progress_name']) ?></span></td>
							<td style="min-width: 150px;">
                                <?php if(check_join(\Core\Session::data('user')['id'],$project['id']) == 1):?>
                                    <button class="btn btn-danger">Đã gửi yêu cầu</button>
                                <?php elseif (check_join(\Core\Session::data('user')['id'],$project['id']) == 2): ?>
                                    <button class="btn btn-success">Đã tham gia</button>
                                <?php else: ?>
								    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#joinModal<?= $project['id'] ?>"><i class="bi bi-plus-circle-fill"></i> Tham gia</button>
								<?php endif; ?>
                                <!--Modal xóa dự án-->
								<div class="modal fade" id="joinModal<?= $project['id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Xác nhân tham gia</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												Bạn có chắc là muốn tham gia dự án "<?= $project['name'] ?>"
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
												<a href="/join_project/<?= $project['id'] ?>" type="button" class="btn btn-primary">Tham gia</a>
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
		</div>
		<!-- End Table with hoverable rows -->
	</div>
</div>
