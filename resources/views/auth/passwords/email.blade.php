@extends('layout')

@section('content')
<div class="bgcolor-white pt1em pb1em" id="contents">  <div id="main_cnt_wrapper">
  <div id="yjContentsBody">
    <div class="yjContainer">
      <div class="form_box">
        <h2>mooovi<span>パスワード再設定</span></h2>

        {{ Form::open(array('action' => 'Auth\PasswordController@sendResetLinkEmail', 'method' => 'post')) }}

          @if (count($errors) > 0)
            <div id="error_explanation">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="label">
            {{ Form::label('email') }}
            {{ Form::email('email', '', ['placeholder' => 'メールアドレスを入力']) }}
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

