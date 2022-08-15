@extends('admin.admin_master')

@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>User Profile Update</h2>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-body">
        <form class="form-pill" method="POST" action="{{ route('update.user.profile') }}">
            @csrf

            <div class="form-group">
                <label for="exampleFormControlPassword">User Name</label>
                <input type="text" class="form-control" name="name" value=" {{ $user['name'] }} ">
            </div>

            <div class="form-group">
                <label for="exampleFormControlPassword">User Email</label>
                <input type="email" class="form-control" name="email" value=" {{ $user['email'] }} ">
            </div>
           
            <button type="submit" class="btn btn-primary btn-default"> Update</button>
        </form>
    </div>
</div>

@endsection