<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        // to use non Eloquent-functions we need to unguard
        Eloquent::unguard();

        // All existing users are deleted !!!
        DB::table('users')->delete();

        // add user using Eloquent
        $user = new User;
        $user->name = 'admin_name';
        $user->lastname = 'admin_lastname';
        $user->username = 'admin';
        $user->password = Hash::make('password');
        $user->email = 'admin@hotel.com';
        $user->save();

        $user->roles()->attach(1);

        // alternativ to eloquent we can also use direct database-methods
        /*
        User::create(array(
            'username'  => 'admin',
            'password'  => Hash::make('password'),
            'email'     => 'admin@localhost'
        ));
        */
    }
}