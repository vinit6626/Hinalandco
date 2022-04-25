<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use DB;
class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Equipment::orderBy('position','asc')->paginate(20);
        // $data = DB::table('equipments')->orderBy('position','asc')-> paginate(20);
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        
        return view('equipment.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipment.create');
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
          'equipment_name'=>'required',
          'equipment_model'=>'required',
          'total_equipment'=>'required|integer',
          'position'=>'required|integer',
        ]);
       
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $data = new Equipment();
        $data->equipment_name = $request->equipment_name;
        $data->equipment_model = $request->equipment_model;
        $data->total_equipment = $request->total_equipment; 
        $data->position = $request->position;
        $data->save();
        return redirect('equipment/');
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
        $data = Equipment::find($id);
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        return view('equipment.edit',['data'=>$data]);
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
        // echo "$id";
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $this->Validate($request,
        [
          'equipment_name'=>'required',
          'equipment_model'=>'required',
          'total_equipment'=>'required|integer',
          'position'=>'required|integer',
        ]);
       
        $data = Equipment::find($id);
        $data->equipment_name = $request->equipment_name;
        $data->equipment_model = $request->equipment_model;
        $data->total_equipment = $request->total_equipment; 
        $data->position = $request->position;
        $data->save();
        return redirect('equipment');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Equipment::find($id);
        $data->delete();
        return redirect('equipment/');
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
                        $data = Equipment::find($value);
                        $data->status = 1;
                        $data->save();
                    }
                    break;
                
                case 'Deactive':
                    foreach ($request->all_id as $key => $value) {
                        $data = Equipment::find($value);
                        $data->status = 0;
                        $data->save();
                    }
                    break;
                
                case 'Delete':
                    foreach ($request->all_id as $key => $value) {
                        $data = Equipment::find($value);
                        $data->delete();
                    }
                    break;
                
            }
        }
        return redirect('equipment');
    }
}
