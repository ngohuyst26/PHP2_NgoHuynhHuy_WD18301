<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tạo dự án</h5>

        <!-- Vertical Form -->
        <form class="row g-3" method="post">
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Tên dự án</label>
                <input type="text" class="form-control" id="inputNanme4" name="name_project" value="<?= (isset($value['name_project'])?$value['name_project']:false) ?>" placeholder="Tên dự án">
                <span style="color: red"><?= (!empty($errors['name_project'])?$errors['name_project']:false) ?></span>
            </div>
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Mô tả</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" name="description"  id="floatingTextarea" style="height: 100px;"><?= (isset($value['description'])?$value['description']:false) ?></textarea>
                    <label for="floatingTextarea">Mô tả</label>
                </div>
                <span style="color: red"><?= (!empty($errors['description'])?$errors['description']:false) ?></span>
            </div>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="inputEmail4" name="address" value="<?= (isset($value['address'])?$value['address']:false) ?>" placeholder="Địa chỉ">
                <span style="color: red"><?= (!empty($errors['address'])?$errors['address']:false) ?></span>
            </div>
            <div class="col-12">
                <label for="inputPassword4" class="form-label">Ngày bắt đầu</label>
                <input type="date" class="form-control" id="inputPassword4" name="date_start" value="<?= (isset($value['date_start'])?$value['date_start']:false) ?>" placeholder="Ngày bắt đầu">
                <span style="color: red"><?= (!empty($errors['date_start'])?$errors['date_start']:false) ?></span>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Ngày hoàn thành</label>
                <input type="date" class="form-control" id="inputAddress" name="date_end" value="<?= (isset($value['date_end'])?$value['date_end']:false) ?>" placeholder="Ngày hoàn thành">
                <span style="color: red"><?= (!empty($errors['date_end'])?$errors['date_end']:false) ?></span>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Vốn đầu tư</label>
                <input type="number" class="form-control" id="inputAddress" name="invest" value="<?= (isset($value['invest'])?$value['invest']:false) ?>" placeholder="Vốn đầu tư">
                <span style="color: red"><?= (!empty($errors['invest'])?$errors['invest']:false) ?></span>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="create">Tạo</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>