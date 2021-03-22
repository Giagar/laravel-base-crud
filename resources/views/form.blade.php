@extends("layouts.master")

@section("main")

{{-- <div class="container">
    <form action="{{route('beers.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name')? 'is-invalid' : '' }}" placeholder="Name">
            <div class="invalid-feedback">{{$errors->first('name')}}</div>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control {{ $errors->has('color')? 'is-invalid' : ''}}" placeholder="Color">
            <div class="invalid-feedback">{{$errors->first('color')}}</div>
        </div>
        <div class="form-group">
            <label for="alcohol">Alcohol</label>
            <input type="text" name="alcohol" id="alcohol" class="form-control {{$errors->has('alcohol')? 'is-invalid' : ''}}" placeholder="Alcohol">
            <div class="invalid-feedback">{{$errors->first('alcohol')}}</div>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control {{$errors->has('price')? 'is-invalid' : ''}}" placeholder="Price">
            <div class="invalid-feedback">{{$errors->first('price')}}</div>
        </div>
        <div class="form-group">
            <label for="cover">Cover</label>
            <input type="text" name="cover" id="cover" class="form-control {{$errors->has('cover')? 'is-invalid' : ''}}" placeholder="Cover">
            <div class="invalid-feedback">{{$errors->first('cover')}}</div>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" name="content" id="content" class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}" placeholder="Content">
            <div class="invalid-feedback">{{$errors->first('content')}}</div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Description">
            <div class="invalid-feedback">{{$errors->first("description")}}</div>
        </div>
        <input type="submit" value="Add" class="btn btn-primary">
        </form>

    </div> --}}

    @include('form_template', ['edit' => false])
@endsection
