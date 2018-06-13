@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Sign In</h1>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input class="form-control" type="email" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Password"/>
                </div>
                <button class="btn btn-primary float-right" type="submit">Sign In</button>
            </form>
        </div>
    </div>
@endsection