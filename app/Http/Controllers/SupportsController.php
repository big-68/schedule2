<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Support\StoreRequest;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportsController extends Controller
{
    public function store(StoreRequest $request)
    {
        Support::create($request->validated());
        return redirect()->route('dashboard.support');
    }
    public function show()
    {
        return view('pages.supports', [
            'title' => 'Поддержка',
            'supports' => Support::where('flag', '0')->get()
        ]);
    }

    public function answer(Support $support, Request $request)
    {
        $text = $request->description;
        Mail::raw($text, fn ($mail) => $mail
            ->to($request->email)
            ->subject('Поддержка')
        );
        $support->update([
            'flag' => 1
        ]);

        return redirect()->back();
    }
}
