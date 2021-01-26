<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\ArchivedNote;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use Illuminate\View\View;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::orderby('id', 'desc')->get();
      return view('welcome', compact('notes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $note = new Note();
        $ar_note = new ArchivedNote();

        return view('newNote', compact('note','ar_note'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        $note = new  Note();
        $note -> title = $request->title;
        $note ->content = $request ->text;

        if($note->save()){
            $ar_note = new ArchivedNote();
            $ar_note->newest_id = $note ->id;
            $ar_note->title = $request->title;
            $ar_note->content = $request->text;
            if($ar_note->save()){
               return redirect()->route('landingpage');
            }
        }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
}
