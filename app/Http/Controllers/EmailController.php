<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request)) {
        
             $email_address = $request->email_address;

            $data = Email::where('email_address','LIKE','%'.$email_address.'%')
                        ->paginate(50);
            $data = $data->appends(['email_address'=>$email_address]);
            return view('email.index',['data'=>$data,'odata'=>$request]);

        }
        else
        {
            $data = Email::paginate(50);
            return view('email.index',['data'=>$data]);
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
        // echo "<pre>";
        // print_r($request->toArray());
        // die;
        $data = new Email();
        $data->email_address = $request->email_address;
        $data->save();
        return redirect('/home');

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
        $data = Email::find($id);
        $data->delete();
        return redirect('email/');
    }
    public function status(Request $request)
    {
        if(!empty($request->all_id))
        {
            // echo "<pre>";
            // print_r($request->toArray());
            // die;
            switch ($request->Action) {
                case 'Multipleclient':
                $mail = array();
                        foreach ($request->all_id as $key => $value) {
                            $data = Email::find($value);
                            $mail['email_address'][] = $data->email_address;
                        }
                        $email = implode(',', $mail['email_address']);
                       return redirect('email/')->with('email',$email);
                    break;
                
                
                
                case 'Delete':
                    foreach ($request->all_id as $key => $value) {
                        $data = Email::find($value);
                        $data->delete();
                        }    
                    break;
            }
        }
        return redirect('email/');
    }
}
