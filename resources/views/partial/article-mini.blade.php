<div class="col-lg-6">
    <div class="card mb-4 box-shadow cursor-pointer">
        <a href="{{ route('article.view', ['slug' => $article->slug]) }}">
            <img class="card-img-top" src="https://via.placeholder.com/600x250/">
            <p class="text-dark">{{ $article->title }}</p>
            <p class="text-secondary">{{ $article->description }}</p>
        </a>
    </div>
</div>
