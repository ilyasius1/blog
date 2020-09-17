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
                <h1>Создание новой привилегии</h1>
                <form method="POST" action="{{ route('permission.store') }}">
                    {{ csrf_field() }}
                    <div class="row">
{{--                        <div class="col-xs-12">--}}
{{--                            <label for="permission_name">Название привилегии</label >--}}
{{--                            <input type="text" placeholder="Название" name="permission_name" id="permission_name" value="{{ old('permission_name') }}">--}}
{{--                            @error('permission_name')--}}
{{--                            <span class="error-message">{{ $errors->first('permission_name') }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-4 control-label">Название привилегии <span class="req-field">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" placeholder="Название пермиссии" value="{{ old('name') }}">
                                @error('name')
                                <span class="error-message">{{ $errors->first('name') ?? 'name' }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <button class="btn  btn-primary">Создать</button> <span class="contact__obligatory">Сохранить</span><br/>
                            <a class="btn  btn-primary" href="{{ route('permission.index') }}">Вернуться к списку</a><br/>
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
