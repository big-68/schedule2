<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolClasses\StoreRequest;
use App\Models\SchoolClass;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class SchoolClassesController extends Controller
{
    public function show()
    {
        return view('pages.class',[
            'title' => 'Классы',
            'classes' => SchoolClass::orderBy('number_class')->get(),
            'users' => User::get(),
            'teachers' => Teacher::get()
        ]);
    }

    public function store(StoreRequest $request)
    {
        // if ($request->number_class === 1) {
        //     if($request->max_daily_load > 4 || $request->max_number_of_classes_day > 4){
        //         return back()
        //             ->withInput()
        //             ->withErrors([
        //                 'max_daily_load' => 'Максимальная дневная нагрузка для 1 класса не должна превышать 4-x часов в день',
        //                 'max_number_of_classes_day' => 'Максимальное число уроков для 1 класса не должно превышать 4 уроков в день'
        //             ]);
        //     }
        // }
        $class = SchoolClass::create($request->validated());
        return redirect()->back();
    }

    public function update(SchoolClass $class, Request $request)
    {
        $class->update([
            'number_class' => $request->number_class,
            'class_code' => $request->class_code,
            'max_count' => $request->max_count,
        ]);
        return redirect()->back();
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();
        return redirect()->back();
    }
}
