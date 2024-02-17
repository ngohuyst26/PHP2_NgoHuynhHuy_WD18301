<div class="card">
    <div class="card-body">
        <h5 class="card-title">Thêm nhân viên</h5>

        <!-- Vertical Form -->
        <form class="row g-3" action="/post_create_staff" method="post">
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Tên nhân viên</label>
                <input type="text" name="name" value="<?= form_value('name') ?>" class="form-control" id="inputNanme4" placeholder="Tên nhân viên">
                <?= form_errors('name', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="phone" value="<?= form_value('phone') ?>" class="form-control" id="inputEmail4" placeholder="Số điện thoại">
                <?= form_errors('phone', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Địa chỉ email</label>
                <input type="email" name="email" value="<?= form_value('email') ?>" class="form-control" id="inputEmail4" placeholder="Địa chỉ email">
                <?= form_errors('email', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Chức vụ</label>
                <select class="form-select" name="position_id" aria-label="Default select example">
                    <option selected value="3">Nhân viên</option>
                    <option value="2">Khách hàng</option>
                    <option value="1">Quản trị viên</option>
                </select>
                <?= form_errors('position_id', '<span style="color: red;">', '</span>') ?>
            </div>



            <div class="col-12">
                <label for="inputAddress" class="form-label">Bộ phận làm việc</label>
                <input type="text" name="department" value="<?= form_value('department') ?>" class="form-control" id="inputAddress" placeholder="Bộ phận làm việc">
                <?= form_errors('department', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Mật khẩu</label>
                <input type="password" name="password" value="<?= form_value('password') ?>" class="form-control" id="inputAddress" placeholder="Mật khẩu">
                <?= form_errors('password', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" name="confirm_password" value="<?= form_value('confirm_password') ?>" class="form-control" id="inputAddress" placeholder="Nhập lại mật khẩu">
                <?= form_errors('confirm_password', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>