@extends('templates.main')

@section('content')
    <div class="class">
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-createClass-tab" data-bs-toggle="pill" data-bs-target="#pills-createClass" type="button" role="tab" aria-controls="pills-createClass" aria-selected="true">Создать новый класс</button>
                </li>
                {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-student-tab" data-bs-toggle="pill" data-bs-target="#pills-student" type="button" role="tab" aria-controls="pills-student" aria-selected="false">Добавить ученика в класс</button>
                </li> --}}
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-teacher-tab" data-bs-toggle="pill" data-bs-target="#pills-teacher" type="button" role="tab" aria-controls="pills-teacher" aria-selected="false">Классы</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-createClass" role="tabpanel" aria-labelledby="pills-createClass-tab" tabindex="0">
                    <div class="alert alert-info register-alert" role="alert">
                        Создание нового класса
                    </div>
                    <form action="{{ route('add.class') }}" method="POST">
                        @csrf
                        <div class=" mb-3">
                            <label for="number_class" class="form-label">Номер класса</label>
                            <select class="form-select mb-3" id="number_class" name="number_class"  aria-label="Default select example">
                                <option selected>Выбрать номер класса</option>
                                @for ($i = 1; $i<10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error('number_class')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <label for="class_code" class="form-label">Буква класса</label>
                            <select class="form-select mb-3" id="class_code" name="class_code"  aria-label="Default select example">
                                <option selected>Выбрать букву класса</option>
                                <option value="А"> А </option>
                                <option value="Б"> Б </option>
                                <option value="В"> В </option>
                                <option value="Г"> Г </option>
                            </select>
                            @error('class_code')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="max_count" class="form-label">Количество учащихся</label>
                            <input type="text" class="form-control @error('max_count') is-invalid @enderror" name="max_count" value="{{ old('max_count') }}" id="max_count">
                            @error('max_count')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <label for="teacher_id" class="form-label">Классный руководитель</label>
                            <select class="form-select mb-3 @error('teacher_id') is-invalid @enderror" id="teacher_id" name="teacher_id"  aria-label="Default select example">
                                <option selected>Выбрать классного руководителя</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->nameTeacher}} - {{$teacher->item->nameItem}}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Создать новый класс</button>
                    </form>
                </div>
                {{-- <div class="tab-pane fade" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab" tabindex="0">
                    <form action="{{ route('add.student') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="number" class="form-label">Ученик</label>
                            <select class="form-select mb-3" name="class_id"  aria-label="Default select example">
                                <option selected>Выбрать ученика</option>
                                @foreach ($users as $user)
                                    @if ($user->group_id === 2)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" value="{{ $user->group_id }}" name="group_id">
                            <input type="hidden" value="{{ $user->id }}" name="user_id">
                            <label for="number" class="form-label">Класс</label>
                            <select class="form-select mb-3" name="class_id"  aria-label="Default select example">
                                <option selected>Выбрать класс</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Продолжить</button>
                    </form>
                </div> --}}
                <div class="tab-pane fade" id="pills-teacher" role="tabpanel" aria-labelledby="pills-teacher-tab" tabindex="1">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Буква</th>
                                <th scope="col">Кол-во учащихся</th>
                                <th scope="col">Клас. руковод.</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr>
                                    {{-- <th scope="row">{{ $class->class_code }}</th> --}}
                                    <form action="{{ route('update.class', ['class' => $class->id]) }}" method="POST">
                                        @csrf
                                        <td>
                                            <input class="update-class__input" type="number" name="number_class" value="{{ $class->number_class }}">
                                        </td>
                                        <td>
                                            <input class="update-class__input" type="text" name="class_code" value="{{ $class->class_code }}">
                                        </td>
                                        <td>
                                            <input class="update-class__input" type="number" name="max_count" value="{{ $class->max_count }}">
                                        </td>
                                        <td class="w-25">
                                            <select class="form-select" name="item_id" aria-label="Default select example">
                                                <option value="{{ $class->teacher->id }}" selected>{{ $class->teacher->nameTeacher }} - {{ $class->teacher->item->nameItem }}</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}">{{ $teacher->nameTeacher }} - {{ $teacher->item->nameItem }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-info">Редактировать</button>
                                        </td>
                                    </form>
                                    <td>
                                        <form action="{{ route('destroy.class', ['class' => $class->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
