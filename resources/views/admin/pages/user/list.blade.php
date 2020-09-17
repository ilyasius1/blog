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
                <h1>Список пользователей</h1>
                <table class="table  table-hover">
                    <thead>
                    <tr class="su-even">
                        <th>ID</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Active</th>
                        <th>Deleted</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->username }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a class="btn  btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Редактировать</a><br/>
                                <form method="post" action="{{ route('admin.users.delete', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn  btn-primary">Удалить</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--                <a class="btn  btn-primary" href="{{ route('admin.users.create') }}">Создать еще одного</a><br/>--}}
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
