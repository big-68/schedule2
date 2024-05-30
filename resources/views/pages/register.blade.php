@extends('templates.main')

@section('content')
    <div class="register">
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-student-tab" data-bs-toggle="pill" data-bs-target="#pills-student" type="button" role="tab" aria-controls="pills-student" aria-selected="true">Регистрация ученика</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-teacher-tab" data-bs-toggle="pill" data-bs-target="#pills-teacher" type="button" role="tab" aria-controls="pills-teacher" aria-selected="false">Регистрация учителя</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-users-tab" data-bs-toggle="pill" data-bs-target="#pills-users" type="button" role="tab" aria-controls="pills-users" aria-selected="false">Пользователи</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab" tabindex="0">
                    <div class="alert alert-info register-alert" role="alert">
                        Регистрация пользователей в системе Расписание.ru
                    </div>
                    <form action="{{ route('auth.register') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="group_id" value="{{ config('app.user-group.student') }}">
                        <div class=" mb-3">
                            <label for="fio" class="form-label">ФИО</label>
                            <input type="tel" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Иванов Иван Иванович" value="{{ old('name') }}" id="fio">
                            @error('name')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label class="form-label">Пол:</label>
                        <div class="form-check">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" value="Мужской" name="gender" id="gender_m">
                            <label class="form-check-label" for="gender_m">
                                Мужской
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" value="Женский" name="gender" id="gender_fm">
                            <label class="form-check-label" for="gender_fm">
                                Женский
                            </label>
                            @error('gender')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Укажите дату рождения</label>
                            <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" id="dob">
                            @error('dob')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Изображение профиля</label>
                            <input class="form-control @error('avatar') is-invalid @enderror" name="avatar" type="file" id="image">
                            @error('avatar')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Электронная почта (E-mail)</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="student@example.com" value="{{ old('email') }}" id="email">
                            @error('email')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" placeholder="********" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                            @error('password')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passwordConfirm" class="form-label">Повторите пароль</label>
                            <input type="password" placeholder="********" name="password_confirmation" class="form-control"  id="passwordConfirm">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Зарегестрировать ученика</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-teacher" role="tabpanel" aria-labelledby="pills-teacher-tab" tabindex="1">
                    <div class="alert alert-info register-alert" role="alert">
                        Регистрация пользователей в системе Расписание.ru
                    </div>
                    <form action="{{ route('auth.register') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="group_id" value="{{ config('app.user-group.teacher') }}">
                        <div class=" mb-3">
                            <label for="fio" class="form-label">ФИО</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Иванов Иван Иванович" value="{{ old('name') }}" id="fio">
                            @error('name')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label class="form-label">Пол:</label>
                        <div class="form-check">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" value="Мужской" name="gender" id="gender_m">
                            <label class="form-check-label" for="gender_m">
                                Мужской
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" value="Женский" name="gender" id="gender_fm">
                            <label class="form-check-label" for="gender_fm">
                                Женский
                            </label>
                            @error('gender')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Укажите дату рождения</label>
                            <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" id="dob">
                            @error('dob')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Изображение профиля</label>
                            <input class="form-control @error('avatar') is-invalid @enderror" name="avatar" type="file" id="image">
                            @error('avatar')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Электронная почта (E-mail)</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="teacher@example.com" value="{{ old('email') }}" id="email">
                            @error('email')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" placeholder="********" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                            @error('password')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passwordConfirm" class="form-label">Повторите пароль</label>
                            <input type="password" placeholder="********" name="password_confirmation" class="form-control"  id="passwordConfirm">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Зарегестрировать учителя</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab" tabindex="2">
                    <table class="table">
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user->group_id === 2 || $user->group_id === 3)
                                    <tr>
                                        <th scope="row">{{ $user->userGroup->label }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->dob }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
