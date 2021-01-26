
@extends('layouts.background')

@section('header')
    <title>Notes</title>
    <header id="more">
        <div class="container text-center">
            <h1>Check out the newest notes</h1>
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
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">What do you want to do with the note?</th>
                            </tr>
                            </thead>

                            @foreach($notes as $note)
                                    <thead>
                                    <tr>
                                        <td>{{$note -> id}}</td>
                                        <td>{{$note -> title}}</td>
                                        <td>{{$note -> content}}</td>
                                            <form action="#" method="POST">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="PATCH">
                                                <td><button class="btn btn-outline-danger"> To nie działa jeszcze</button></td>
                                            </form>
                                    </tr></thead>
                            @endforeach
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
