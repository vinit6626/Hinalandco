<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Operator;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
          if (!empty($request)) {
        
             $site_name = $request->site_name;
             $operator_name = $request->operator_name;
             $client_name = $request->client_name;

            $data = Site::selectRaw('sites.*,operators.o_name')->join('operators','operators.id','=','sites.operator_name')->where('site_name','LIKE','%'.$site_name.'%')->where('operators.o_name','LIKE','%'.$operator_name.'%')->where('client_name','LIKE','%'.$client_name.'%')->paginate(20);
            $data = $data->appends(['site_name'=>$site_name,'o_name'=>$operator_name,'client_name'=>$client_name]);
            return view('site.index',['data'=>$data,'odata'=>$request]);

        }
        else
        {
            $data = Site::selectRaw('sites.*,operators.o_name')->join('operators','operators.id','=','sites.operator_name')->paginate(20);
            return view('site.index',['data'=>$data]);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opname = Operator::where('status','=','1')->get();
        // echo "<pre>";
        // print_r($opname->toArray());
        // die;
        return view('site.create',['opname'=>$opname]);
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
          'site_name'=>'required',
          'operator_name'=>'required|not_in : -1',
          'client_name'=>'required',
          'contractor_name'=>'required',
        ]);
       
        $data = new Site();
        $data->site_name = $request->site_name;
        $data->operator_name = $request->operator_name;
        $data->client_name = $request->client_name;
        $data->contractor_name = $request->contractor_name;
        $data->save();
        return redirect('site/');
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
        $data = Site::find($id);
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
        return view('site.edit',['data'=>$data]);
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
          'site_name'=>'required',
        ]);
       
        $data = Site::find($id);
        $data->site_name = $request->site_name;
        $data->save();
        return redirect('site/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Site::find($id);
        $data->delete();
        return redirect('site');                
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
                        $data = Site::find($value);
                        $data->status = 1;
                        $data->save();
                    }
                    break;
                
                case 'Deactive':
                    foreach ($request->all_id as $key => $value) {
                        $data = Site::find($value);
                        $data->status = 0;
                        $data->save();
                    }
                    break;
                case 'Delete':
                    foreach ($request->all_id as $key => $value) {
                        $data = Site::find($value);
                        $data->delete();
                    }
                    break;
                        
            }

        }
        return redirect('site');
    }
}
