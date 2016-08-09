
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

@extends('layout')

@section('content')
<div class="bgcolor-white pt1em pb1em" id="contents">  <div id="main_cnt_wrapper">
  <div id="yjContentsBody">
    <div class="yjContainer">
      <div class="form_box">
        <h2>mooovi<span>パスワード再設定</span></h2>

        {{ Form::open(array('action' => 'Auth\PasswordController@reset', 'method' => 'post')) }}

          @if (count($errors) > 0)
            <div id="error_explanation">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          {{ Form::hidden('token', $token)}}

          <div class="label">
            {{ Form::label('email') }}
            {{ Form::email('email', '', ['placeholder' => 'メールアドレスを入力']) }}
          </div>
          <div class="label">
            {{ Form::label('password') }}
            {{ Form::password('password', ['placeholder' => 'パスワードを入力'])}}
          </div>
          <div class="label">
            {{ Form::label('password_confirmation') }}
            {{ Form::password('password_confirmation', ['placeholder' => 'パスワードを入力（確認）']) }}
          </div>
          <div class="actions">
            <div class="submit">{{ Form::submit('パスワードリセット', ['class' => 'btn btn--block']) }}</div>
          </div>
        {{ Form::close() }}

        <div class="more_link_box">
        <strong>まだアカウントを持っていませんか？</strong>
        <a href="/register">Sign Up</a>
        <a href="/login">Log in</a>
      </div>
    </div>
  </div>
</div>
@endsection
