<?php

namespace App\Http\Controllers;

use App\AdminReg;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request)) {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
             $admin_name = $request->admin_name;
             $admin_email = $request->admin_email;
             $admin_mobile = $request->admin_mobile;

            $data = AdminReg::where('name','LIKE','%'.$admin_name.'%')
                        ->where('email','LIKE','%'.$admin_email.'%')
                        ->where('mobile','LIKE','%'.$admin_mobile.'%')
                        ->paginate(10);
            $data = $data->appends(['name'=>$admin_name,'email'=>$admin_email,'mobile'=>$admin_mobile]);
            return view('admin.index',['data'=>$data,'odata'=>$request]);

        }
        else
        {
            $data = AdminReg::paginate(10);
            return view('admin.index',['data'=>$data]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');

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
          'admin_name'=>'required',
          'admin_email'=>'required',
          'admin_password'=>'required',
          'admin_mobile'=>'required',
        ]);
      
    $data = new AdminReg();        
    $data->name = $request->admin_name;
    $data->email = $request->admin_email;
    $data->password = bcrypt($request->admin_password);
    $data->mobile = $request->admin_mobile;
    $data->gender = $request->admin_gender;
     if ($request->hasFile('admin_profile')) {
            $data->profile = basename($request->admin_profile->store('public/'));
    }
    $data->description = $request->admin_description;
    $data->save();
    return redirect('/hadmin/');

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
        $data = AdminReg::find($id);
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        return view('admin.edit',['data'=>$data]);
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
          'name'=>'required',
          'password'=>'required',
          'mobile'=>'required',
          
        ]);
            // echo "<pre>";
            // print_r($request->toArray());
            // die;
        $data = AdminReg::find($id);
        $data->name = $request->name;
        $data->password = bcrypt($request->password);
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;
        if ($request->hasFile('admin_profile')) {
            Storage::disk('public')->delete($data->profile);

            $data->profile = basename($request->admin_profile->store('public/'));
        }
        $data->description = $request->admin_description;
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        $data->save();
        return redirect('/hadmin/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
    $data = AdminReg::find($id);
    Storage::disk('public')->delete($data->profile);
    $data->delete();
    return redirect('/hadmin');
    
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
                        $data = AdminReg::find($value);
                        $data->status = 1;
                        $data->save();
                    }
                    break;
                
                case 'Deactive':
                    foreach ($request->all_id as $key => $value) {
                        $data = AdminReg::find($value);
                        $data->status = 0;
                        $data->save();
                    }
                    break;
                case 'Delete':
                    foreach ($request->all_id as $key => $value) {
                        $data = AdminReg::find($value);
                        Storage::disk('public')->delete($data->admin_profile);
                        $data->delete();
                    }
                    break;
                        
            }

        }
        return redirect('hadmin');
    }
}
