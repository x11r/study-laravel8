<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function add()
    {
        return view('admin.news.create');
    }


    public function create()
    {
        return redirect('admin/news/create');
    }

    public function edit($news_id)
    {
        dd(__LINE__ . ' ' .__METHOD__. ' [news_id]'.$news_id);
        return view('edit.news.edit');
    }
}
