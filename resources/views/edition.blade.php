
@extends('layouts.background')

@section('header')
    <title>Notes</title>
    <header id="more">
        <div class="container text-center">
            <h1>Edit note</h1>
        </div>
    </header>
@endsection

@section('content')

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">


                    <form method="POST" action="{{route('note_update', $note->id)}}">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PUT">
                        <fieldset class="form-group">

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">The title of the note: </label>
                                    <input id="title" type="text"  name="title" value="{{ $note->title }}" class="form-control @error('title') is-invalid @enderror"  readonly>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div

                            <div class="form-row">
                                <div class="col">
                                    <label for="content"> The content of the note: </label>
                                    <textarea  id="text" name="text" value="" cols="10" rows="5"  required class="form-control @error('text') is-invalid @enderror" >
                                    {{$note -> content}}
                                    </textarea>
                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <button type="submit" class="btn btn-outline-primary">
                                Apply changes
                            </button>
                            <button type="reset" class="btn btn-outline-danger" value="Odrzuc"> Cancel </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
