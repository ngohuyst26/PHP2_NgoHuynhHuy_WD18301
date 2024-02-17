<div class="card">
    <div class="card-body">
        <h5 class="card-title">Cập nhật nguyên liệu</h5>

        <!-- Vertical Form -->
        <form class="row g-3" action="/post_update_material/<?= (!empty($valueMaterial['id'])?$valueMaterial['id']:false) ?>" method="post">
            <div class="col-12">
                <label for="inputnanme" class="form-label">Tên nguyên liệu</label>
                <input type="text" name="name" value="<?= (!empty($valueMaterial['name'])?$valueMaterial['name']:false) ?>" class="form-control" id="inputnanme" placeholder="Tên nguyên liệu">
                <?= form_errors('name', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputunit" class="form-label">Đơn vị</label>
                <input type="text" name="unit" value="<?= (!empty($valueMaterial['unit'])?$valueMaterial['unit']:false) ?>" class="form-control" id="inputunit" placeholder="Đơn vị vd: Bao, cục...">
                <?= form_errors('unit', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputprice" class="form-label">Giá trên từng đơn vị</label>
                <input type="number" name="price" value="<?= (!empty($valueMaterial['price'])?$valueMaterial['price']:false) ?>" class="form-control" id="inputprice" placeholder="Giá trên từng đơn vị">
                <?= form_errors('price', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputsupplier" class="form-label">Nhà cung cấp</label>
                <input type="text" name="supplier" value="<?= (!empty($valueMaterial['supplier'])?$valueMaterial['supplier']:false) ?>" class="form-control" id="inputsupplier" placeholder="Nhà cung cấp">
                <?= form_errors('supplier', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>