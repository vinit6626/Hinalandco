<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Logsheet;
use Carbon\Carbon;


class OperatorlogsheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $site = Site::all();
            
          $data = Logsheet::selectRaw('logsheets.*,sites.site_name')
                    ->join('sites','sites.site_id','=','logsheets.site_id')
                    ->paginate(30);

            // echo "<pre>";
            // print_r($data->toArray());
            // die;
            return view('operator_logsheet.index',['data'=>$data,'site'=>$site]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sitedata = Site::where('status','=','1')->get();
       
        return view('operator_logsheet.create',['sitedata'=>$sitedata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // print_r($_FILES);
        // die;
        $this->Validate($request,
        [
          'site_id'=>'required|not_in : -1',
          'machine_status'=>'required',
          'logsheet_photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);
       
        $data =  new Logsheet();
        $data->site_id  = $request->site_id;
        $data->operator_name  = $request->operator_name;
        $data->client_name  = $request->client_name;
        $data->contractor_name  = $request->contractor_name;
        $data->machine_status  = $request->machine_status;
        $data->starting_time  = implode(',',$request->starting_time);
        $data->ending_time  = implode(',',$request->ending_time);

// $time = new Carbon(date('H:i:s', strtotime($data->starting_time)));
// $shift_end_time =new Carbon(date('H:i:s', strtotime($data->ending_time)));
// $diff_in_minutes = $time->diffInSeconds($shift_end_time);
// $total_time =  gmdate("H:i:s", $diff_in_minutes);

//         $data->total_time = $total_time;
        if(!empty($request->starting_time)){

        $startingtime= $request->starting_time[0]." ".$request->starting_time[1];
        $endingtime= $request->ending_time[0]." ".$request->ending_time[1];
        
        $stimestamp = strtotime("$startingtime");
        $etimestamp = strtotime("$endingtime");

        $totaltime = $etimestamp - $stimestamp;
        $uptime = abs(($etimestamp)-($stimestamp));

        $days = (int)($uptime/86400); //1day = 86400seconds
        $rdays = ($uptime-($days*86400)); 
        //seconds remaining after uptime was converted into days
        $hours = (int)($rdays/3600);//1hour = 3600seconds,converting remaining seconds into hours
        $rhours = ($rdays-($hours*3600));
        //seconds remaining after $rdays was converted into hours
        $minutes = (int)($rhours/60); // 1minute = 60seconds, converting remaining seconds into minutes
        $total= $days."days ".$hours."hours ".$minutes."minute";
        $data->total_time = $total;
 
        $data->starting_time  = implode(',',$request->starting_time);
        $data->ending_time  = implode(',',$request->ending_time);
       
        }
        $data->diesel  = $request->diesel;

        if(!empty($request->starting_time)){
        
        $startingtime= $request->starting_time[0]." ".$request->starting_time[1];
        $endingtime= $request->ending_time[0]." ".$request->ending_time[1];
        
        $stimestamp = strtotime("$startingtime");
        $etimestamp = strtotime("$endingtime");

        $totaltime = $etimestamp - $stimestamp;
        $uptime = abs(($etimestamp)-($stimestamp));

        $days = (int)($uptime/86400); //1day = 86400seconds
        $rdays = ($uptime-($days*86400)); 
        //seconds remaining after uptime was converted into days
        $hours = (int)($rdays/3600);//1hour = 3600seconds,converting remaining seconds into hours
        $rhours = ($rdays-($hours*3600));
        //seconds remaining after $rdays was converted into hours
        $minutes = (int)($rhours/60); // 1minute = 60seconds, converting remaining seconds into minutes
        $total= $days."days ".$hours."hours ".$minutes."minute";
        $data->total_time = $total;
 
        $data->starting_time  = implode(',',$request->starting_time);
        $data->ending_time  = implode(',',$request->ending_time);
       
        }

        if ($_FILES["logsheet_photo"]["error"] == 0) {
          $tmp_name = $_FILES["logsheet_photo"]["tmp_name"];
          $name = time()."_".$_FILES["logsheet_photo"]["name"];
          $uploads_dir = "../public/logsheets";
          move_uploaded_file($tmp_name, "$uploads_dir/$name");
          $data->logsheet_photo  = $name;

        }

        // if ($request->hasFile('logsheet_photo')) {
        //         $data->logsheet_photo = basename($request->logsheet_photo->store('public/logsheet_photo'));
        // }

        // print_r($data->toArray());
        // die;
        $data->save();
        return redirect('ty');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $data = Logsheet::find($id);
        $site = Site::all();
            // echo "<pre>";
            // print_r($site->toArray());
            // die;    

        return view('operator_logsheet.edit',['data'=>$data,'site'=>$site]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         $this->Validate($request,
        [
          'site_id'=>'required|not_in : -1',
          'machine_status'=>'required',
        ]);
      
        $data = Logsheet::find($id);
        $data->site_id  = $request->site_id;
        $data->operator_name  = $request->operator_name;
        $data->client_name  = $request->client_name;
        $data->contractor_name  = $request->contractor_name;
        $data->machine_status  = $request->machine_status;
        if(!empty($request->starting_time)){
            $data->starting_time  = implode(',',$request->starting_time);
            $data->ending_time  = implode(',',$request->ending_time);
$time = new Carbon(date('H:i:s', strtotime($data->starting_time)));
$shift_end_time =new Carbon(date('H:i:s', strtotime($data->ending_time)));
$diff_in_minutes = $time->diffInSeconds($shift_end_time);
$total_time =  gmdate("H:i:s", $diff_in_minutes);
        $data->total_time = $total_time;
        }



        $data->diesel  = $request->diesel;
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
         if ($request->hasFile('logsheet_photo')) {
            Storage::disk('public')->delete($data->logsheet_photo);

            $data->logsheet_photo = basename($request->logsheet_photo->store('public/'));
        }
       
        // print_r($data->toArray());
        // die;
        $data->save();
        return redirect('ologsheet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Logsheet::find($id);
        unlink(public_path("storage/logsheet/").$data->logsheet_photo);
        $data->delete();
        return redirect('ologsheet');

    }
    public function ty()
    {
        return view('operator_logsheet.ty');
    }
    public function status(Request $request)
    {
            // echo "<pre>";
            // print_r($request->toArray());
            // die;
        if (!empty($request->all_id)) {
            switch ($request->Action) {
                case 'Active':
                    foreach ($request->all_id as $key => $value) {
                        $data = Logsheet::find($value);
                        $data->status = 1;
                        $data->save();
                    }
                    break;
                
                case 'Deactive':
                    foreach ($request->all_id as $key => $value) {
                        $data = Logsheet::find($value);
                        $data->status = 0;
                        $data->save();
                    }
                    break;
                case 'Delete':
                    foreach ($request->all_id as $key => $value) {
                        $data = Logsheet::find($value);
                        Storage::disk('public')->delete($data->logsheet_photo);
                        $data->delete();
                    }
                    break;
                        
            }

        }
        return redirect('ologsheet');
    }

}
