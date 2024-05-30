@extends('templates.main')

@section('content')
    <div class="schedule">
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @if (auth()->user()->group_id === 1)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-add-tab" data-bs-toggle="pill" data-bs-target="#pills-add" type="button" role="tab" aria-controls="pills-add" aria-selected="true">Добавить расписание</button>
                    </li>
                @endif
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">Расписание</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-call-tab" data-bs-toggle="pill" data-bs-target="#pills-call" type="button" role="tab" aria-controls="pills-call" aria-selected="false">Расписание звонков</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-classroom-tab" data-bs-toggle="pill" data-bs-target="#pills-classroom" type="button" role="tab" aria-controls="pills-classroom" aria-selected="false">Кабинеты</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-add" role="tabpanel" aria-labelledby="pills-add-tab" tabindex="0">
                    @if (auth()->user()->group_id === config('app.user-group.admin'))
                    <div class="alert alert-info register-alert" role="alert">
                        Сгенерировать новое расписание
                    </div>
                    <form action="{{ route('add.schedule') }}" method="POST">
                        @csrf
                        <div class=" mb-3">
                            <label for="number" class="form-label">Класс</label>
                            <select class="form-select mb-3" name="schoolClass_id"  aria-label="Default select example">
                                <option selected>Выбрать класс для которого хотите создать расписание</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->number_class }}">{{ $class->number_class }}-{{ $class->class_code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Создать расписание</button>
                    </form>
                    {{-- <form action="{{ route('add.schedule') }}" method="POST">
                        @csrf
                        <div class=" mb-3">
                            <label class="form-label">День недели</label>
                            <select class="form-select mb-3" name="date_of_week"  aria-label="Default select example">
                                <option selected>Выбрать день недели</option>
                                <option value="Понедельник">Понедельник</option>
                                <option value="Вторник">Вторник</option>
                                <option value="Среда">Среда</option>
                                <option value="Четверг">Четверг</option>
                                <option value="Пятница">Пятница</option>
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label for="number" class="form-label">Класс</label>
                            <select class="form-select mb-3" name="class_id"  aria-label="Default select example">
                                <option selected>Выбрать класс</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label for="number" class="form-label">Номер урока</label>
                            <select class="form-select mb-3" name="callingSchedule_id"  aria-label="Default select example">
                                <option selected>Выбрать номер</option>
                                @foreach ($schedules as $schedule)
                                    <option value="{{ $schedule->id }}">{{ $schedule->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label for="end_time" class="form-label">Название предмета</label>
                            <input type="text" class="form-control @error('end_time') is-invalid @enderror" name="subject" placeholder="Русский язык" id="end_time">
                            @error('end_time')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <label for="number" class="form-label">Номер кабинета</label>
                            <select class="form-select mb-3" name="classroom_id"  aria-label="Default select example">
                                <option selected>Выбрать кабинет</option>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label for="number" class="form-label">Учитель</label>
                            <select class="form-select mb-3" name="user_id"  aria-label="Default select example">
                                <option selected>Выбрать учителя</option>
                                @foreach ($users as $user)
                                    @if ($user->group_id === 3)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Добавить</button>
                    </form> --}}
                    @endif
                </div>
                {{-- @dd($scheduleItems) --}}
                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <table class="table-schedule table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th scope="col">День недели</th>
                                <th scope="col">№ урока</th>
                                <th scope="col">Предмет</th>
                                <th scope="col">Кабинет</th>
                                <th scope="col">Учитель</th>
                                <th scope="col">Класс</th>
                                <th scope="col">Редактировать/Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scheduleItems as $schedule)
                                <tr>
                                    <form action="">
                                        <th scope="row">{{ $schedule->date_of_week }}</th>
                                        <th>{{ $schedule->callingSchedule->label }}</th>
                                        <td>{{ $schedule->item->nameItem}}<br>
                                            {{$schedule->callingSchedule->start_time}}-{{$schedule->callingSchedule->end_time}}
                                        </td>
                                        <td>{{ $schedule->classroom->number ?? NULL }}</td>
                                        <td>
                                            {{ $schedule->teacher->nameTeacher ?? NULL }}
                                        </td>
                                        <td>{{ $schedule->schoolClass->number_class }}-{{ $schedule->schoolClass->class_code }}</td>
                                        <td>
                                            {{-- modal btn --}}
                                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{$schedule->id}}">Редактировать</button>
                                            <form action="{{ route('delete.schedule', ['schedule' => $schedule->id]) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
                                            {{-- modal --}}
                                            <div class="modal fade" id="exampleModal{{$schedule->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$schedule->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel{{$schedule->id}}">Изменить расписание</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('update.schedule', ['schedule' => $schedule->id]) }}" method="post">
                                                                @csrf
                                                                <label class="form-label">День недели</label>
                                                                <select class="form-select mb-3" name="date_of_week"  aria-label="Default select example">
                                                                    <option value="{{ $schedule->date_of_week }}" selected>{{ $schedule->date_of_week }}</option>
                                                                    <option value="Понедельник">Понедельник</option>
                                                                    <option value="Вторник">Вторник</option>
                                                                    <option value="Среда">Среда</option>
                                                                    <option value="Четверг">Четверг</option>
                                                                    <option value="Пятница">Пятница</option>
                                                                </select>
                                                                <label class="form-label">Урок</label>
                                                                <select class="form-select mb-3" name="callingSchedule_id"  aria-label="Default select example">
                                                                    <option value="{{ $schedule->callingSchedule->id }}" selected>{{ $schedule->callingSchedule->label }}</option>
                                                                    @foreach ($schedules as $schedule)
                                                                        <option value="{{ $schedule->id }}">{{ $schedule->label }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label class="form-label">Кабинет</label>
                                                                <select class="form-select mb-3" name="classRoom_id"  aria-label="Default select example">
                                                                    @foreach ($classrooms as $classroom)
                                                                        <option value="{{ $classroom->id }}">{{ $classroom->name_class }} - {{ $classroom->number }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label class="form-label">Предмет</label>
                                                                <select class="form-select mb-3" name="item_id"  aria-label="Default select example">
                                                                    @foreach ($items as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->nameItem }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label class="form-label">Преподаватель</label>
                                                                <select class="form-select mb-3" name="teacher_id"  aria-label="Default select example">
                                                                    @foreach ($teachers as $teacher)
                                                                        <option value="{{ $teacher->id }}">{{ $teacher->nameTeacher }} - {{ $teacher->item->nameItem }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label class="form-label">Класс</label>
                                                                <select class="form-select mb-3" name="schoolClass_id"  aria-label="Default select example">
                                                                    @foreach ($classes as $class)
                                                                        <option value="{{ $class->id }}">{{ $class->number_class }}-{{ $class->class_code }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <button type="submit" class="btn btn-outline-success">Обновить</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-call" role="tabpanel" aria-labelledby="pills-call-tab" tabindex="0">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th scope="col">№ урока</th>
                                <th scope="col">Начало урока</th>
                                <th scope="col">Конец урока</th>
                                <th scope="col">Перемена</th>
                                <th scope="col">Продолжительность</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <form action="{{ route('update.call', ['call' => $schedule->id]) }}" method="POST">
                                        @csrf
                                        <th scope="row">
                                            <input class="update-class__input" name="label" type="text" value="{{ $schedule->label }}">
                                        </th>
                                        <td>
                                            <input class="update-class__input" name="start_time" type="text" value="{{ $schedule->start_time }}">
                                        </td>
                                        <td>
                                            <input class="update-class__input" name="end_time" type="text" value="{{ $schedule->end_time }}">
                                        </td>
                                        <td>
                                            <input class="update-class__input" name="break_time" type="text" value="{{ $schedule->break_time }}">
                                        </td>
                                        <td>
                                            <input class="update-class__input" name="duration" type="text" value="{{ $schedule->duration }}">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-info">Редактировать</button>
                                        </td>
                                        </form>
                                        <td>
                                            <form action="{{ route('delete.call', ['call' => $schedule->id]) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
                                        </td>
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (auth()->user()->group_id === config('app.user-group.admin'))
                        <div class="alert alert-info register-alert" role="alert">
                            Добавить расписание звонков
                        </div>
                        <form action="{{ route('add.call') }}" method="POST">
                            @csrf
                            <div class=" mb-3">
                                <label for="number_schedule" class="form-label">Номер урока</label>
                                <input type="text" class="form-control @error('label') is-invalid @enderror" name="label" placeholder="1 Урок" id="number_schedule">
                                @error('label')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <label for="start_time" class="form-label">Время начала урока</label>
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" placeholder="8:00" id="start_time">
                                @error('start_time')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <label for="end_time" class="form-label">Время конца урока</label>
                                <input type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" placeholder="10:00" id="end_time">
                                @error('end_time')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <label for="break_time" class="form-label">Длительность перемены</label>
                                <input type="time" class="form-control @error('break_time') is-invalid @enderror" name="break_time" placeholder="8:00" id="break_time">
                                @error('break_time')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Добавить</button>
                        </form>
                    @endif
                </div>
                <div class="tab-pane fade" id="pills-classroom" role="tabpanel" aria-labelledby="pills-classroom-tab" tabindex="0">
                    @if (auth()->user()->group_id === config('app.user-group.admin'))
                        <form action="{{ route('create.classroom') }}" novalidate method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="number" class="form-label">Номер кабинета</label>
                                <input type="number" class="form-control @error('number') is-invalid @enderror" placeholder="{{ old('number') }}" name="number" id="number" aria-describedby="emailHelp">
                                @error('number')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Название кабинета</label>
                                <input type="text" class="form-control @error('name_class') is-invalid @enderror" name="name_class" id="name">
                                @error('name_class')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="class_id" class="form-label">Выберети этаж на котором будет находится кабинет</label>
                                <select class="form-select mb-3" name="floor"  aria-label="Default select example">
                                    <option selected>Выбрать этаж</option>
                                    <option value="1 этаж">1 этаж</option>
                                    <option value="2 этаж">2 этаж</option>
                                    <option value="3 этаж">3 этаж</option>
                                    <option value="3 этаж">4 этаж</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="class_id" class="form-label">Выберети класса к которому будет принадлежать кабинет</label>
                                    <select class="form-select mb-3" name="class_id" id="class_id"  aria-label="Default select example">
                                        <option value="{{ NULL }}" selected>Выбрать класс</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->number_class }}-{{ $class->class_code }}</option>
                                            @endforeach
                                    </select>
                                @error('class_id')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Добавить кабинет</button>
                        </form>
                    @endif
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                @if (auth()->user()->group_id === config('app.user-group.student') || auth()->user()->group_id === config('app.user-group.teacher'))
                                    <th scope="col">№ кабинета</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Этаж</th>
                                @else
                                    <th scope="col">№ кабинета</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Этаж</th>
                                    <th scope="col">Класс</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classrooms as $classroom)
                                <tr>
                                    @if (auth()->user()->group_id === config('app.user-group.student') || auth()->user()->group_id === config('app.user-group.teacher'))
                                        <th scope="row">{{ $classroom->number }}</th>
                                        <td>{{ $classroom->name_class }}</td>
                                        <td>{{ $classroom->floor }}</td>
                                    @endif
                                    @if (auth()->user()->group_id === config('app.user-group.admin'))
                                        {{-- <td>
                                            <a href="{{ $classroom->id }}">
                                                <button type="button" class="btn btn-info" style="float: right">Редактировать</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ $classroom->id }}">
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" style="float: right">Удалить</button>
                                            </a>
                                        </td> --}}
                                        <form action="{{ route('update.classroom', ['classroom' => $classroom->id])  }}" method="POST">
                                            @csrf
                                            <td>
                                                <input class="update-class__input" type="text" name="number" value="{{ $classroom->number }}">
                                            </td>
                                            <td>
                                                <input class="update-class__input" type="text" name="name_class" value="{{ $classroom->name_class }}">
                                            </td>
                                            <td>
                                                <input class="update-class__input" type="text" name="floor" value="{{ $classroom->floor }}">
                                            </td>
                                            <td>
                                                <select class="form-select mb-3" name="class_id" id="class_id"  aria-label="Default select example">
                                                    <option selected>{{ $classroom->className->number_class ?? NULL }}{{ $classroom->className->class_code ?? NULL }}</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->number_class }}-{{ $class->class_code }}</option>
                                                        @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-info">Редактировать</button>
                                            </td>
                                        </form>
                                        <td>
                                            <form action="{{ route('destroy.classroom', ['classroom' => $classroom->id])  }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
{{-- @if (auth()->user()->group_id === config('app.user-group.admin'))
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right">Редактировать</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить кабинет № {{ $classroom->number }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('auth.login') }}" novalidate method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="login" class="form-label">Номер кабинета</label>
                        <input type="number" class="form-control @error('number') is-invalid @enderror" value="{{ $classroom->number }}" name="number" id="login" aria-describedby="emailHelp">
                        @error('number')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Название кабинета</label>
                        <input type="text" class="form-control @error('name_class') is-invalid @enderror" value="{{ old('name_class') ?? $classroom->name_class }}" name="name" id="password">
                        @error('name_class')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <select class="form-select mb-3" name="floor"  aria-label="Default select example">
                        <option selected>Выбрать этаж</option>
                        <option value="1 этаж">1 этаж</option>
                        <option value="2 этаж">2 этаж</option>
                        <option value="3 этаж">3 этаж</option>
                    </select>
                    <button type="submit" class="btn btn-success w-100">Изменить</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</td>
<td>
<button type="button" class="btn btn-danger me-1" data-bs-toggle="modal" data-bs-target="#deleteModal" style="float: right">Удалить</button>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Вы точно хотите удалить кабинет № {{ $classroom->id }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Да</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</td>
@endif --}}
