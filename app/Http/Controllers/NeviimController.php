<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\Neviim;

class NeviimController extends Controller
{
    private $neviim;

    public function __construct(Neviim $neviim) {
        $this->neviim = $neviim;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = $this->neviim::query();

        return DataTables::eloquent($model)
            ->orderColumns([], '-:column $1')
            ->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = ['name_pt' =>  $request->name_pt, 'name_he' => $request->name_he];

        $neviim = new $this->neviim;
        $neviim->fill($data);
        $data = $neviim->save();

        return response()->json($data, 201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ['name_pt' =>  $request->name_pt, 'name_he' => $request->name_he];

        $neviim = new $this->neviim;
        $neviim = $neviim->find($id);
        $neviim->fill($data);
        $data = $neviim->save();

        return response()->json($data, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $neviim = new $this->neviim;
        $neviim = $neviim->find($id);

        return response()->json($neviim->delete(), 201);
    }

    public function managerBooks()
    {
        return view('divisions.content.neviim.content.books.show');
    }
}
