<div class="rd-navbar-mood">
    @inject('mood', 'App\Services\MoodService')
    <p class="text-gray fs-sm mb-0">
        {{$mood->random()->description}}
        <span class='text-muted fst-italic'>- {{$mood->random()->author}}</span>
    </p>
</div>
