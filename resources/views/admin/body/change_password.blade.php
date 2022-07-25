@extends('admin.admin_master')

@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        <form class="form-pill" method="POST" action="{{ route(password.update) }}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlPassword">Current Password</label>
                <input type="password" class="form-control" id="current_password" placeholder="Current Password" name="oldpassword">
                @error('oldpassword')
                <span class="test-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword">New Password</label>
                <input type="password" class="form-control" id="password" placeholder="New Password" name="password">
                @error('password')
                <span class="test-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
                @error('password_confirmation')
                <span class="test-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-default"> Save</button>
        </form>
    </div>
</div>

@endsection