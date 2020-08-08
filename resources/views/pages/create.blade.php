<div class="boxed  push-down-60">
    <div class="meta">
        <div class="row">
            <div class="col-xs-12  col-sm-10  col-sm-offset-1  col-md-8  col-md-offset-2">
                <div class="meta__container--without-image">
                    <div class="row">
                        <div class="col-xs-12  col-sm-8">
                            <div class="meta__info">
                                <span class="meta__date"><span class="glyphicon glyphicon-calendar"></span> &nbsp; {{ dateRu() }} г.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1  col-md-8  col-md-offset-2  push-down-60">
            <div class="post-content contact">
                <h1>Создание нового поста</h1>
                <form method="POST" action="{{ route('post.store') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="post_title">Название поста</label >
                            <input type="text" placeholder="Название" name="post_title" id="post_title" value="{{ old('post_title') }}">
                        </div>
                        <div class="col-xs-12">
                            <label for="fulltext">Текст поста</label>
                            <textarea rows="6" type="text" name="fulltext" id="fulltext" placeholder="Текст поста">{{ old('fulltext') }}</textarea>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="tags">
                                        <h6>Тэги</h6>
                                        <hr>
                                        @foreach($alltags as $tag)
                                            <label class="tags__label" for="{{ $tag->id }}">
                                                <input type="checkbox" name="checkedTags[]" value="{{ $tag->id }}" class="visually-hidden" id="{{ $tag->id }}">
                                                <span class="tags__link">{{ $tag->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button class="btn  btn-primary" name="action" value="save">Сохранить</button> <span class="contact__obligatory">Сохранить и перейти к статье</span><br/>
                            <button class="btn  btn-primary" name="action" value="apply">Применить</button> <span class="contact__obligatory">Сохранить и продолжить редактирование!</span><br/>
                            <a class="btn  btn-primary" href="{{ route('Mainpage') }}">Вернуться на главную</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-xs-12  col-sm-6">
                    <div class="social-icons">
                        <a href="#" class="social-icons__container"> <span class="zocial-facebook"></span> </a>
                        <a href="#" class="social-icons__container"> <span class="zocial-twitter"></span> </a>
                        <a href="#" class="social-icons__container"> <span class="zocial-email"></span> </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
