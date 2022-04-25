<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Logsheet;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class LogsheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request) ) 
        {
            // echo "<pre>";
            // print_r($request->toArray());
            // die;
          
            $site = Site::all();
            $site_name = $request->site_id;
            $operator_name = $request->operator_name;
            $client_name = $request->client_name;
            $machine_status = $request->machine_status;

            $data = Logsheet::where('site_id','LIKE','%'.$site_name.'%')
                        ->where('operator_name','LIKE','%'.$operator_name.'%')
                        ->where('client_name','LIKE','%'.$client_name.'%')->where('machine_status','LIKE','%'.$machine_status.'%')
                        ->paginate(30);
            
            $data = $data->appends(['site_id'=>$site_name,'operator_name'=>$operator_name,'client_name'=>$client_name,'machine_status'=>$machine_status]);
                     
            return view('logsheet.index',['data'=>$data,'odata'=>$request,'site'=>$site]);

        }
        else
        {
          // echo "string";die;
            $data = Logsheet::selectRaw('logsheets.*,sites.site_name')
                    ->join('sites','sites.site_id','=','logsheets.site_id')
                    ->paginate(30);
            return view('logsheet.index',['data'=>$data]);
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sitedata = Site::where('status','=','1')->get();
        // echo "<pre>";
        // print_r($sitedata->toArray());
        // die;
        return view('logsheet.create',['sitedata'=>$sitedata]);
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
        
        // $time = new Carbon(date('H:i:s', strtotime($data->starting_time)));
        // $shift_end_time =new Carbon(date('H:i:s', strtotime($data->ending_time)));
        // $diff_in_minutes = $time->diffInSeconds($shift_end_time);
        // $total_time =  gmdate("H:i:s", $diff_in_minutes);
        // $data->total_time = $total_time;
        $startingtime= $request->starting_time[0]." ".$request->starting_time[1];
        $endingtime= $request->ending_time[0]." ".$request->ending_time[1];
        $stimestamp = strtotime("$startingtime");
        $etimestamp = strtotime("$endingtime");
        $totaltime = $etimestamp - $stimestamp;
        $uptime = abs(($etimestamp)-($stimestamp));
        $days = (int)($uptime/86400); 
        $rdays = ($uptime-($days*86400)); 
        $hours = (int)($rdays/3600);
        $rhours = ($rdays-($hours*3600));
        $minutes = (int)($rhours/60); 
        $total= $days."days ".$hours."hours ".$minutes."minute";
        $data->total_time = $total;
        $data->starting_time  = implode(',',$request->starting_time);
        $data->ending_time  = implode(',',$request->ending_time);

        // $data->starting_time  = strtotime("$startingtime");
        // $data->ending_time  = strtotime("$endingtime");
        $data->diesel  = $request->diesel;
      
      if ($_FILES["logsheet_photo"]["error"] == 0) {
          $tmp_name = $_FILES["logsheet_photo"]["tmp_name"];
          $name = time()."_".$_FILES["logsheet_photo"]["name"];
          $uploads_dir = "../public/logsheets";
          move_uploaded_file($tmp_name, "$uploads_dir/$name");
        $data->logsheet_photo = $name;
      }

        

      // if ($request->hasFile('logsheet_photo')) {
      //   $data->logsheet_photo = basename($request->logsheet_photo->store('/public'));
      //     // Storage::disk('local')->put($request->logsheet_photo,'vinit');
      // }
        // print_r($data->toArray());
        // die;
        $data->save();
        return redirect('/logsheet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        return view('logsheet.edit',['data'=>$data,'site'=>$site]);
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
//             $data->starting_time  = implode(',',$request->starting_time);
//             $data->ending_time  = implode(',',$request->ending_time);
// $time = new Carbon(date('H:i:s', strtotime($data->starting_time)));
// $shift_end_time =new Carbon(date('H:i:s', strtotime($data->ending_time)));
// $diff_in_minutes = $time->diffInSeconds($shift_end_time);
// $total_time =  gmdate("H:i:s", $diff_in_minutes);
//         $data->total_time = $total_time;
        
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
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        //  if ($request->hasFile('logsheet_photo')) {
        //     Storage::disk('public')->delete($data->logsheet_photo);

        //     $data->logsheet_photo = basename($request->logsheet_photo->store('public/'));
        // }
       if ($_FILES["logsheet_photo"]["error"] == 0) {
          $tmp_name = $_FILES["logsheet_photo"]["tmp_name"];
          $name = time()."_".$_FILES["logsheet_photo"]["name"];
          $uploads_dir = "../public/logsheets";
          move_uploaded_file($tmp_name, "$uploads_dir/$name");
          
            $oldphoto = Logsheet::find($id);
            if (!empty($img = $oldphoto->logsheet_photo))
            {
              unlink(public_path("logsheets/").$data->logsheet_photo);
              $data->delete();
            }
      }
      $data->logsheet_photo = $name;
        $data->save();
        return redirect('logsheet');
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
        if(!empty($data->logsheet_photo))
        {
          unlink(public_path("logsheets/").$data->logsheet_photo);
        }
        $data->delete();

        return redirect('logsheet');

                
    }
    public function sub(Request $request)
    {
        $id = $request->siteid;
        $sitedata = Site::selectRaw('sites.*,operators.o_name')->join('operators','operators.id','=','sites.operator_name')->find($id);
        // echo "<pre>";
        // print_r($sitedata->toArray());
        // die;
    echo "<div class='".'form-group'."'>";
        echo "<label for='".'name'."'>Operator Name</label>";
            echo "<input type='".'text'."' name='operator_name' value='".$sitedata->o_name."' class='".'form-control'."'  readonly='".'readonly'."' > ";

    echo "</div>";


    echo "<div class='".'form-group'."'>";
        echo "<label for='".'name'."'>Client Name</label>";
            echo "<input type='".'text'."' name='client_name' value='".$sitedata->client_name."' class='".'form-control'."' readonly='".'readonly'."'> ";
            

    echo "</div>";


    echo "<div class='".'form-group'."'>";
        echo "<label for='".'name'."'>Contractor Name</label>";
            echo "<input type='".'text'."' name='contractor_name' value='".$sitedata->contractor_name."' class='".'form-control'."' readonly='".'readonly'."'> ";

    echo "</div>";
                        
    }

    public function date(Request $request)
    {

    
   echo  "<div class=".'form-group'.">";
        echo "<label for=".'exampleInputEmail1'.">Strting Time</label>";
            echo "</div>";
                  echo "<div class=".'col-sm-6'.">";
                        echo "<input type=".'date'." class=".'form-control'." name=".'starting_time[]'.">";
                  echo "</div>";
                  echo "<div class=".'col-sm-6'.">";
                        echo "<input type=".'time'." class=".'form-control'." name=".'starting_time[]'.">";
                  echo "</div>";
                   echo "<br>";
                  echo  "<br>";

                echo "<div class=".'form-group'.">";
                    echo "<label for=".'exampleInputEmail1'.">Ending Time</label>";
                echo "</div>";
                    echo "<div class=".'col-sm-6'.">";
                        echo "<input type=".'date'." class=".'form-control'." name=".'ending_time[]'.">";
                  echo "</div>";
                  echo "<div class=".'col-sm-6'.">";
                        echo "<input type=".'time'." class=".'form-control'." name=".'ending_time[]'.">";
                  echo "</div>";
                   echo "<br>";
                   
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
        return redirect('logsheet');
    }

 public function model(Request $request)
    {

        $id =  $request->pro_id;
        $data = Logsheet::find($id);
        $img = array();
        
        // foreach ($data as $key => $value) {
            if ($data->logsheet_id == $id) {
            $img = $data->logsheet_photo;
            $aa = $data->machine_status;
        }


    // }
    // foreach ($img['logsheet_photo'] as $key => $value) {
        // echo  <img src="{{asset('logsheets/'.$value->logsheet_photo)}}"    class="img-rounded" width="100">
        
        // echo "<img src='".'{{asset('.'logsheets/'.$img."'>";
        echo "<img src='".'public/logsheets/'.$img."'>";
        // echo "<p>".$aa."</p>";
        return $img;
    // }
   
    }
}
