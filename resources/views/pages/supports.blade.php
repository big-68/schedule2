@extends('templates.main')

@section('content')
    <div class="container">
        <div class="support-admin">
            <div class="support__title">
                Заявки пользователей
            </div>
            <table class="table mt-5">
                <thead>
                    <th scope="col">Email</th>
                    <th scope="col">Сообщение</th>
                    <th scope="col">Действия</th>
                </thead>
                @foreach ($supports as $support)
                    <tbody>
                        <td>
                            {{ $support->email }}
                        </td>
                        <td>
                            {{ substr($support->description, 0, 55) . '...' }}
                        </td>
                        <td>
                            {{-- button modal --}}
                            <button type="submit" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$support->id}}">
                                Ответить
                            </button>
                            {{-- modal --}}
                            <div class="modal fade modal-lg" id="staticBackdrop{{$support->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{$support->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel{{$support->id}}">Сообщение от пользователя</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Сообщение:{{ $support->description }}
                                            <form action="{{ route('support.answer', ['support' => $support->id]) }}" class="mt-5" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Ответить на электроную почту</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="student@example.com" value="{{ $support->email }}" id="email">
                                                    @error('email')
                                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Ваше сообщение</label>
                                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Сообщение..." rows="5"></textarea>
                                                    @error('description')
                                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <button type="submit"class="btn btn-outline-success mt-3">
                                                        Отправить
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
