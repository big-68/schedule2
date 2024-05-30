@extends('templates.main')

@section('content')
    <div class="login">
        <div class="container">

            <div class="login__title">
                Вход
            </div>
            <form class="login__form" action="{{ route('auth.login') }}" novalidate method="post">
                @csrf
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ old('email') }}" name="email" id="login" aria-describedby="emailHelp">
                    @error('email')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                </div>
                    <button type="submit" class="btn btn-primary w-100">Войти</button>
            </form>
        </div>
    </div>
@endsection
