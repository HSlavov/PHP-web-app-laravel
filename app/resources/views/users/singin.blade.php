@extends('shop.layout')

@section ('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-md-4 col-md-offset-4" >
            <h1>Sing In</h1>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)))
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('users.singin') }}" method="POST">

                <div class="form-group">
                    <label for="name">email</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div  class="form-group" >
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <button type='submit' class='btn btn-primary'>Sing In</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection