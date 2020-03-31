<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;
use Auth;

class VisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::All();
        return view('list.visitorlist')->with('visitors', $visitors);
        //return view('layouts.app');
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
        //Validation to not allow security to entry by security users
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

    public function updateVisitor(Request $request)
    {  
        /*
        $test = Auth::user();
        dd($test);
        Log::info($test); // will show in your log
        var_dump($test);*/

        //Validation to not allow security to entry by security users and mark arrival only for security users and approval only for admin users

        $visitor = Visitor::find($request->input('visitorId'));
        $visitor->name = $request->input('visitorName');
        $visitor->nic = $request->input('visitorNic');
        $visitor->vehicle_no = $request->input('visitorVehicle');
        $visitor->date_of_arrival = $request->input('visitorDate');
        $visitor->version = now();
        $visitor->user_entered = Auth::user()->name;

        if($request->input('visitorArrived') != null){
            $visitor->arrived = true;
            $visitor->user_mark_arrival = Auth::user()->name;
            $test = 'Visitor ' . $request->input('visitorName') . ' Arrived';
        }else{
            $visitor->arrived = false;
            $test = 'Visitor ' . $request->input('visitorName') . ' Updated';
        }

        $visitor->save();
        return redirect('/Visitor')->with('success', $test);        
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
        $visitor = Visitor::find($id);
        // Return the edit view
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
        //
        $this->validate($request, ['name' => 'required',
                                    'nic' => 'required',
                                    'date_of_arrival' => 'required']);

        //Create Visitor
        $visitor = Visitor::find($id);
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

        return redirect('/')->with('success', 'Visitor Updated');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Validation to not allow security to entry by security users
        $visitor = Visitor::find($id);
        $visitor->delete();
        return redirect('/')->with('success', 'Visitor Deleted'); 
    }
}
