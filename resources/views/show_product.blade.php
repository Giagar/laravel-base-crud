@extends("layouts.master")

@section("main")

    {{$beer->name}}
    {{-- <a href="/beers">Back to home</a> --}}
    <a href="{{ route("beers.index") }}">Back to home</a>

@endsection
