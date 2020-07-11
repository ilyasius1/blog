<div class="col-xs-8 col-xs-offset-2 push-down-40">
    <div class="widget-author widget-register-form boxed">
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                <h2>добавить тэг</h2>
                <form class="form-horizontal" method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('ArticleAddTags', ['article' => $article->articleID, 'tag' => [1,2,3,5,6]]) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-4 control-label">тэг</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tag1" placeholder="TAG">
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Дабавь!</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-gray">Очистить</button>
                    </div>
                    </div>
                </form>
                <h2>Удалить тэг</h2>
                <form class="form-horizontal" method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('ArticleRemoveTags', ['article' => $article->articleID, 'tag' => [1,2,3,4]]) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-4 control-label">тэг</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tag1" placeholder="TAG">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Удоли!!!</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn btn-gray">Очистить</button>
                        </div>
                    </div>
                </form>
                <h2>Установить тэг</h2>
                <form class="form-horizontal" method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('ArticleSetTags', ['article' => $article->articleID]) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-4 control-label">тэг</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tag" placeholder="TAG">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Паставь!!!</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn btn-gray">Очистить</button>
                        </div>
                    </div>
                </form>
                <h2>Комментировать</h2>
                <form class="form-horizontal" method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('ArticleAddComment', ['article' => $article->articleID]) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Коммент</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="commenttext" placeholder="Комментарий">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Камент!!!</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn btn-gray">Очистить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
