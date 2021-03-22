@extends("layouts.master")

@section("main")
{{--
<div class="container">
    <form action="{{route('beers.update', compact('beer'))}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name')? 'is-invalid' : '' }}" placeholder="Name" value="{{$beer->name}}">
            <div class="invalid-feedback">{{$errors->first('name')}}</div>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control {{ $errors->has('color')? 'is-invalid' : ''}}" placeholder="Color" value="{{$beer->color}}">
            <div class="invalid-feedback">{{$errors->first('color')}}</div>
        </div>
        <div class="form-group">
            <label for="alcohol">Alcohol</label>
            <input type="text" name="alcohol" id="alcohol" class="form-control {{$errors->has('alcohol')? 'is-invalid' : ''}}" placeholder="Alcohol" value="{{$beer->alcohol}}">
            <div class="invalid-feedback">{{$errors->first('alcohol')}}</div>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control {{$errors->has('price')? 'is-invalid' : ''}}" placeholder="Price" value="{{$beer->price}}">
            <div class="invalid-feedback">{{$errors->first('price')}}</div>
        </div>
        <div class="form-group">
            <label for="cover">Cover</label>
            <input type="text" name="cover" id="cover" class="form-control {{$errors->has('cover')? 'is-invalid' : ''}}" placeholder="Cover" value="{{$beer->cover}}">
            <div class="invalid-feedback">{{$errors->first('cover')}}</div>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" name="content" id="content" class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}" placeholder="Content" value="{{$beer->content}}">
            <div class="invalid-feedback">{{$errors->first('content')}}</div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Description" value="{{$beer->description}}">
            <div class="invalid-feedback">{{$errors->first("description")}}</div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
        </form>

    </div>
     --}}

     @include('form_template', ['edit' => true])
@endsection
