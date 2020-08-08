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
            <div class="post-content contact">
                <h1 class="visually-hidden">Страница редактирования</h1>
                <form method="POST" action="{{ route('post.update', ['post' => $post->slug]) }}">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="post_title">Название поста</label >
                            <input type="text" placeholder="Название" name="post_title" id="post_title" value="{{ $post->title }}">
                        </div>
                        <div class="col-xs-12">
                            <label for="fulltext">Текст поста</label>
                            <textarea style="height: 70vh" type="text" name="fulltext" id="fulltext" placeholder="Текст поста">{{ $post->fulltext }}</textarea>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="tags">
                                        <h6>Тэги</h6>
                                        <hr>
                                        @foreach($alltags as $tag)
                                            <label class="tags__label" for="{{ $tag->id }}">
                                                <input type="checkbox" {{ $tags->contains($tag) ? 'checked' : '' }} name="checkedTags[]" value="{{ $tag->id }}" class="visually-hidden" id="{{ $tag->id }}">
                                                <span class="tags__link">{{ $tag->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button class="btn  btn-primary" name="action" value="save">Сохранить</button> <span class="contact__obligatory">Сохранить и перейти к статье</span><br/>
                            <button class="btn  btn-primary" name="action" value="apply">Применить</button> <span class="contact__obligatory">Сохранить и продолжить редактирование!</span><br/>
                            <a class="btn  btn-primary" href="{{ route('post.show', $post->slug) }}">Вернуться к статье</a>
                        </div>
                    </div>
                </form>
                <form method="post" action="{{ route('post.delete', $post->slug) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn  btn-primary">Удалить статью</button> <span class="contact__obligatory">Удалить статью</span><br/>
                </form>
            </div>
{{--            @include('.parts.post-content')--}}
            <div class="row">
                <div class="col-xs-12  col-sm-6">
                    <div class="post-comments">
                        <a class="btn  btn-primary" href="#comments">Комментарии ({{ count($post->comments) }})</a>
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
