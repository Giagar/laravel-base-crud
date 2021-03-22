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
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($beers as $beer)
                <tr>
                    <td>{{$beer->name}}</td>
                    <td>{{$beer->color}}</td>
                    <td>{{$beer->alcohol}}</td>
                    <td>{{$beer->price}}</td>
                    {{-- <td> --}}
                        {{-- <a href="/beers/{{$beer->id}}"> --}}
                        {{-- <a href="{{route("beers.show", ["beer"=>$beer->id]) }}">
                            <img src="{{$beer->cover}}" alt="birra">
                        </a>
                    </td> --}}
                    <td>
                        <img src="{{$beer->cover}}" alt="birra">
                    </td>
                    <td>
                        <a href="{{route('beers.show', ['beer'=>$beer->id])}}">
                            <button class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </button>
                        </a>
                        <a href="{{route('beers.edit', compact('beer')) }}">
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <form action="{{ route('beers.destroy', compact('beer')) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-meteor"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <a href="{{route("beers.create")}}" class="btn btn-primary">Add new beer</a>
    </main>

@endsection
