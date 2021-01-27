
@extends('layouts.background')

@section('header')
    <title>Notes</title>
    <header id="more">
        <div class="container text-center">
            <h1>Welcome to the archive</h1>
        </div>
    </header>
@endsection

@section('content')

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="align-self-center">Notes board </h2>

                    <div class="row justify-content-center">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Created/Modified at</th>
                            </tr>
                            </thead>

                            @foreach($ar_notes as $note)
                                <tbody class="w-auto">
                                <tr>
                                    <td>{{$note -> title}}</td>
                                    <td>{{$note -> content}}</td>
                                    <td>{{$note -> created_at}}</td>
                                </tr></tbody>
                            @endforeach
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection

