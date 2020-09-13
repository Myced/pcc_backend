@extends('layouts.main')

@section('title')
    User Details
@endsection

@section('content')
<div class="container-fluid">

    @include('includes.alert')

    <div class="row clearfix">
        <div class="col-md-12">
            <a href="{{ route('users') }}" class="btn btn-primary waves-effect">
                <i class="material-icons">keyboard_backspace</i>
                <strong>Go Back</strong>
            </a>
        </div>
    </div>

    <br>
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-3">
            <div class="card profile-card">
                <div class="profile-header">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                        <img src="{{ \App\User::DEFAULT_AVATAR }}" alt="Profile Image" />
                    </div>
                    <div class="content-area">
                        <h3>{{ $user->name }}</h3>
                        <p> </p>
                        <p>
                            @if($user->level == \App\User::USER_LEVEL_ADMIN)
                                {{ "Administrator" }}
                            @else 
                                {{ "Client" }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="profile-footer">
                    <ul>
                        <li>
                            <span>
                                <i class="material-icons">phone</i>
                            </span>
                            <span>{{ $user->tel }}</span>
                        </li>
                        <li>
                            <span>
                                <i class="material-icons">mail</i>
                            </span>
                            <span>{{ $user->email }}</span>
                        </li>
                        <li>
                            <span>
                                <i class="material-icons">person_add</i>
                            </span>
                            <span>{{ $user->created_at->format('j, M Y') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-9">
            <div class="card">
                <div class="body">
                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" 
                                    data-toggle="tab">
                                    Home
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#profile_settings" aria-controls="settings" 
                                    role="tab" data-toggle="tab">
                                    Profile Settings
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#change_password_settings" aria-controls="settings" 
                                    role="tab" data-toggle="tab">
                                    Change Password
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <div class="row">

                                    <div class="col-md-12">
                                        <h3 class="">
                                            User Purchases
                                        </h3>
                                    </div>

                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="table-responsive">
                                            <table class="table table-hover dashboard-task-infos">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Client</th>
                                                        <th>Telephone</th>
                                                        <th>Item</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count = 1;
                                                    @endphp
                
                                                    @foreach ( $user->purchases as $purchase)
                                                        <tr>
                                                            <td>
                                                                {{ $count++ }}
                                                            </td>
                                                            <td>
                                                                {{ $purchase->customer_name }}
                                                            </td>
                                                            <td>
                                                                {{ $purchase->customer_tel }}
                                                            </td>
                                                            <td>
                                                                <span class="label bg-blue">
                                                                    {{ $purchase->item_name }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                {{ $purchase->amount }}
                                                            </td>
                                                            <td>
                                                                {{ $purchase->created_at->format('j, M Y') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                <form class="form-horizontal" 
                                    action="{{ route('user.info.update', ['id' => $user->id]) }}"
                                    method="POST">

                                    @csrf

                                    <div class="form-group">
                                        <label for="NameSurname" class="col-sm-2 control-label">Full Name:</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="name" name="name" 
                                                    placeholder="Full Name" 
                                                    value="{{ $user->name }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Title:</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="title" name="title" 
                                                    placeholder="E.g. The Moderator" 
                                                    value="{{ $user->title }}" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Email" class="col-sm-2 control-label">Email:</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="email" class="form-control" id="Email" 
                                                    name="email" placeholder="Email" 
                                                    value="{{ $user->email }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="telephone" class="col-sm-2 control-label">Telephone: </label>

                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="tel" required
                                                    value="{{ $user->tel }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Update Information</button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>

                            <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                <form class="form-horizontal" action="{{ route('user.password.update', ['id' => $user->id]) }}"
                                    id="updatePassword" onsubmit="verifyPasswords(event)" method="POST">
                                    
                                    @csrf

                                    <div class="form-group">
                                        <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="password" 
                                                    name="password" placeholder="New Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="password_confirmation" 
                                                    name="password_confirmation" placeholder="New Password (Confirm)" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-danger">Update Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function verifyPasswords(event)
    {
        //get the passwords. 
        password = document.getElementById('password').value;
        password_confirmation = document.getElementById('password_confirmation').value;

        console.log(password, password_confirmation);

        if(password !== password_confirmation)
        {
            alert("The passwords do not match");
            event.preventDefault();
        }
        
    }
</script>
@endsection