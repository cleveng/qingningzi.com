<!-- Advertising space for rent-->
<div class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
    <div class="masonry-grid-item">
        @livewire('item-promotion', ['type' => 5, 'limit' => 1, 'showTitle' => true])
        <div class="d-none card border text-center">
            <div class="card-body">
                <h5 class="mb-2">广告位招租</h5>
                <p class="fs-sm text-muted">列表、文章页位置统招</p>
                <a class="btn btn-primary btn-shadow rounded-0 btn-sm" href="mailto:{{ env('MAIL_MONITOR') }}">马上联系</a>
            </div>
        </div>
    </div>
</div>
