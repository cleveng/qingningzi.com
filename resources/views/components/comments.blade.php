<!-- Comments-->
<div class="pt-2 mt-5" id="comments">
    <h2 class="h4">评论
        @if($data->comments_count > 0 )
            <span class="badge bg-secondary fs-sm text-body align-middle ms-2">{{$data->comments_count}}</span>
        @endif
    </h2>
    <!-- comment-->
    @inject('comm', 'App\Services\CommentsService')
    @forelse($comments as $key=>$comment)
        <div class="d-flex align-items-start py-4 border-bottom">
            <img class="rounded-circle" src="{{$comment->owner->profile_url}}" width="50"
                 alt="{$comment->owner->name}}">
            <div class="ps-3 w-100">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="fs-md mb-0">{{$comment->owner->name}}</h6>
                    {{--                    TODO: modal reply --}}
                    {{--                    <a class="nav-link-style fs-sm fw-medium" href="#">--}}
                    {{--                        <i class="ci-reply me-2"></i> Reply--}}
                    {{--                    </a>--}}
                </div>
                <p class="fs-md mb-1">{!! $comment->content !!}</p>
                <span class="fs-ms text-muted">
                <i class="ci-time align-middle me-2"></i>
                {{$comment->created_at->diffForHumans()}}
            </span>
                <!-- comment reply -->
                {{-- TODO: link see more comments--}}
                @foreach($comm->replies($comment->id) as $i=>$reply)
                    <div class="d-flex align-items-start border-top pt-4 mt-4">
                        <img class="rounded-circle" src="{{$reply->owner->profile_url}}" width="50"
                             alt="{{$reply->owner->name}}">
                        <div class="ps-3 w-100">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fs-md mb-0">{{$reply->owner->name}}</h6>
                            </div>
                            <p class="fs-md mb-1">{{$reply->content}}</p>
                            <span class="fs-ms text-muted">
                                <i class="ci-time align-middle me-2"></i>
                                {{$reply->created_at->diffForHumans()}}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        @unless(Auth::user())
            <div class="space-2 text-center">
                <a href="{{url('/login')}}">暂无评论，来抢占沙发吧!!!</a>
            </div>
        @endunless
    @endforelse

    <div>
        {{ $comments->render() }}
    </div>

    <!-- Post comment form-->
    @if(Auth::user())
        <div class="card border-0 shadow mt-5 mb-4">
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success mb-3" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="d-flex align-items-start">
                    <img class="rounded-circle" src="{{Auth::user()->profile_url}}" width="50"
                         alt="{{Auth::user()->name}}">
                    <form class="w-100 ms-3" action="{{ url('/comments?article_id='.$data->id) }}" method="POST">
                        @csrf
                        <div>
                            <textarea class="form-control" id="content" name="content" rows="4" placeholder="写点什么吧..."
                                      required></textarea>
                        </div>
                        @if ($errors->any())
                            @foreach ((array) $errors->all() as $key=>$error)
                                <div class="invalid-feedback d-block @if($key>0) mt-3 @endif" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit">发表评论</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @elseif($data->comments_count > 0 )
        <div class="space-2 text-center">
            <a href="{{url('/login')}}">评论需要登录帐户，前往登录!!!</a>
        </div>
    @endif
</div>
