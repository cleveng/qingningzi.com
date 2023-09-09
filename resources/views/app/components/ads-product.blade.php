@inject('site', 'App\Services\SitesService')
@inject('prom', 'App\Services\PromotionsService')

<!-- Adverts-->
@php
    $random = $site->ads_enabled() ? $prom->random() : null;
@endphp
@if($random)
    <div class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
        <h3 class="widget-title">精选产品</h3>
        @foreach ($random as $key => $m)
            <a href="{{ url('/redirect?target_id=' . $m->id) }}" rel="nofollow"
               target="_blank"
               class="card @if ($key > 0) mt-3 @endif">
                <img alt="{{ $m->title }}" data-src="{{ url($m->cover_image) }}"
                     class="lazy card-img">
            </a>
        @endforeach
    </div>
@endif
