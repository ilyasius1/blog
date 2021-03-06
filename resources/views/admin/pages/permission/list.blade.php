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
                <h1>Список привилегий</h1>
                <table class="table  table-hover">
                    <thead>
                    <tr class="su-even">
                        <th>ID</th>
                        <th>Slug</th>
                        <th>Name</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->slug }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->created_at }}</td>
                            <td>
                                <a class="btn  btn-primary" href="{{ route('permission.edit', $permission->slug) }}">Редактировать</a><br/>
                                <form method="post" action="{{ route('permission.delete', $permission->slug) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn  btn-primary">Удалить</button>
                                </form>
                            </td>
{{--                            <a class="btn  btn-primary" href="{{ route('permission.delete', $permission->slug) }}">Удалить!</a><br/>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a class="btn  btn-primary" href="{{ route('permission.create') }}">Создать еще одну</a><br/>
                <a class="btn  btn-primary" href="{{ route('admin.main.index') }}">Вернуться на главную админскую</a>
                <a class="btn  btn-primary" href="{{ route('Mainpage') }}">Вернуться на главную</a>
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
