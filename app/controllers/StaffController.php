    <?php

class StaffController extends BaseController {

	public function showStaff()
	{

		return View::make('staff.staff');
         
	}


	public function showRequest()
	{
		return View::make('request.request');

	}

	

    

}
