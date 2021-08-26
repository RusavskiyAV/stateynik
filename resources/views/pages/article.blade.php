@extends('base')

@section('title')
    @parent
@endsection()

@section('content')
    <div class="container">
         <h1>{{ $article->title }}</h1>
        <div>
            Теги:
            @foreach($article->tags as $tag)
                <a class="text-decoration-underline" href="#">{{ $tag->label }}</a>
            @endforeach
        </div>
        <img class="col-12" src="https://via.placeholder.com/1200x300/">
        <div class="mt-2">{{ $article->body }}</div>
        <div class="mt-2">
            <button id="likes" data-article="{{ $article->id }}">
                <i class="bi bi-heart"></i> <span>{{ $article->statistic->likes }}</span>
            </button>
            Просмотры: <span id="views">{{ $article->statistic->views }}</span>
        </div>
        <div class="mt-3">
            <form>
                <h5>Оставить комментарий</h5>
                <div class="form-group">
                    <label for="subject">Тема</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </div>
                <div class="form-group">
                    <label for="body">Текст</label>
                    <textarea class="form-control" id="body" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Отправить</button>
            </form>
        </div>
        <div id="successmessage" class="mt-3" style="display: none">
            <p>Ваше сообщение успешно отправлено</p>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ mix('/js/statistic.js') }}"></script>
@endsection()
