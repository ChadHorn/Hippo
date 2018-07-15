<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\VetForm;
use App\Models\Vet;

class VetController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $vets = Vet::get();

        return view('vets.index', ['vets' => $vets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('vets.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VetForm $request) {
        //
        $vet = Vet::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('vets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vet $vet) {
        //
        return view('vets.info', ['vet' => $vet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vet $vet) {
        //
        return view('vets.form', ['vet' => $vet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VetForm $request, $id) {
        //
        $vet = Vet::find($id);

        $vet->email = $request->email;
        $vet->password = Hash::make($request->password);

        $vet->save();

        return redirect()->route('vets.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $vet = Vet::find($id);
        $vet->delete();

        return redirect()->route('vets.index');
    }
}
