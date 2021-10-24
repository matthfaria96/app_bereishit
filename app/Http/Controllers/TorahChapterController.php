<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\TorahChapter;

class TorahChapterController extends Controller
{
    private TorahChapter $torahChapter;


    public function __construct(TorahChapter $torahChapter) {
        $this->torahChapter = $torahChapter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = $this->torahChapter::query();

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
        $data = ['number_pt' => $request['number_pt'], 'number_he' => $request['number_he'], 'book_id' => $request['book_id']];

        $chapter = new $this->torahChapter;
        $chapter->fill($data);
        $chapter->save();

        return response()->json($chapter, 200);
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

    public function managerChapters($id)
    {

        return view('divisions.content.torah.content.chapters.show', ['book_id' => $id]);
    }
}
