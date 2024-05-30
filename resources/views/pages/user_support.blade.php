@extends('templates.main')

@section('content')
    <div class="support">
        <div class="container">
            <div class="support__title">
                Поддержка
            </div>
            <div class="support__subtitle">
                Если у вас возникают вопросы, хотите оставить коментарий, или вы не довольны работай нашего сайта можете написать в службу поддержки и с вами свжутся.
            </div>
            <form class="mt-5 support-form" action="{{ route('support.store') }}" method="post">
                @csrf
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
                    <label for="description" class="form-label">Ваше сообщение</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Сообщение..." rows="5"></textarea>
                    @error('description')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit"class="btn btn-outline-primary">
                    Отправить
                </button>
            </form>
        </div>
    </div>
@endsection
