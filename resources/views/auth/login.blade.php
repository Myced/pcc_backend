@extends('layouts.auth')

@section('title')
    {{ "Login" }}
@endsection

@section('content')
<div class="card">
    <div class="body">
        <form id="sign_in" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="msg">
                <h2>Login</h2>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">person</i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="email" placeholder="Email" 
                    required autofocus autocomplete="off">
                </div>
                @error('email')
                    <label id="username-error" class="error" for="email">
                        {{ $message }}
                    </label>
                @enderror
            </div>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">lock</i>
                </span>
                <div class="form-line">
                    <input type="password" class="form-control" name="password" placeholder="Password" 
                    required autocomplete="off">
                </div>
                @error('password')
                    <label id="username-error" class="error" for="username">
                        {{ $message }}
                    </label>
                @enderror
            </div>

            <div class="row">
                <div class="col-xs-8 p-t-5">
                    <input type="checkbox" name="remember_me" id="rememberme" class="filled-in chk-col-pink">
                    <label for="rememberme">Remember Me</label>
                </div>
                <div class="col-xs-4">
                    <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                </div>
            </div>
            <div class="row m-t-15 m-b--20">
                <div class="col-xs-6">
                    
                </div>
                <div class="col-xs-6 align-right">
                    <a href="javascript:void(0)">Forgot Password?</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
