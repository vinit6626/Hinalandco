<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data = Portfolio::all();
     return view('portfolio.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new portfolio();
        $data->year_of_excellence = $request->year_of_excellence;
        $data->projects_completed = $request->projects_completed;
        $data->really_happy_clients = $request->really_happy_clients;
        $data->cups_of_coffee_taken = $request->cups_of_coffee_taken;
        $data->number_of_equipments = $request->number_of_equipments;
        $data->save();
        return redirect('/portfolio/create');
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
        $data = Portfolio::find($id);
        return view('portfolio.edit',['data'=>$data]);
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
        // print_r($request->toArray());
        // die;
        $this->Validate($request,
        [
          'year_of_excellence'=>'required',
          'projects_completed'=>'required',
          'really_happy_clients'=>'required',
          'cups_of_coffee_taken'=>'required',
          'number_of_equipments'=>'required',
        ]);
       
        $data = Portfolio::find($id);
        $data->year_of_excellence = $request->year_of_excellence;
        $data->projects_completed = $request->projects_completed;
        $data->really_happy_clients = $request->really_happy_clients;
        $data->cups_of_coffee_taken = $request->cups_of_coffee_taken;
        $data->number_of_equipments = $request->number_of_equipments;
        $data->save();
        return redirect('/portfolio');

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
