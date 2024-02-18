<div class="card">
    <div class="card-body">
        <h5 class="card-title">Danh sách nguyên vật liệu sử dụng</h5>
        <!-- Table with hoverable rows -->
        <table class="table table-hover align-middle">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên nguyên vật liệu</th>
                <th scope="col">Đơn vị</th>
                <th scope="col">Giá thành trên một đơn vị</th>
                <th scope="col">Nhà cung cấp</th>
                <th scope="col" style="width: 14%">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($listMaterials)): ?>
            <?php foreach ($listMaterials as $key => $material):  ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $material['name'] ?></td>
                <td><?= $material['unit'] ?></td>
                <td><?= number_format($material['price'],0,',','.').' VNĐ/'.$material['unit'] ?></td>
                <td><?= $material['supplier'] ?></td>
                <td>
                    <a href="/vat-lieu/update/<?= $material['id']?>" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Cập nhật vật liệu"><i class="ri-edit-2-fill"></i></a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $material['id'] ?>"><i class="bi bi-x-circle"></i></button>
                    <!--Modal xóa dự án-->
                    <div class="modal fade" id="deleteModal<?= $material['id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Xóa nguyên vật liệu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc là muốn xóa vật liệu "<?= $material['name'] ?>"
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <a href="/vat-lieu/delete/<?= $material['id'] ?>" type="button" class="btn btn-danger">Xóa</a>
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