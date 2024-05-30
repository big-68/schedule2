@extends('templates.main')

@section('content')
    <div class="profile">
        <div class="container">
            <div class="profile__title">
                Личный кабинет
            </div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Личные данные </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="profile__inner">
                        <div class="profile__inner-item">
                            <div class="profile__inner-img">
                                <img src="{{ auth()->user()->avatar }}" alt="">
                            </div>
                        </div>
                        <div class="profile__inner-item">
                            Роль: {{ auth()->user()->userGroup->label }}
                            <form action="{{ route('update', ['user' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="login" class="form-label">ФИО</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? auth()->user()->name  }}" name="name" id="login" aria-describedby="emailHelp">
                                    @error('name')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <label class="form-label">Пол:</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror"  {{ auth()->user()->gender === 'Мужской' ? 'checked' : NULL }} type="radio" value="Мужской" name="gender" id="gender_m">
                                    <label class="form-check-label" for="gender_m">
                                        Мужской
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" {{ auth()->user()->gender === 'Женский' ? 'checked' : NULL }} value="Женский" name="gender" id="gender_fm">
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
                                    <label for="dob" class="form-label">Дата рождения</label>
                                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') ?? auth()->user()->dob }}" id="dob">
                                    @error('dob')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Новое изображение профиля</label>
                                    <input class="form-control @error('avatar') is-invalid @enderror" name="avatar" type="file" id="image">
                                    @error('avatar')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Сохранить изменения</button>
                            </form>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
@endsection
