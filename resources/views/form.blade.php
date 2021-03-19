@extends("layouts.master")

@section("main")

<div class="container">
    <form action="{{route('beers.store')}}" method="post">
        @csrf
        {{-- scriviamo a mano l'input --}}
        {{-- <input name="_method" type="hidden" value="POST"> --}}
        {{-- oppure usiamo blade --}}
        @method('POST')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control" placeholder="Color">
        </div>
        <div class="form-group">
            <label for="alcohol">Alcohol</label>
            <input type="text" name="alcohol" id="alcohol" class="form-control" placeholder="Alcohol">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="cover">Cover</label>
            <input type="text" name="cover" id="cover" class="form-control" placeholder="Cover">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" name="content" id="content" class="form-control" placeholder="Content">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Description">
        </div>
        <input type="submit" value="Add" class="btn btn-primary">
        </form>

    @endsection
</div>
