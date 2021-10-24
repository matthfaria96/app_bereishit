<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\NeviimVerse;

class NeviimVerseController extends Controller
{
    private $neviimVerse;

    public function __construct(NeviimVerse $neviimVerse) {
        $this->neviimVerse = $neviimVerse;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($chapterId)
    {
        $model = $this->neviimVerse::query();

        return DataTables::eloquent($model)
            ->filter(function ($query) use($chapterId) {
                $query->where('chapter_id', '=', $chapterId);
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
        $data = [
            'number_pt'  => $request['number_pt'],
            'number_he'  => $request['number_he'],
            'verse_pt'   => $request['verse_pt'],
            'verse_he'   => $request['verse_he'],
            'chapter_id' => $request['chapter_id']
        ];
        $verse = new $this->neviimVerse;
        $verse->fill($data);
        $verse->save();

        return response()->json($verse, 201);
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

    public function managerVerses($id, $chapterId)
    {
        return view('divisions.content.neviim.content.verses.show', ['book_id' => $id, 'chapter_id' => $chapterId]);
    }
}
