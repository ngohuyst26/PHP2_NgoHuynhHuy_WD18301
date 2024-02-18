<div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
    <?php if (!empty($detailStaff)): ?>
    <h5 class="card-title">Thông tin nhân viên</h5>

    <div class="row">
        <div class="col-lg-3 col-md-4 label ">Tên</div>
        <div class="col-lg-9 col-md-8"><?= (!empty($detailStaff['name'])?$detailStaff['name']:false) ?></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 label">Số điện thoại</div>
        <div class="col-lg-9 col-md-8"><?= (!empty($detailStaff['phone'])?$detailStaff['phone']:false) ?></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 label">Email</div>
        <div class="col-lg-9 col-md-8"><?= (!empty($detailStaff['email'])?$detailStaff['email']:false) ?></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 label">Chức vụ</div>
        <div class="col-lg-9 col-md-8"><?= position($detailStaff['position_id']) ?></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 label">Bộ phận làm việc</div>
        <div class="col-lg-9 col-md-8"><?= (!empty($detailStaff['department'])?$detailStaff['department']:'Chưa có') ?></div>
    </div>

    <?php endif; ?>
</div>