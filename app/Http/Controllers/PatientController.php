<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\PatientForm;
use App\Models\Owner;
use App\Models\Patient;

class PatientController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $patients = Patient::get();

        return view('patients.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $owners = Owner::get();
        return view('patients.form', ['owners' => $owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientForm $request) {
        //
        $patients = Patient::create($request->all());
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient) {
        //
        return view('patients.info', ['patient' => $patient]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient) {
        //
        $owners = Owner::get();
        return view('patients.form', ['patient' => $patient, 'owners' => $owners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientForm $request, $id) {
        //
        $patient = Patient::find($id);
        $patient->fill($request->all())->save();

        return redirect()->route('patients.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $patient = Patient::find($id);
        $patient->delete();

        return redirect()->route('patients.index');
    }
}
