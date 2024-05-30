<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $avatar = $request->file('avatar')->store('uploads/avatars');
        $filePath = "storage/$avatar";
        $defaultPathImage = 'storage/uploads/avatars/standard-avatar.jpg';
        $group_id = (int)$request->group_id;
        // dd($group_id);
        $user = User::create([
            'group_id' => $group_id,
            'name' => $request->name,
            'avatar' => $filePath ?? $defaultPathImage,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // $text = "
        //     Добрый день ваш аккаунт был зарегистрирован в системе Расписание.ru.
        //     Имя: {$request->name}.
        //     Логин: {$request->email}.
        //     Пароль: {$request->password}.
        //     Не передавайте данную информацию посторонним лицам.
        // ";
        // Mail::raw($text, fn ($mail) => $mail
        //     ->to($request->email)
        //     ->subject('Регистрация на сайте Расписание.ru')
        // );
        // if ($group_id === config('app.user-group.student')) {
        // }
        if($group_id === 3)
            return redirect()->back();
        return redirect()->route('dashboard');
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Пользователя с таким логином не существует'
                ]);
        }
        // $user = auth()->guest()
        return redirect()->route('home');
    }

    public function update(User $user, UpdateRequest $request)
    {
        if ($request->avatar) {
            $avatar = 'storage/' . $request->file('avatar')->store('uploads/avatars');
        }
        $user->update([
            'name' => $request->name,
            'gender' => $request->gender ?? $user->gender,
            'dob' => $request->dob,
            'avatar' => $avatar ?? $user->avatar,
            'update_at' => now()
        ]);

        return redirect()->back();
    }
    public function addStudent(Request $request)
    {
        $student = Student::create([
            'user_id' => $request->user_id,
            'class_id' => $request->class_id,
            'group_id' => $request->group_id
        ]);
        return redirect()->route('register');
    }
    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
