<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nameTeacher' => ['required', 'string'],
            'item_id' => ['required']
        ]);

        Teacher::create($validate);
        return redirect()->back();
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
