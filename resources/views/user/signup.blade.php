@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <h1>Sign Up</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('register') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input class="form-control" type="email" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Password"/>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"/>
            </div>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input class="form-control" type="text" id="firstName" name="firstName" placeholder="First Name"/>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input class="form-control" type="text" id="surname" name="surname" placeholder="Surname"/>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input class="form-control" type="date" id="dob" name="dob" placeholder="Date of Birth"/>
            </div>
            <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="gender" value=1 class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Male</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="gender" value=0 class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Female</label>
            </div>
            </div>
            <button class="btn btn-primary float-right" type="submit">Sign Up</button>
        </form>
    </div>
</div>
@endsection