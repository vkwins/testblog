<?php

namespace App\Http\Controllers\Trakingcode;
use Config;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Trakingcode;
//use Illuminate\Http\Response;
use Response;
class TrakingcodeController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Trakingcode Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles requesting users for the application and
    | redirecting them to your Trakingcode form submit screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    /**
     * Create a new controller instance.
     *
     * @return void
     */



    public function Trakingcode_Submited(Request $request)
    {  
      	
        $Trakingcode = new Trakingcode();
        $Trakingcode->trakingcode = $request->tracked_code;
        $Trakingcode->save(); 
      
       $response = array(
            'status' => 'success',
            'msg' => 'Submit your  message successfully',
        );
        return Response::json($response);  // <<<<<<<<< see this line
    }
   
}
