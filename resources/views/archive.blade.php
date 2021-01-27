
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
                                <th scope="col">Original note id</th>
                            </tr>
                            </thead>

                            @foreach($ar_notes as $note)
                                <tbody class="w-auto">
                                <tr>
                                    <td>{{$note -> title}}</td>
                                    <td>{{$note -> newest_id}}</td>
                                    <td class="d-inline-flex align-self-center w-100">
                                        <form action="#" method="GET">
                                            {{csrf_field()}}
                                            <button class="btn btn-outline-danger w-100 mx-3"> Show history of changes </button>
                                        </form>


                                    </td>
                                </tr></tbody>
                            @endforeach
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection

