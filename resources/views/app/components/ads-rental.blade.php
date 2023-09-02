@inject('site', 'App\Services\SitesService')

<!-- Advertising space for rent-->
@if($site->ads_enabled())
    <div class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
        <div class="masonry-grid-item">
            <div class="card border text-center">
                <div class="card-body">
                    <h5 class="mb-2">广告位招租</h5>
                    <p class="fs-sm text-muted">列表、文章页位置统招</p>
                    <a class="btn btn-primary btn-shadow rounded-0 btn-sm"
                       href="mailto:{{env('MAIL_MONITOR')}}">马上联系</a>
                </div>
            </div>
        </div>
    </div>
@endif
