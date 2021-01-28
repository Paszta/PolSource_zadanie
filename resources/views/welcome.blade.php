
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
                            <!--@sortablelink()  is a special blade extension that comes with the kyslik sortable-columns package, it's very convenient way of enabling sortable-columns-->
                            <tr>
                                <th scope="col">@sortablelink('name') </th>
                                <th scope="col">@sortablelink('content')</th>
                                <th scope="col">@sortablelink('created_at')</th>
                                <th scope="col">@sortablelink('updated_at')</th>
                            </tr>
                            </thead>

                            <!--iterating through every record in database and displaying it -->
                            @foreach($notes as $note)
                                    <tbody class="w-auto">
                                    <tr>
                                        <td>{{$note -> title}}</td>
                                        <td>{{$note -> content}}</td>
                                        <td>{{$note -> created_at}}</td>
                                        <td>{{$note -> updated_at}}</td>
                                        <td class="d-inline-flex w-100">

                                            <!-- deletion of the specified note with the usage of DELETE method in hidden input-->
                                            <form action="{{route('remove',['id' => $note->id])}}" method="POST">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-outline-danger mx-3"> Remove </button>
                                            </form>

                                            <!-- redirecting to page with the edition of the specified note-->
                                            <form action="{{route('edit_note', $note->id)}}" method="GET">
                                                {{csrf_field()}}
                                                <button class="btn btn-outline-success mx-3"> Edit </button>
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
