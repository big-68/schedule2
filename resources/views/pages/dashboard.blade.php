@extends('templates.dashboard_templates')

<div class="dashboard">
    <div class="container">
        <div class="alert alert-success" role="alert">
            Пользователь был успешно зарегестрирован
        </div>
        <div class="alert alert-success" role="alert">
            <div class="mt-3">
                Роль: {{ $user->userGroup->label }}
            </div>
            <div class="mt-3">
                Имя: {{ $user->name }}
            </div>
            <div class="mt-3">
                E-mail: {{ $user->email }}
            </div>
            <div class="mt-3">
                Дата рождения: {{ $user->dob }}
            </div>
            <div class="mt-3">
                Пол: {{ $user->gender }}
            </div>
        </div>
        <form action="{{ route('add.student') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="hidden" value="{{ $user->group_id }}" name="group_id">
                <input type="hidden" value="{{ $user->id }}" name="user_id">
                <label for="number" class="form-label">Назначить класс</label>
                <select class="form-select mb-3" name="class_id"  aria-label="Default select example">
                    <option selected>Выбрать класс</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_code }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Продолжить</button>
        </form>
    </div>
</div>
