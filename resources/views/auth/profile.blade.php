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
                        <div class="col-xs-12  col-sm-4">Ваш профиль</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1  col-md-8  col-md-offset-2  push-down-60">
            <div class="post-content contact">
                <h1 class="visually-hidden">Профиль</h1>
                @isset($profile->avatar)
                <img class="wp-post-image" src="{{ $profile->avatar ?? '' }}" alt="Avatar" width="50%" height="auto">
                @endisset
                <div class="row">
                    <div class="widget-categories">
                        <ul><li><a href="#"> {{ $user->username }}</a></li></ul>
                        <span class="widget-categories__text">    {{ $user->username }}</span>
                    </div>
                    <div class="col-xs-12">{{ $profile->fullname ?? ''}}</div>
                    <div class="col-xs-12"></div>
                </div>
                <form method="POST" action="{{ route('cabinet.profile.update') }}">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="username">Имя пользователя</label >
                            <input type="text" placeholder="Имя пользователя" name="username" id="username" value="{{ $user->username }}">
                        </div>
                        <div class="col-xs-12">
                            <label for="fullname">Имя</label >
                            <input type="text" placeholder="Имя" name="fullname" id="fullname" value="{{ $profile->fullname ?? ''}}">
                        </div>
                        <div class="col-xs-12">
                            <label for="phone">Телефон</label >
                            <input type="text" placeholder="Телефон" name="phone" id="phone" value="+{{ $profile->phone ?? ''}}">
                        </div>
                        <div class="col-xs-12">
                            <label for="birthdate">Дата рождения</label >
                            <style>
                                ::-webkit-calendar-picker-indicator {
                                    position: relative;
                                    display: block;
                                    color: transparent;

                                    opacity: 0;
                                    /*background: url(//www.gravatar.com/avatar/cbfaff96665b7567defe1b34a883d..) no-repeat center;*/
                                    background-size: contain;
                                }
                                ::-webkit-calendar-picker-indicator::after {
                                    content: "\e109";
                                    position: absolute;
                                    display: block;
                                    width: 20px;
                                    height: 20px;
                                    /*background-color: #000000;*/
                                    background: url(//www.gravatar.com/avatar/cbfaff96665b7567defe1b34a883d..) no-repeat center;
                                }
                            </style>

                            <input type="date" class="glyphicon-calendar" name="birthdate" id="birthdate" value="{{ $profile->birthdate ?? '' }}" min="1917-10-25" max="{{ date('Y-m-d') }}">
                            <span class="meta__date"><span class="glyphicon glyphicon-calendar"></span>
                            <div class="meta__info">

                                <input type="date" value="{{ $profile->birthdate }}">
                                <span class="meta__date"><span class="glyphicon glyphicon-calendar"></span> &nbsp; {{ dateRu($profile->birthdate) }} г.</span>
                            </div>
                        </div>
                        <button class="btn  btn-primary" name="action" value="save">Сохранить</button><br/>
                        <button class="btn  btn-primary" name="action" value="apply">Применить</button><br/>
                        <a class="btn  btn-primary" href="{{ route('cabinet.profile.show') }}">Вернуться к статье</a>
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
