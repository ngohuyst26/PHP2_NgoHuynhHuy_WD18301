<div class="card">
    <div class="card-body">
        <h5 class="card-title">Cập nhật dự án</h5>

        <!-- Vertical Form -->
        <form class="row g-3" method="post" action="/update_project/<?= (!empty($id)?$id:false) ?>">
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Tên dự án</label>
                <input type="text" class="form-control" id="inputNanme4" name="name" value="<?= (!empty($valueProject['name'])?$valueProject['name']:false) ?>" placeholder="Tên dự án">
                <?= form_errors('name', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12 mt-3">
                <label for="inputunit" class="form-label">Nội dung mô tả</label>
                <textarea name="description" id="editor" ><?= (!empty($valueProject['description'])?$valueProject['description']:false) ?></textarea>
		        <?= form_errors('description', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="inputEmail4" name="address" value="<?= (!empty($valueProject['address'])?$valueProject['address']:false) ?>" placeholder="Địa chỉ">
                <?= form_errors('address', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputPassword4" class="form-label">Ngày bắt đầu</label>
                <input type="date" class="form-control" id="inputPassword4" name="start_date" value="<?= (!empty($valueProject['start_date'])?$valueProject['start_date']:false) ?>" placeholder="Ngày bắt đầu">
                <?= form_errors('start_date', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Ngày hoàn thành</label>
                <input type="date" class="form-control" id="inputAddress" name="end_date" value="<?= (!empty($valueProject['end_date'])?$valueProject['end_date']:false) ?>" placeholder="Ngày hoàn thành">
                <?= form_errors('end_date', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Vốn đầu tư</label>
                <input type="number" class="form-control" id="inputAddress" name="invest" value="<?= (!empty($valueProject['invest'])?$valueProject['invest']:false) ?>" placeholder="Vốn đầu tư">
                <?= form_errors('invest', '<span style="color: red;">', '</span>') ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="create">Cập nhật</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>