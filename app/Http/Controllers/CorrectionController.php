<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;
use App\Correction;
use App\Pending;

class CorrectionController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending = Pending::where('birthcertificate_id',auth()->user()->bid)->first();
        return view('voter.correction.lists', compact('pending'));
    }


    public function approval()
    {
        $pending = Pending::where('birthcertificate_id',auth()->user()->bid)->first();
        return view('voter.correction.lists', compact('pending'));
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
        $this->validate($request, [
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'birthPlace' => 'required',
            'birthCountry' => 'required',
            'dateOfBirth' => 'required',
            'fathername' => 'required',
            'mothername' => 'required',
            'height' => 'required',
            'eyesColor' => 'required',
            'sex' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'emergencyContact' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);

        $pending = new Pending;
        $pending->fname = $request->input('fname');
        $pending->mname = $request->input('mname');
        $pending->lname = $request->input('lname');
        $pending->birthPlace = $request->input('birthPlace');
        $pending->birthCountry = $request->input('birthCountry');
        $pending->dateOfBirth = $request->input('dateOfBirth');
        $pending->fathername = $request->input('fathername');
        $pending->mothername = $request->input('mothername');
        $pending->height = $request->input('height');
        $pending->eyesColor = $request->input('eyesColor');
        $pending->sex = $request->input('sex');
        $pending->telephone = $request->input('telephone');
        $pending->mobile = $request->input('mobile');
        $pending->emergencyContact = $request->input('emergencyContact');
        $pending->address = $request->input('address');
        $pending->address2 = $request->input('address2');
        $pending->country = $request->input('country');
        $pending->state = $request->input('state');
        $pending->zip = $request->input('zip');
        $pending->save();
        return redirect('/correction')->with('success', 'Update request is sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corrections = BirthCertificate::find($id);
        return view('voter.correction.show', compact('corrections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corrections = BirthCertificate::find($id);
        return view('voter.correction.edit', compact('corrections'));
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
        $this->validate($request, [
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'birthPlace' => 'required',
            'birthCountry' => 'required',
            'dateOfBirth' => 'required',
            'fathername' => 'required',
            'mothername' => 'required',
            'height' => 'required',
            'eyesColor' => 'required',
            'sex' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'emergencyContact' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);

        $correction = BirthCertificate::find($id);
        $correction->fname = $request->input('fname');
        $correction->mname = $request->input('mname');
        $correction->lname = $request->input('lname');
        $correction->birthPlace = $request->input('birthPlace');
        $correction->birthCountry = $request->input('birthCountry');
        $correction->dateOfBirth = $request->input('dateOfBirth');
        $correction->fathername = $request->input('fathername');
        $correction->mothername = $request->input('mothername');
        $correction->height = $request->input('height');
        $correction->eyesColor = $request->input('eyesColor');
        $correction->sex = $request->input('sex');
        $correction->telephone = $request->input('telephone');
        $correction->mobile = $request->input('mobile');
        $correction->emergencyContact = $request->input('emergencyContact');
        $correction->address = $request->input('address');
        $correction->address2 = $request->input('address2');
        $correction->country = $request->input('country');
        $correction->state = $request->input('state');
        $correction->zip = $request->input('zip');
        $correction->save();
        return redirect('/admin')->with('success', 'Correction Approved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificate = Pending::find($id);
        $certificate->delete();
        return redirect('/admin')->with('success', 'Request Removed');
    }
}
