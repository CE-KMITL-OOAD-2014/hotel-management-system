    <?php

    class GuestController extends BaseController {

    public function showGuest()
    {
        $user=User::find(Auth::id());
        //manager and staff with permission can view guest
        if( Authority::getCurrentUser()->hasRole('manager'))
            return View::make('guest.guest');
            
        elseif($user->permissions->view_guest==1)
            return View::make('guest.guest');
        //Somethings went wrong
        else
            return Redirect::back()->with('success', 'Access Denied');
    }


    public function showCreateGuest($hotel_id)
    {
        $user=User::find(Auth::id());
        //manager and staff with permission can create guest
        if(Authority::getCurrentUser()->hasRole('manager') )
            return View::make('guest.create_guest')
            ->with('hotel_id',$hotel_id);

        elseif($user->permissions->manage_guest==1)
            return View::make('guest.create_guest')
            ->with('hotel_id',$hotel_id);
        // Something went wrong.
        else
            return Redirect::back()->with('success', 'Access Denied');
    }


    public function postCreateGuest($hotel_id)
    {
        $userdata = array(
            'gender' => Input::get('gender'),
            'nationality'=> Input::get('nationality'),
            'name' => Input::get('name'),
            'lastname' => Input::get('lastname'),
            'dateOfBirth' => Input::get('dateOfBirth'),
            'address' => Input::get('address'),
            'tel' => Input::get('tel'),
            'passportNo'=> Input::get('passportNo'),
            'citizenCardNo'=>Input::get('citizenCardNo'),
            );
        $rules = array(
            'gender'=>'Required',
            'nationality'=>'Required',
            'name' => 'Required',
            'lastname' =>'Required',
            'dateOfBirth'=>'Required',
            'address' =>  'Required',
            'tel' =>  'Required',
            'passportNo' => 'Required',
            'citizenCardNo' => 'Required',

            );
        $validator = Validator::make($userdata, $rules);
        if ($validator->passes())
        {
            // Create guest in database
            $new_guest =  guest::create($userdata);

            //Attatch new guest to hotel
            $hotel = hotel::find($hotel_id);
            $hotel->guests()->attach($new_guest);

            // Redirect to home with success message
            return Redirect::to('guest')->with('success', 'You have successfully create guest');
        }
        else
        // Something went wrong.
            return Redirect::back()->withErrors($validator)->withInput(Input::except('fail'));
    }
    public function showEditGuest($hotel_id,$guest_id)
    {
        $user=User::find(Auth::id());
        //manager and staff with permission can edit guest
        if(Authority::getCurrentUser()->hasRole('manager') )
        {
        return View::make('guest.edit_guest')
        ->with('guest_id',guest::find($guest_id))
        ->with('hotel_id',hotel::find($hotel_id));
        }

        elseif($user->permissions->manage_guest==1){
        return View::make('guest.edit_guest')
        ->with('guest_id',guest::find($guest_id))
        ->with('hotel_id',hotel::find($hotel_id));
        }
        //Something went wrong
        else
             return Redirect::back()->with('success', 'Access Denied');
    }

    public function postEditGuest($hotel_id,$guest_id)
    {
     $guest = guest::find($guest_id);
     $userdata = array(
        'gender' => Input::get('gender'),
        'nationality'=> Input::get('nationality'),
        'name' => Input::get('name'),
        'lastname' => Input::get('lastname'),
        'dateOfBirth' => Input::get('dateOfBirth'),
        'address' => Input::get('address'),
        'tel' => Input::get('tel'),
        'passportNo'=> Input::get('passportNo'),
        'citizenCardNo'=>Input::get('citizenCardNo'),
        );
     $rules = array(
        'gender'=>'Required',
        'nationality'=>'Required',
        'name' => 'Required',
        'lastname' =>'Required',
        'dateOfBirth'=>'Required',
        'address' =>  'Required',
        'tel' =>  'Required',
        'passportNo' => 'Required',
        'citizenCardNo' => 'Required',
        );
     $validator = Validator::make($userdata, $rules);
     //replace old value with input
     if ($validator->passes())
     {
        $guest->gender = Input::get('gender');
        $guest->nationality = Input::get('nationality');
        $guest->name = Input::get('name');
        $guest->lastname = Input::get('lastname');
        $guest->dateOfBirth = Input::get('dateOfBirth');
        $guest->address = Input::get('address');
        $guest->tel = Input::get('tel');
        $guest->passportNo = Input::get('passportNo');
        $guest->citizenCardNo = Input::get('citizenCardNo');
        $guest->save();

        return Redirect::to('guest')->with('success', 'You have successfully edit '.$guest->name.' guest.');
    }
    //Something went wrong
    else
        return Redirect::back()->withErrors($validator)->withInput(Input::except('fail'));
    }

    public function deleteGuest($hotel_id,$guest_id)
    {
        //only manager can use delete guest
     if( Authority::getCurrentUser()->hasRole('manager') )
     { 
            $hotel = Hotel::find($hotel_id);
            $guest = Guest::find($guest_id);
            $hotel->guests()->detach($guest);
            $guest->delete();

            return Redirect::to('guest')->with('success', 'You delete : '.$guest->name.' from '.$hotel->name );
        }
        //Something went wrong
        else  return Redirect::to('guest')->with('success', 'access deny' );
    }
}
