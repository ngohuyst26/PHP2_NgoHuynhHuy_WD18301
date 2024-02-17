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
            <?php foreach ($listProject as $key => $project):  ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><p class="text-limit"><?= $project['name'] ?></p></td>
                <td><p class="text-limit"><?= $project['address'] ?></p></td>
                <td style="min-width: 100px;"><?= $project['start_date'] ?></td>
                <td style="min-width: 100px;"><?= $project['end_date'] ?></td>
                <td><span class="text-limit <?= status_project($project['status']) ?>"><?= (empty($project['progress_name'])?'Đang chuẩn bị':$project['progress_name']) ?></span></td>
                <td style="min-width: 150px;">
                    <a href="/du-an/detail/<?= $project['id']?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Chi tiết"><i class="bi bi-info-circle"></i></a>
                    <a href="/du-an/update/<?= $project['id']?>" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Cập nhật dự án"><i class="ri-edit-2-fill"></i></a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $project['id'] ?>"><i class="bi bi-x-circle"></i></button>
                    <!--Modal xóa dự án-->
                    <div class="modal fade" id="deleteModal<?= $project['id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">XÓA DỰ ÁN</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                     Bạn có chắc là muốn xóa dự án "<?= $project['name'] ?>"
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <a href="/du-an/delete/<?= $project['id'] ?>" type="button" class="btn btn-danger">Xóa</a>
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