<?php
require_once DIR.'/Controller/Controler.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/91f424987f.js" crossorigin="anonymous"></script>
    <title>PC05784 - Bài 4</title>
</head>
<body>
<div class="row d-flex justify-content-center">
    <div class="col-6">
        <div class="border border-2 p-3 mt-3">
            <h2 class="text-center">Tìm kiếm người dùng</h2>
            <form method="get">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="col-8 mt-4 border">
        <table class="table table-hover ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Bộ phận</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $staff): ?>
            <tr>
                <th scope="row"><?= $staff['id'] ?></th>
                <td><?= $staff['name'] ?></td>
                <td><?= $staff['phone'] ?></td>
                <td><?= $staff['department'] ?></td>
                <td><a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>