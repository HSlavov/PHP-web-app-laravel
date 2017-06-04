<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder {

    public function run() {
        $role_user = Role::where('name', 'User')->first();
        $role_admin = Role::where('name', 'Admin')->first();
        $role_author = Role::where('name', 'Author')->first();


        $user = new User();
        $user->name = 'Balboa';
        $user->last_name = 'Visitor';
        $user->email = 'visitor@test.com';
        $user->password = bcrypt('visitor');
        $user->save();
        $user->role()->attach($role_user);

        $admin = new User();
        $admin->name = 'John';
        $admin->last_name = 'Admin';
        $admin->email = 'admin@test.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->role()->attach($role_admin);


        $author = new User();
        $author->name = 'Anna';
        $author->last_name = 'Author';
        $author->email = 'author@example.com';
        $author->password = bcrypt('author');
        $author->save();
        $author->role()->attach($role_author);

    }
}