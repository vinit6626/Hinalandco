<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminReg;
use App\Operator;
use App\Equipment;
use App\Site;
use App\Email;
use App\Inquiry;
use App\logsheet;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $admin =AdminReg::all();
        $operator = Operator::all();
        $equipment = Equipment::all();
        $site = Site::all();
        $email = Email::all();
        $inquiry = Inquiry::all();
        $logsheet = logsheet::all();
        return view('dashboard.dashboard',['admin'=>$admin,'operator'=>$operator,'equipment'=>$equipment,'site'=>$site,'email'=>$email,'inquiry'=>$inquiry,'logsheet'=>$logsheet]);
    }
    public function id()
    {
        return view('dashboard.id');
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
    public function show()
    {
        return view('operator_logsheet.dashboard');
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
        //
    }
}
