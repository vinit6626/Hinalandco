<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request)) {
        
             $client_name = $request->client_name;
             $client_contact = $request->client_contact;

            $data = Inquiry::where('client_name','LIKE','%'.$client_name.'%')
                        ->where('client_contact','LIKE','%'.$client_contact.'%')
                        ->paginate(50);
            $data = $data->appends(['client_name'=>$client_name,'client_contact'=>$client_contact]);
            return view('inquiry.index',['data'=>$data,'odata'=>$request]);

        }
        else
        {
            $data = Inquiry::paginate(50);
            return view('inquiry.index',['data'=>$data]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Inquiry::find($id);
        $data->delete();
        return redirect('inquiry/');
    }
    public function status(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        if(!empty($request->Action))
        {
            switch ($request->Action) {
                case 'Completed':
                    foreach ($request->all_id as $key => $value) {
                        $data = Inquiry::find($value);
                        $data->status = 1;
                        $data->save();
                        }    
                    break;
                
                case 'Pending':
                    foreach ($request->all_id as $key => $value) {
                        $data = Inquiry::find($value);
                        $data->status = 0;
                        $data->save();
                        }    
                    break;
                
                case 'Delete':
                    foreach ($request->all_id as $key => $value) {
                        $data = Inquiry::find($value);
                        $data->delete();
                        }    
                    break;
                   
            }
        }
        return redirect('/inquiry');
    }
}
