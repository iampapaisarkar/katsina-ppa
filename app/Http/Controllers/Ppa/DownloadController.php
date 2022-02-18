<?php

namespace App\Http\Controllers\Ppa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryDocuments;
use App\Models\CompanyDirectors;

class DownloadController extends Controller
{
    public function downloadCategoryDocument($field, $name, $id){

        $document = CategoryDocuments::where(['id' => $id])
        ->where(function($q) use ($name){
            $q->where('attachment_1', $name);
            $q->orWhere('attachment_2', $name);
            $q->orWhere('attachment_3', $name);
            $q->orWhere('attachment_4', $name);
            $q->orWhere('attachment_5', $name);
            $q->orWhere('attachment_6', $name);
            $q->orWhere('attachment_7', $name);
            $q->orWhere('attachment_8', $name);
            $q->orWhere('attachment_9', $name);
        })
        ->first();


        if($document){
            $path = storage_path('app'. DIRECTORY_SEPARATOR . 'private' . 
            DIRECTORY_SEPARATOR . $document->user_id . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . $document[$field]);
            return response()->download($path);
        }else{
            return abort(404);
        }
    }

    public function downloadDirectorDocument($field, $name, $id){

        $document = CompanyDirectors::where(['id' => $id])
        ->where(function($q) use ($name){
            $q->where('passport', $name);
            $q->orWhere('identification', $name);
            $q->orWhere('certificates', $name);
        })
        ->first();


        if($document){
            $path = storage_path('app'. DIRECTORY_SEPARATOR . 'private' . 
            DIRECTORY_SEPARATOR . $document->user_id . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . $document[$field]);
            return response()->download($path);
        }else{
            return abort(404);
        }
    }
}
