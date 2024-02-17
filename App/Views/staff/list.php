<div class="card">
    <div class="card-body">
        <h5 class="card-title">Bảng danh sách nhân viên</h5>
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
                        <a href="/nhan-vien/update/<?= $staff['id']?>" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Cập nhật nhân viên"><i class="ri-edit-2-fill"></i></a>
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
                                        Bạn có chắc là muốn xóa nhân viên "<?= $staff['name'] ?>"
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <a href="/nhan-vien/delete/<?= $staff['id'] ?>" type="button" class="btn btn-danger">Xóa</a>
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
    </div>
</div>