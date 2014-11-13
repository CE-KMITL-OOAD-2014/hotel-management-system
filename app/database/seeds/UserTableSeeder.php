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
        $user->name = 'Test101';
        $user->lastname = 'Test101';
        $user->username = 'test101';
        $user->password = Hash::make('password');
        $user->email = 'test101@hotel.com';
        $user->role = 'manager';
        $user->save();


        $user = new User;
        $user->name = 'Test102';
        $user->lastname = 'Test102';
        $user->username = 'test102';
        $user->password = Hash::make('password');
        $user->email = 'test102@hotel.com';
        $user->role = 'member';
        $user->save();
       

        $user = new User;
        $user->name = 'Nathakit';
        $user->lastname = 'Praisuwanna';
        $user->username = 'nathakit';
        $user->password = Hash::make('password');
        $user->email = 'nathakit@hotel.com';
        $user->role = 'manager';
        $user->save();
     


        $user = new User;
        $user->name = 'Nattanon';
        $user->lastname = 'Rungparsert';
        $user->username = 'nattanon';
        $user->password = Hash::make('password');
        $user->email = 'nattanon@hotel.com';
        $user->role = 'manager';
        $user->save();


        $user = new User;
        $user->name = 'Membername';
        $user->lastname = 'Memberlastname';
        $user->username = 'member';
        $user->password = Hash::make('password');
        $user->email = 'member@hotel.com';
        $user->role = 'member';
        $user->save();

    }
}