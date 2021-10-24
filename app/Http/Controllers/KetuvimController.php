<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\Ketuvim;

class KetuvimController extends Controller
{
    private $ketuvim;

    public function __construct(Ketuvim $ketuvim) {
        $this->ketuvim = $ketuvim;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = $this->ketuvim::query();

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

        $ketuvim = new $this->ketuvim;
        $ketuvim->fill($data);
        $data = $ketuvim->save();

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

    public function managerBooks()
    {
        return view('divisions.content.ketuvim.content.books.show');
    }
}
