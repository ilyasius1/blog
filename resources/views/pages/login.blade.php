<div class="col-xs-8 col-xs-offset-2 push-down-40">
    <div class="widget-author widget-register-form boxed">
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                <h2>Вход в систему</h2>
                <form class="form-horizontal" method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('loginPost') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Адрес e-mail</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" placeholder="Ваш E-mail" value="{{ old('email') }}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-4 control-label">Пароль</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" placeholder="Пароль">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('is_confirmed') ? 'checked' : '' }}><span class="text-no-error">Запомнить меня</span>
                                </label>
                                @if ($errors->has('is_confirmed'))
                                    <br><br><span class="error-message">{{ $errors->first('is_confirmed') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Войти</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-gray">Очистить</button>
                    </div>
                    </div>
                    <div class="push-down-30">
                    Не зарегистрированы? <a href="{{ route('register') }}" style="cursor: pointer">Зарегистрироваться</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
