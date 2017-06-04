@extends('layout')

@section ('content')

    @include('layouts.nav')
    <div class="content-wrapper py-3">

        <div class="card-header">
            <H4>Edit user:  [{{ $users->id }}]{{ $users->name }}  </H4>
        </div>
        <!-- /.row -->
        <div class="card-block">
            <div class="col-lg-6">
                <form role="form" method="POST" action="/users/{{$users->id}}/">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" id="name" name="name"  required value="{{ $users->name}}">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" id="password" name="password" required  >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" id="email" name="email" required value="{{ $users->email}}">
                    </div>
                    <button type="submit" class="btn btn-lg btn-success">Submit Button</button>
                    <button type="reset" class="btn btn-lg btn-danger">Reset Button</button>
                </form>
            </div>
        </div>

    </div>
@endsection