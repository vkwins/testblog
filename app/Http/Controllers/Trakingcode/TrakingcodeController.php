<?php

namespace App\Http\Controllers\Trakingcode;
use Config;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Trakingcode;
use App\Traking_Daily_Data;
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

public function Traking_Daily_Data() {

    // Try to retrieve saved data from the cache
    //$json_data = get_transient('my_unique_identifier');

    // If no saved data exists in the cache
    
        // Fetch new data from remote URL
        $url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=MSFT&apikey=demo';
        $json = file_get_contents($url);
        $json_data = json_decode($json, True);
        //dd($json_data);
        // Save the data in the cache, let it live for up to 1 hour (3600 seconds)
        //set_transient('my_unique_identifier', $json_data, 3600);
   
         $today = date("Y-m-d",time());


    foreach ( $json_data['Time Series (Daily)'] as  $key=>$value) {
        //print_r($key);
        if($key=='2017-07-14'){

        $Traking_Daily_Data = new Traking_Daily_Data();
        $Traking_Daily_Data->open = $value['1. open'];
        $Traking_Daily_Data->high = $value['2. high'];
        $Traking_Daily_Data->low = $value['3. low'];
        $Traking_Daily_Data->close = $value['4. close'];
        $Traking_Daily_Data->volume = $value['5. volume'];
        $Traking_Daily_Data->datetime = $today;
        $Traking_Daily_Data->save();

        $response = array(
            'status' => 'success',
            'msg' => 'Submit your  Data successfully',
        );
        return Response::json($response);  // <<<<<<<<< see this line
        
        }
    }

}



   
}
