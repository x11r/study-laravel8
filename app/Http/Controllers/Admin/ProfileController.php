<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profiles;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Profiles::$rules);

        $profile = new Profiles;
        $form = $request->all();

        if (isset($form['image'])) {
            $path =  $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

//        dd($form);
//        dd(__LINE__ . ' ' . __METHOD__);

        $profile->fill($form);
        $profile->save();

        return view('admin/profile/create');
    }
    public function edit()
    {
        return view('admin.profile.edit');
    }
    public function update()
    {
        return view('admin/profile/edit');
    }
}
