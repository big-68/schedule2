<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CallingSchedule\StoreRequest;
use App\Models\CallingSchedule;
use Illuminate\Http\Request;

class CallingScheduleController extends Controller
{
    public function store(StoreRequest $request)
    {
        $callingSchedule = CallingSchedule::create($request->validated());
        return redirect()->back();
    }

    public function update(CallingSchedule $call, Request $request)
    {
        $validate = $request->validate([
            'label' => ['required', 'string'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'break_time' => ['required'],
        ]);
        $call->update($validate);
        return redirect()->back();
    }

    public function delete(CallingSchedule $call)
    {
        $call->delete();
        return redirect()->back();
    }
}
