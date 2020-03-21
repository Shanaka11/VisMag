<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;

class VisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $visitors = Visitor::All();
        return view('list.visitorlist')->with('visitors', $visitors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list.addVisitor');
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
        $this->validate($request, ['name' => 'required',
                                    'nic' => 'required',
                                    'date_of_arrival' => 'required']);

        //Create Visitor
        $visitor = new Visitor;
        $visitor->name = $request->input('name');
        $visitor->nic = $request->input('nic');
        $visitor->vehicle_no = $request->input('vehicle_no');
        $visitor->date_of_arrival = $request->input('date_of_arrival');
        $visitor->arrived = 'false';
        $visitor->approved = 'false';
        $visitor->user_entered = 'temp';
        $visitor->user_mark_arrival = 'false';
        $visitor->version = now();
        $visitor->save();

        return redirect('/')->with('success', 'Visitor Added');
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
        //
    }
}
