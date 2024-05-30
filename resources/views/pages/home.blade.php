@extends('templates.main')

@section('content')
    <div class="home">
        <div class="container">
            <div class="home__title">
                Расписание.ru предлагает простое и интуитивно понятное онлайн-расписание, которое поможет вам всегда быть в курсе текущих и предстоящих занятий.
            </div>
        </div>
        <div class="home__title home__sub-title">
            Что мы предлагаем
        </div>
        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="storage/images/Carousel/carousel-1.jpg" class="d-block" alt="...">
                    <div class="carousel-caption d-md-block">
                    <h5>Актуальное расписание</h5>
                    <p>Мы постоянно обновляем информацию о занятиях, чтобы вы всегда были в курсе текущего расписания и изменений.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="storage/images/Carousel/carousel-2.jpg" class="d-block" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h5>Удобство использования</h5>
                        <p>Наш веб-сайт разработан с учетом удобства пользователей. Вы легко найдете нужную информацию и сможете оперативно ознакомиться с расписанием.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="storage/images/Carousel/carousel-4.jpg" class="d-block" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h5>Полезные ресурсы</h5>
                        <p>В дополнение к расписанию занятий мы предоставляем полезные материалы, связанные с вашим образованием и учебными программами.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
