@extends('master')
@section('content')
    <div class="container custom-login">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form action="/sign_up" method="POST">
                    <div class="form-group">
                        @csrf
                        <label>User Name</label>
                        <input class="form-control" type="text" name="name" id="email_id" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input class="form-control" type="email" name="email" id="email_id" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" id="password_id" placeholder="Password">
                    </div>
                    <div style="float: right">
                        <button type="submit" class="btn btn-success">Sign up</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
