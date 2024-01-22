<?php

namespace App\Model;

interface BaseModelInterface{
    function all();
    function find($id);
    function created($data = []);
    function update($id, $data = []);
    function delete($id);
}