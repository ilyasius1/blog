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
                        <div class="col-xs-12  col-sm-4">
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
                <form method="POST" action="{{ route('permission.update', ['permission' => $permission->slug]) }}">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="permission_name">Название привилегии</label >
                            <input type="text" placeholder="Название" name="permission_name" id="permission_name" value="{{ $permission->name }}">
                        </div>
                        <div class="col-xs-12">
                            <button class="btn  btn-primary" name="action" value="apply">Применить</button><br/>
                            <a class="btn  btn-primary" href="{{ route('permission.index') }}">Вернуться к списку</a><br/>
                            <a class="btn  btn-primary" href="{{ route('Mainpage') }}">Вернуться на главную</a>
                        </div>
                    </div>
                </form>
                <form method="post" action="{{ route('permission.delete', $permission->slug) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn  btn-primary">Удалить привилегию</button><br/>
                </form>
            </div>
        </div>
    </div>
</div>
