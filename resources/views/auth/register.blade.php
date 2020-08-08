<div class="col-xs-8 col-xs-offset-2 push-down-40">
    <div class="widget-author widget-register-form boxed">
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                <h2>Регистрация</h2>
                <p>Поля, отмеченные звездочкой, являются <strong>обязательными</strong> для заполнения.</p>

                <form class="form-horizontal" method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Во время заполнения формы возникли ошибки!</strong><br>
                            Пожалуйста, исправьте их для завершения регистрации.
                            @foreach($errors as $error)
                                {{ debug($error) }}
                            @endforeach
                            {{ debug($errors) }}
                        </div>
                    @endif

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-sm-4 control-label">Адрес e-mail <span class="req-field">*</span></label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" placeholder="user@domain.ru" value="{{ old('email') }}">
{{--                            @if ($errors->has('email'))--}}
                            @error('email')
                                <span class="error-message">{{ $errors->first('email') }}</span>
                            @enderror
{{--                            @endif--}}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-sm-4 control-label">Ваш пароль <span class="req-field">*</span></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Придумайте пароль">
                            @if ($errors->has('password'))
                                <span class="error-message">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password2') ? ' has-error' : ''}}">
                        <label class="col-sm-4 control-label">Подтверждение пароля <span class="req-field">*</span></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password" value="{{ old('password2') }}" placeholder="Пароль еще раз">
                            @if ($errors->has('password2'))
                                <span class="error-message">{{ $errors->first('password2') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label class="col-sm-4 control-label">Имя или никнейм <span class="req-field">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" placeholder="Иван Иванов" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                                <span class="error-message">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="col-sm-4 control-label">Мобильный телефон</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="register_phone" name="phone" placeholder="+7 (999) 123-4567" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="error-message">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('is_confirmed') ? ' has-error' : '' }}">
                        <div class="col-sm-offset-4 col-sm-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_confirmed" {{ old('is_confirmed') ? 'checked' : '' }}><span class="text-no-error">Согласен на хранение и обработку персональных данных</span>
                                </label>
                                @if ($errors->has('is_confirmed'))
                                    <br><br><span class="error-message">{{ $errors->first('is_confirmed') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn btn-gray">Очистить</button>
                        </div>
                    </div>
                    <div class="push-down-30">
                        Уже зарегистрированы? <a href="{{ route('login') }}" style="cursor: pointer">Войти</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
