<?php

namespace App\Http\Controllers;

use App\Models\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monedas = Moneda::all();
        return view('moneda.index', ['monedas' => $monedas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moneda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moneda = new Moneda($request->all());
        try {
            $result = $moneda->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        if($moneda->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $moneda->id];
            return redirect('moneda')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Euro  $euro
     * @return \Illuminate\Http\Response
     */
    public function show(Monedas $moneda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Euro  $euro
     * @return \Illuminate\Http\Response
     */
    public function edit(Moneda $moneda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Euro  $euro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moneda $moneda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Euro  $euro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moneda $moneda)
    {
        $id = $moneda->id;
        try {
            $result = $moneda->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'destroy', 'r' => $result, 'id' => $id];
        return redirect('moneda')->with($response);
    }
}
