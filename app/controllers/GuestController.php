    <?php

class GuestController extends BaseController {

    public function showGuest()
    {
        $user=User::find(Auth::id());
        if( Authority::getCurrentUser()->hasRole('manager'))
             return View::make('guest.guest');
        elseif($user->permissions->view_guest==1)
            return View::make('guest.guest');
        else
        return Redirect::to('hotel')->with('success', 'Access Denied');
    }


    public function showCreateGuest($id)
    {
        $user=User::find(Auth::id());
        if(Authority::getCurrentUser()->hasRole('manager') )
                return View::make('guest.create_guest',array('hotel_id'=>$id));
        elseif($user->permissions->manage_guest==1)
                return View::make('guest.create_guest',array('hotel_id'=>$id));
        else
        return Redirect::to('hotel')->with('success', 'Access Denied');
    }
 

    public function postCreateGuest($id)
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
            $hotel = hotel::find($id);
            $hotel->guests()->attach($new_guest);

            // Redirect to home with success message
            return Redirect::to('guest')->with('success', 'You have successfully create guest');
        }
        else
        // Something went wrong.
        return Redirect::to('create_guest/'.$id)->withErrors($validator)->withInput(Input::except('fail'));
        }
    public function showEditGuest($id){
        return View::make('guest.edit_guest')
        ->with('guest',guest::find($id));
    }
    public function postEditGuest($id){
       $guest = guest::find($id);
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
        if ($validator->passes()){
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
        else
            return Redirect::to('edit_guest/'.$guest->id)->withErrors($validator)->withInput(Input::except('fail'));
    }
}
