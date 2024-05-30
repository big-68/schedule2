@extends('templates.main')

@section('content')
    <div class="dashboard-support">
        <div class="container">
            <div class="alert alert-success" role="alert">
                Сообщение было успешно отправленно, с вами свяжутся.
            </div>
            <a href="{{ route('home') }}">
                <button type="submit"class="btn btn-outline-primary">
                    Врнуться на главную
                </button>
            </a>
        </div>
    </div>
@endsection
