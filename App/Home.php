<?php

namespace App;

class Home
{
    public function index()
    {
        echo '
            <form action="/upload" method="post" enctype="multipart/form-data"> 
                <input type="file" name="image"/>
                <button type="submit" name="upload">Upload</button>
            </form>
            ';
    }

    public function upload()
    {
        if (isset($_POST['upload'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $old_name = $_FILES['image']['name'];
            $file_extension = pathinfo($old_name, PATHINFO_EXTENSION);
            $new_name = date('Y-m-d-m-Y-H-i-s') . '.' . $file_extension;
            $path = _DIR_ROOT_ . '/App/Upload/' . $new_name;
            move_uploaded_file($_FILES["image"]["tmp_name"], $path);
        }
    }


}