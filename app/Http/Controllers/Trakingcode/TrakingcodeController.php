<?php

namespace App\Http\Controllers\Trakingcode;
use Config;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Trakingcode;
use App\Traking_Daily_Data;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
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


 public function Trakingcode_view(Request $request)
    {  

        $Arrtrakingdata = DB::table('trakingcodes')
                    ->leftjoin('traking__daily__datas', 'trakingcodes.id', '=', 'traking__daily__datas.trakingcodes_id')
                    ->select('trakingcodes.trakingcode','trakingcodes.id as tid','traking__daily__datas.*')->get();
      	
        return view('trakingform.trakingform', compact('Arrtrakingdata'
                                                       ));
    }




public function Traking_Daily_Data(Request $request,$trakingcode,$id) {

    // Try to retrieve saved data from the cache
    //$json_data = get_transient('my_unique_identifier');

    // If no saved data exists in the cache
        //echo $trakingcode;
        // Fetch new data from remote URL
        $url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol='.$trakingcode.'&apikey=demo';
        $json = file_get_contents($url);
        $json_data = json_decode($json, True);
       //dd($json_data);
        // Save the data in the cache, let it live for up to 1 hour (3600 seconds)
        //set_transient('my_unique_identifier', $json_data, 3600);
        
        if(isset($json_data["Error Message"]) && !empty($json_data["Error Message"]) ) {  
        $response = array(
            'status' => 'Error',
            'msg' => 'Traking product code not match',
        );
        return Response::json($response);  // <<<<<<<<< see this line
           }else{
        $today = date("Y-m-d",time());
        $array = $json_data["Time Series (Daily)"];
	$array = array_values($array)[0];
        $Traking_Daily_Data = new Traking_Daily_Data();
        $Traking_Daily_Data->open = $array['1. open'];
        $Traking_Daily_Data->high = $array['2. high'];
        $Traking_Daily_Data->low = $array['3. low'];
        $Traking_Daily_Data->close = $array['4. close'];
        $Traking_Daily_Data->volume = $array['5. volume'];
        $Traking_Daily_Data->datetime = $today;
        $Traking_Daily_Data->trakingcodes_id = $id;
        $Traking_Daily_Data->save();

         return Redirect::to('/')->send();
        }
       
    }

}



   

