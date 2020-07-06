<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showone(Request $request, $id=NULL){
        return 'admin show id#' . $id;
    }

    public function edit($id=NULL)
    {
        return 'admin article edit #' . $id;
    }

    public function editPost($id=NULL)
    {
        return 'admin article edited #' . $id;
    }

    public function delete($id=NULL)
    {
        if ($id === NULL) return 'Noting to delete!';
        return 'admin article edit #' . $id;
    }
}
