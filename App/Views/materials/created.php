<div class="card">
    <div class="card-body">
        <h5 class="card-title">Thêm nguyên liệu</h5>

        <!-- Vertical Form -->
        <form class="row g-3" action="/post_create_material" method="post">
            <div class="col-12">
                <label for="inputnanme" class="form-label">Tên nguyên liệu</label>
                <input type="text" name="name" value="<?= form_value('name') ?>" class="form-control" id="inputnanme" placeholder="Tên nguyên liệu">
                <?= form_errors('name', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputunit" class="form-label">Đơn vị</label>
                <input type="text" name="unit" value="<?= form_value('unit') ?>" class="form-control" id="inputunit" placeholder="Đơn vị vd: Bao, cục...">
                <?= form_errors('unit', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputprice" class="form-label">Giá trên từng đơn vị</label>
                <input type="number" name="price" value="<?= form_value('price') ?>" class="form-control" id="inputprice" placeholder="Giá trên từng đơn vị">
                <?= form_errors('price', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputsupplier" class="form-label">Nhà cung cấp</label>
                <input type="text" name="supplier" value="<?= form_value('supplier') ?>" class="form-control" id="inputsupplier" placeholder="Nhà cung cấp">
                <?= form_errors('supplier', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>