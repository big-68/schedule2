@extends('templates.main')

@section('content')
    <div class="items">
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-item-tab" data-bs-toggle="pill" data-bs-target="#pills-item" type="button" role="tab" aria-controls="pills-item" aria-selected="true">Предметы</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-teacher-tab" data-bs-toggle="pill" data-bs-target="#pills-teacher" type="button" role="tab" aria-controls="pills-teacher" aria-selected="false">Учителя</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-item" role="tabpanel" aria-labelledby="pills-item-tab">
                    <div class="items__title-item text-center">
                        Список предметов:
                    </div>
                    <table class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        @foreach ($items as $item)
                            <tbody>
                                <td>
                                    {{ $item->nameItem }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-3">
                                        <button type="submit" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$item->id}}">
                                            Обновить
                                        </button>
                                        <form action="{{ route('delete.item', ['item' => $item->id])  }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                        </form>
                                    </div>
                                </td>
                                <div class="modal fade modal-lg" id="staticBackdrop{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{$item->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel{{$item->id}}">Изменить предмет</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update.item', ['item' => $item->id]) }}" class="mt-5" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="item" class="form-label">Название предмета</label>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->nameItem }}" id="item">
                                                        @error('name')
                                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit"class="btn btn-outline-success mt-3">
                                                        Обновить
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        @endforeach
                        </table>
                        <div class="mt-5 alert alert-primary" role="alert">
                            Добавить новый предмет
                        </div>
                        <form  action="{{ route('add.item') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="items" class="form-label">Название предмета</label>
                                <input type="text" class="form-control @error('nameItem') is-invalid @enderror" name="nameItem" value="{{ old('nameItem') }}" id="items">
                                @error('nameItem')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit"class="btn btn-outline-success mt-3">
                                Добавить
                            </button>
                        </form>
                </div>
                <div class="tab-pane fade" id="pills-teacher" role="tabpanel" aria-labelledby="pills-teacher-tab">
                    <div class="items__title-item text-center">
                        Список учителей:
                    </div>
                    <table class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th scope="col">ФИО</th>
                                <th scope="col">Предмет</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        @foreach ($teachers as $teacher)
                        <tbody>
                                <td>
                                    {{ $teacher->nameTeacher }}
                                </td>
                                <td>
                                    {{ $teacher->item->nameItem }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-3">
                                        <button type="submit" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$teacher->id}}">
                                            Обновить
                                        </button>
                                        <form action="{{ route('delete.teacher', ['teacher' => $teacher->id])  }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                        </form>
                                    </div>
                                </td>
                                <div class="modal fade modal-lg" id="exampleModal{{$teacher->id}}" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel{{$teacher->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel{{$teacher->id}}">Изменить предмет</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update.item', ['item' => $item->id]) }}" class="mt-5" method="POST">
                                                    @csrf
                                                    Учитель:{{ $teacher->nameTeacher }}
                                                    <div class="mb-3">
                                                        <label for="item" class="form-label">Название предмета</label>
                                                        <select class="form-select" name="item_id" aria-label="Default select example">
                                                            <option value="{{ $teacher->item->id }}" selected>{{ $teacher->item->nameItem }}</option>
                                                            @foreach ($items as $item)
                                                                <option value="{{ $teacher->item->id }}">{{ $item->nameItem }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('name')
                                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit"class="btn btn-outline-success mt-3">
                                                        Обновить
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="mt-5 alert alert-primary" role="alert">
                            Добавить нового учителя
                        </div>
                        <form  action="{{ route('add.teacher') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nameTeacher" class="form-label">ФИО</label>
                                <input type="text" class="form-control @error('nameTeacher') is-invalid @enderror" name="nameTeacher" value="{{ old('nameTeacher') }}" id="nameTeacher">
                                @error('nameTeacher')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <label for="items" class="form-label">Предмет</label>
                                    <select class="form-select" name="item_id" aria-label="Default select example">
                                        <option selected></option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->nameItem }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit"class="btn btn-outline-success mt-3">
                                Добавить
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
