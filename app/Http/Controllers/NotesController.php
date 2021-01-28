<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\ArchivedNote;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use Illuminate\Support\Facades\DB;
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
        $notes = Note::sortable()->get();
      return view('welcome', compact('notes'));
    }

    public function archive()
    {
        $ar_notes = DB::table('archived_notes')->distinct()->select('title', 'newest_id')->get();
        return view('archive', compact('ar_notes'));
    }

    public function history($id)
    {
        $ar_notes = DB::table('archived_notes')->select('title', 'content', 'created_at','updated_at')->where('newest_id', '=', $id)->get();
        return view('history', compact('ar_notes'));
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
        $note = Note::find($id);
        return view('edition', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, $id)
    {
        $note = Note::find($id);
        $note->content = $request ->text;

        if($note->push()){
            $ar_note = new ArchivedNote();
            $ar_note-> newest_id = $note->id;
            $ar_note-> title = $note -> title;
            $ar_note-> content = $request -> text;
            if($ar_note->save()){
               return redirect()->route('landingpage');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);

        if($note->delete()){
            return redirect() -> route('landingpage');
        }
    }
}
