@extends('layouts.master')

@section("main")

    <main >
        <table class="table">
            <thead class="thead-dark">
                <tr class="uppercase">
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Alcohol</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($beers as $beer)
                <tr>
                    <td>{{$beer->name}}</td>
                    <td>{{$beer->color}}</td>
                    <td>{{$beer->alcohol}}</td>
                    <td>{{$beer->price}}</td>
                    <td>
                        <a href="/beers/{{$beer->id}}">
                            <img src="{{$beer->cover}}" alt="birra">
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </main>

@endsection
