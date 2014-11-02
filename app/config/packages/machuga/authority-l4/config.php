<?php

return array(

        'initialize' => function($authority) {
            $user = $authority->getCurrentUser();

            //action aliases
            $authority->addAlias('manage', array('create', 'read', 'update', 'delete'));
            $authority->addAlias('moderate', array('read', 'update', 'delete'));


        // If a user doesn't have any roles, we don't have to give him permissions so we can stop right here.
        if(count($user->roles) == 0) return false;
        
            //an example using the `hasRole` function, see below examples for more details

            if($user->hasRole('admin')){
                $authority->allow('manage', 'all');
            }
            if($user->hasRole('manager')){
            	$authority->allow('manage','staff');
            }
            if($user->hasRole('member')){
                $authority->allow('join','hotel');
            }
        }
    );
