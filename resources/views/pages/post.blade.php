<div class="boxed  push-down-60">
    <div class="meta">
        @isset($post->image)
        <img class="wp-post-image" src="{{ $post->image }}" alt="Blog image" width="1138" height="493">
        @endisset
        <div class="row">
            <div class="col-xs-12  col-sm-10  col-sm-offset-1  col-md-8  col-md-offset-2">
                <div class="meta__container--without-image">
                    <div class="row">
                        <div class="col-xs-12  col-sm-8">
                            <div class="meta__info">
                                <span class="meta__date"><span class="glyphicon glyphicon-calendar"></span> &nbsp; {{ dateRu($post->created_at) }} г.</span>
                            </div>
                        </div>
                        <div class="col-xs-12  col-sm-4">
                            <a href="#comments">
                            <div class="comment-icon-counter-detail">
                                <span class="glyphicon glyphicon-comment comment-icon"></span>
                                <span class="comment-counter">{{ count($post->comments) }}</span>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-10  col-xs-offset-1  col-md-8  col-md-offset-2  push-down-60">

            @include('.parts.post-content')


            <div class="row">
                <div class="col-xs-12  col-sm-6">

                    <div class="post-comments">
                        <a class="btn  btn-primary" href="#comments">Комментарии ({{ count($post->comments) }})</a>
                        <a class="btn  btn-primary" href="{{ route('post.edit', $post->slug) }}">Редактировать</a>
                    </div>

                </div>
                <div class="col-xs-12  col-sm-6">

                    <div class="social-icons">
                        <a href="#" class="social-icons__container"> <span class="zocial-facebook"></span> </a>
                        <a href="#" class="social-icons__container"> <span class="zocial-twitter"></span> </a>
                        <a href="#" class="social-icons__container"> <span class="zocial-email"></span> </a>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="tags">
                        <h6>Тэги</h6>
                        <hr>
                        @foreach($post->tags as $tag)
                        <a href="#" class="tags__link">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="comments" id="comments">
                        <h6>Комментарии</h6>
                        <hr>
                        @foreach ($post->comments as $comment)
                            @include('parts.comment')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

