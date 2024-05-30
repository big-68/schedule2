<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CallingSchedule;
use App\Models\Classroom;
use App\Models\Item;
use App\Models\Schedule;
use App\Models\SchoolClass;
use App\Models\Teacher;
use App\Models\User;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home', ['title' => 'Главная']);
    }
    public function login()
    {

        return view('pages.login', ['title' => 'Войти']);
    }
    public function register()
    {
        if (auth()->user()->group_id !== 1) {
            return redirect()->route('home');
        }
        return view('pages.register', [
            'title' => 'Регистрация пользователей',
            'users' => User::get()
        ]);
    }
    public function profile()
    {
        return view('pages.profile', [
            'title' => 'Личный кабинет',

        ]);
    }
    public function schedule()
    {
        return view('pages.schedule', [
            'title' => 'Расписание',
            'schedules' => CallingSchedule::get(),
            'classrooms' => Classroom::orderBy('number')->get(),
            'classes' => SchoolClass::get(),
            'users' => User::get(),
            'scheduleItems' => Schedule::get(),
            'teachers' => Teacher::get(),
            'items' => Item::get()
        ]);
    }
    public function dashboard()
    {
        return view('pages.dashboard', [
            'title' => 'Регистрация',
            'user' => User::orderBy('id','desc')->first(),
            'classes' => SchoolClass::get()
        ]);
    }

    public function userSupport()
    {
        return view('pages.user_support', ['title' => 'Поддержка']);
    }
    public function dashboardSupport()
    {
        return view('pages.dashboard_support', ['title' => 'Поддержка']);
    }

    public function showItems()
    {
        return view('pages.items', [
            'title' => 'Предметы',
            'items' => Item::get(),
            'teachers' => Teacher::orderBy('name')->get()
        ]);
    }

    public function scheduleUser()
    {
        return view('pages.schedule_user',[
            'title' => 'Расписание',
            'scheduleItems' => Schedule::get()
        ]);
    }
}
