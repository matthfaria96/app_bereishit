<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\KetuvimChapter;

class KetuvimChapterController extends Controller
{
    private $ketuvimChapter;

    public function __construct(KetuvimChapter $ketuvimChapter) {
        $this->ketuvimChapter = $ketuvimChapter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bookId)
    {
        $model = $this->ketuvimChapter::query();

        return DataTables::eloquent($model)
            ->filter(function ($query) use($bookId) {
                $query->where('book_id', '=', $bookId);
            })
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

        $chapter = new $this->ketuvimChapter;
        $chapter->fill($data);
        $chapter->save();

        return response()->json($chapter, 201);
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
    public function update(Request $request, $bookId, $id)
    {
        $data = ['number_pt' => $request['number_pt'], 'number_he' => $request['number_he'], 'book_id' => $request['book_id']];

        $chapter = new $this->ketuvimChapter;
        $chapter = $chapter->find($id);
        $chapter->fill($data);
        $chapter->save();

        return response()->json($chapter, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookId, $id)
    {
        $chapter = new $this->ketuvimChapter;
        $chapter = $chapter->find($id);
        $chapter->delete();

        return response()->json($chapter, 201);
    }

    public function managerChapters($id)
    {

        return view('divisions.content.ketuvim.content.chapters.show', ['book_id' => $id]);
    }
}
