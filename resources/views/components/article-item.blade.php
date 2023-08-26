@if($data)
    <?php $key = isset($key) ? $key : \Carbon\Carbon::now() ?>
    @inject('article', 'App\Services\ArticlesService')
    <article class="@if($key > 0) mt-5 pt-5 border-top @endif">
        <div class="d-flex align-items-start">
            <div class="blog-entry-meta-label">
                <span class='date'>{{ $data->created_at->format('d') }}</span>
                <span class="year">{{ $data->created_at->format('M') }}</span>
            </div>
            <div class="blog-entry-meta-title">
                <h2 class="h4 blog-entry-title mb-0">
                    <a href="{{ url($data->shortcode) }}">{{ $data->title }}</a>
                </h2>
                <div class="d-flex align-items-center fs-sm">
                    @if ($data->platform)
                        <span class='fst-italic'>Posted by：</span>
                        <span>{{ $data->platform->name }}</span>
                        <span class="blog-entry-meta-divider"></span>
                    @endif
                    @if ($data->rate)
                        <span class='fst-italic'>Hot：</span>
                        <span class="text-primary">
                              {!! $article->rates($data->url, $data->rate) !!}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <a class="blog-entry-thumb mb-3 mt-1 position-relative" href="{{ url($data->shortcode) }}">
                <?php $thumb = $data->thumb ? asset($data->thumb) : "https://source.unsplash.com/featured/720x368?t=" . $key; ?>
            <img @if($key >= 2) class="lazy" data-src="{{ $thumb }}"
                 @else src="{{ $thumb }}" @endif alt="{{ $data->title }}"/>
        </a>
        <p class="fs-md">{{ $data->description }}</p>
        <div class="d-flex justify-content-end justify-content-sm-between align-content-center">
            @include('components.social', ['item' => $data])
            <a href="{{ url($data->shortcode) }}" class="btn btn-primary rounded-0">马上围观</a>
        </div>
    </article>
@endif
