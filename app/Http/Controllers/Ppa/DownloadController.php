<?php

namespace App\Http\Controllers\Ppa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function downloadCategoryDocument($name, $id){
        return 101;
    }

    public function downloadDirectorDocument($name, $id){
        return 102;
    }
}
