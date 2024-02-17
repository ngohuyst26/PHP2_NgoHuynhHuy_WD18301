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
							<td style="min-width: 150px;">
                                <a href="/chi-tiet/<?= $project['id'] ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Chi tiết"><i class="bi bi-info-circle"> Xem chi tiết</i></a>
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
