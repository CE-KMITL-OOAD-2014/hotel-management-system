<?php
class StatusroomsTableSeeder extends Seeder {

    public function run()
    {
        // to use non Eloquent-functions we need to unguard
        Eloquent::unguard();

        // All existing roles are deleted !!!
        DB::table('statusrooms')->delete();

        // add role using Eloquent
        $status = new Statusroom;
        $status->name = 'Empty';
        $status->save();

        $status = new Statusroom;
        $status->name = 'Occupied';
        $status->save();

        $status = new Statusroom;
        $status->name = 'Reserved';
        $status->save();

        $status = new Statusroom;
        $status->name = 'Maintenance';
        $status->save(); 

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