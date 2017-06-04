@extends('layout')

@section ('content')

    @include('layouts.nav')
    <div class="content-wrapper py-3">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Web App</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <!-- Tables Card -->

            <div class="card-header">
                <i class="fa fa-table"></i> Users
            </div>
            <div class="card-block">

                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>User</th>
                            <th>Author</th>
                            <th>Admin</th>
                            <th>Date Add</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>User</th>
                            <th>Author</th>
                            <th>Admin</th>
                            <th>Date Add</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach($users as $user)
                            <form method="POST" action=" ">
                                <tr>
                                    <td>{{$user->id }}</td>
                                    <td>{{$user->name }}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                                    <td><input type="checkbox" {{ $user->hasRole('Author') ? 'checked' : '' }} name="role_author"></td>
                                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                                    <td>{{$user->created_at}}</td>
                                    {{ csrf_field() }}
                                    <td>
                                        <a style="width:80px" class="btn btn-primary btn-lg" href="/admin/#/postAdminAssignRoles" > Assign Roles</a>
                                        <a style="width:60px" class="btn btn-lg btn-success" href="/admin/{{$user->id}}/edit" > Update</a>
                                        <a style="width:60px" type="submit" class="btn btn-lg btn-danger" href="/admin/{{$user->id}}" >Delete</a>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <a class="btn btn-lg btn-warning" href="/admin/create">Add User</a></div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection