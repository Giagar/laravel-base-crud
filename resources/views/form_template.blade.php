@extends("layouts.master")

@section("main")

@php
    if(isset($edit) && !empty($edit)) {
        $method = 'PUT';
        $url = route('beers.update', compact('beer'));
    } else {
        $method = "POST";
        $url = route('beers.store');
    }
@endphp

<div class="container">
    <form action="{{ $url }}" method="post">
        @csrf
        {{-- scriviamo a mano l'input --}}
        {{-- <input name="_method" type="hidden" value="POST"> --}}
        {{-- oppure usiamo blade --}}
        @method($method)
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name')? 'is-invalid' : '' }}" placeholder="Name" value="{{isset($beer) ? $beer->name : ''}}">
            <div class="invalid-feedback">{{$errors->first('name')}}</div>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control {{ $errors->has('color')? 'is-invalid' : ''}}" placeholder="Color" value="{{isset($beer) ? $beer->color : ''}}">
            <div class="invalid-feedback">{{$errors->first('color')}}</div>
        </div>
        <div class="form-group">
            <label for="alcohol">Alcohol</label>
            <input type="text" name="alcohol" id="alcohol" class="form-control {{$errors->has('alcohol')? 'is-invalid' : ''}}" placeholder="Alcohol" value="{{isset($beer) ? $beer->alcohol : ''}}">
            <div class="invalid-feedback">{{$errors->first('alcohol')}}</div>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control {{$errors->has('price')? 'is-invalid' : ''}}" placeholder="Price" value="{{isset($beer) ? $beer->price : ''}}">
            <div class="invalid-feedback">{{$errors->first('price')}}</div>
        </div>
        <div class="form-group">
            <label for="cover">Cover</label>
            <input type="text" name="cover" id="cover" class="form-control {{$errors->has('cover')? 'is-invalid' : ''}}" placeholder="Cover" value="{{isset($beer) ? $beer->cover : ''}}">
            <div class="invalid-feedback">{{$errors->first('cover')}}</div>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" name="content" id="content" class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}" placeholder="Content" value="{{isset($beer) ? $beer->content : ''}}">
            <div class="invalid-feedback">{{$errors->first('content')}}</div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Description" value="{{isset($beer) ? $beer->description : ''}}">
            <div class="invalid-feedback">{{$errors->first("description")}}</div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
        </form>

    </div>

    @endsection
