<?php

namespace App\Http\Controllers;

use App\AdminReg;
use App\Operator;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use DateTime;


class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           if (empty($request)) {
        echo "string";
        die;
             $name = $request->operator_name;
             $email = $request->operator_email;
             $mobile = $request->operator_mobile;

            $data = Operator::selectRaw('operators.*,admins.name')
                    ->join('admins','admins.id','=','operators.id')
                    ->where('o_name','LIKE','%'.$name.'%')
                    ->where('email','LIKE','%'.$email.'%')
                    ->where('mobile','LIKE','%'.$mobile.'%')
                    ->paginate(3);
            $data = $data->appends(['o_name'=>$name,'email'=>$email,'mobile'=>$mobile]);
            return view('operator.index',['data'=>$data,'odata'=>$request]);

        }
        else
        {
            $data = Operator::selectRaw('operators.*,admins.name')
                    ->join('admins','admins.id','=','operators.admin_id')
                    ->paginate(30);
                        // echo "<pre>";
                        // print_r($data->toArray());
                        // die;

            return view('operator.index',['data'=>$data]);
        }


       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = AdminReg::where('status','=','1')->get();
        return view('operator.create',['admin'=>$admin]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->Validate($request,
        [
          'admin_id'=>'required|not_in : -1',
          'operator_name'=>'required',
          'operator_email'=>'required',
          'operator_mobile'=>'required',
          'operator_password'=>'required',
        ]);
        
     // echo "<pre>";
     // print_r($request->toArray());
     // die;
    $data = new Operator();
    $data->admin_id = $request->admin_id;
    $data->o_name = $request->operator_name;
    $data->email = $request->operator_email;
    $data->password = bcrypt($request->operator_password);
    $data->mobile = $request->operator_mobile;
    $data->address = $request->operator_address;
    $data->joining_date = $request->joining_date;
    $data->licence_number = $request->operator_licence;
    
    $data->save();
     // echo "<pre>";
     // print_r($data->toArray());
     // die;
    return redirect('/operator');
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
        $data = Operator::selectRaw('operators.*,admins.name')->join('admins','admins.id','=','operators.admin_id')->find($id);
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        return view('operator.edit',['data'=>$data]);
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
          'operator_name'=>'required',
          'operator_mobile'=>'required',
          'operator_password'=>'required',
        ]);
       
            // echo "<pre>";
            // print_r($request->toArray());
            // die;
        $data = Operator::find($id);
        $data->o_name = $request->operator_name;
        $data->password = bcrypt($request->operator_password);
        $data->mobile = $request->operator_mobile;
        $data->address = $request->operator_address;
        $data->joining_date = $request->joining_date;
        $data->licence_number = $request->licence_number;
    

        // if ($request->hasFile('operator_profile')) {
        //     Storage::disk('public')->delete($data->operator_profile);

        //     $data->operator_profile = basename($request->operator_profile->store('public/'));
        // }   
        // if ($request->hasFile('operator_licence')) {
        //         $data->operator_licence = basename($request->operator_licence->store('public/'));
        // }   

        $data->save();
        return redirect('operator');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Operator::find($id);
        Storage::disk('public')->delete($data->operator_profile);
        Storage::disk('public')->delete($data->operator_licence);
        $data->delete();
        return redirect('/operator');
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
                        $now = new DateTime();
                        $data = Operator::find($value);
                        $data->active_at = date("Y-m-d ", time());
                        $data->status = 1;
                        $data->save();
                    }
                    break;
                
                case 'Deactive':
                    foreach ($request->all_id as $key => $value) {
                        $data = Operator::find($value);
                        $data->active_at = "Deactive";
                        $data->status = 0;
                        $data->save();
                    }
                    break;
                case 'Delete':
                    foreach ($request->all_id as $key => $value) {

                    $data = Operator::find($value);
                    Storage::disk('public')->delete($data->operator_profile);
                    Storage::disk('public')->delete($data->operator_licence);
                    $data->delete();
                    }
                    break;
                   
            }
        }
        return redirect('/operator');
    }
}
