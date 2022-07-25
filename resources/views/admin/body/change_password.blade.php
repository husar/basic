@extends('admin.admin_master')

@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        <form class="form-pill">
            <div class="form-group">
                <label for="exampleFormControlPassword">Current Password</label>
                <input type="password" class="form-control" id="exampleFormControlPassword" placeholder="Current Password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword">New Password</label>
                <input type="password" class="form-control" id="exampleFormControlPassword" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword">Confirm Password</label>
                <input type="password" class="form-control" id="exampleFormControlPassword" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary btn-default"> Save</button>
        </form>
    </div>
</div>

@endsection