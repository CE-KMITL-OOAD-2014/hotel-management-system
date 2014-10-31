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

        $user = new User;
        $user->name = 'Nathakit';
        $user->lastname = 'Praisuwanna';
        $user->username = 'nathakit';
        $user->password = Hash::make('password');
        $user->email = 'nathakit@hotel.com';
        $user->save();
        $user->roles()->attach(3);


        $user = new User;
        $user->name = 'Nattanon';
        $user->lastname = 'Rungparsert';
        $user->username = 'nattanon';
        $user->password = Hash::make('password');
        $user->email = 'nattanon@hotel.com';
        $user->save();
        $user->roles()->attach(3);

                $user = new User;
        $user->name = 'Membername';
        $user->lastname = 'Memberlastname';
        $user->username = 'member';
        $user->password = Hash::make('password');
        $user->email = 'member@hotel.com';
        $user->save();
        $user->roles()->attach(2);
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