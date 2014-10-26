<?php
class RoleTableSeeder extends Seeder {

    public function run()
    {
        // to use non Eloquent-functions we need to unguard
        Eloquent::unguard();

        // All existing roles are deleted !!!
        DB::table('roles')->delete();

        // add role using Eloquent
        $role = new Role;
        $role->name = 'admin';
        $role->save();

        $role = new Role;
        $role->name = 'member';
        $role->save();

        $role = new Role;
        $role->name = 'manager';
        $role->save();

        $role = new Role;
        $role->name = 'staff';
        $role->save(); 

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