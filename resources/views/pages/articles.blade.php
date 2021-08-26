@extends('base')

@section('title')
    @parent
@endsection()

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($articles as $article)
                @include('partial.article-mini', ['article' => $article])
            @endforeach
        </div>
        <div class="row @if (null === $articles->previousPageUrl() && null !== $articles->nextPageUrl()) justify-content-end @else justify-content-between @endif">
            @if (null !== $articles->previousPageUrl())
                <a class="col-2" href="{{ $articles->previousPageUrl() }}">Предыдущая страница</a>
            @endif

            @if (null !== $articles->nextPageUrl())
                <a class="col-2" href="{{ $articles->nextPageUrl() }}">Следующая страница</a>
            @endif
        </div>
    </div>
@endsection
