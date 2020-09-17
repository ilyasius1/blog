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
                <h1 class="visually-hidden">Страница редактирования</h1>
                <form method="POST" action="{{ route('category.update', ['category' => $category->slug]) }}">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="category_name">Название категории</label >
                            <input type="text" placeholder="Название" name="category_name" id="category_name" value="{{ $category->name }}">
                        </div>
                        <div class="col-xs-12">
                            <button class="btn  btn-primary" name="action" value="apply">Применить</button><br/>
                            <a class="btn  btn-primary" href="{{ route('category.index') }}">Вернуться к списку</a><br/>
                            <a class="btn  btn-primary" href="{{ route('Mainpage') }}">Вернуться на главную</a>
                        </div>
                    </div>
                </form>
                <form method="post" action="{{ route('category.delete', $category->slug) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn  btn-primary">Удалить категорию</button><br/>
                </form>
            </div>
        </div>
    </div>
</div>
