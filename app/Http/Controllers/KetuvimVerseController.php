<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\KetuvimVerse;

class KetuvimVerseController extends Controller
{
    private $ketuvimVerse;

    public function __construct(KetuvimVerse $ketuvimVerse) {
        $this->ketuvimVerse = $ketuvimVerse;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bookId, $chapterId)
    {
        $model = $this->ketuvimVerse::query();

        return DataTables::eloquent($model)
            ->filter(function ($query) use($chapterId) {
                $query->where('chapter_id', '=', $chapterId);
            })
            ->order(function($query) {
                $query->orderBy('number_pt', 'asc');
            })
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
            'chapter_id' => $request['chapter_id'],
            'comments' => $request['comments'],
        ];
        $verse = new $this->ketuvimVerse;
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
    public function update(Request $request, $book, $chapter, $id)
    {
        $data = [
            'number_pt'  => $request['number_pt'],
            'number_he'  => $request['number_he'],
            'verse_pt'   => $request['verse_pt'],
            'verse_he'   => $request['verse_he'],
            'chapter_id' => $request['chapter_id'],
            'comments' => $request['comments'],
        ];

        $verse = new $this->ketuvimVerse;
        $verse = $verse->find($id);

        $verse->fill($data);
        $verse->save();

        return response()->json($verse, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book, $chapter, $id)
    {
        $verse = new $this->ketuvimVerse;
        $verse = $verse->find($id);

        return response()->json($verse->delete(), 201);
    }

    public function managerVerses ($id, $chapterId)
    {
        return view('divisions.content.ketuvim.content.verses.show', ['book_id' => $id, 'chapter_id' => $chapterId]);
    }
}
