@extends('base')

@section('title')
    @parent
@endsection()

@section('content')
    <div class="container">
        <div class="row">
            @if (!empty($articles))
                <h3>Последние добавленные статьи</h3>
            @endif
            @foreach ($articles as $article)
                @include('partial.article-mini', ['article' => $article])
            @endforeach
        </div>
    </div>
@endsection
