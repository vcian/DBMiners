<?php

namespace App\Http\Controllers\Backend\SchemaDesign;

use App\Http\Controllers\Controller;

class SchemaDesignController extends Controller
{
    public function index()
    {
        return view('backend.schema-design.chat');
    }
}
