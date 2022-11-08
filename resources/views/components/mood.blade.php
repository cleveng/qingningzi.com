<div class="rd-navbar-contact-info">
    @inject('mood', 'App\Services\MoodService')
    <p class="text-gray text-regular">
        {{$mood->random()->description}}
        <span class='text-light text-italic'>- {{$mood->random()->author}}</span>
    </p>
</div>
