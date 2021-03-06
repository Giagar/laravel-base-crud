<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beers = Beer::all();
        return view("index", ["beers" => $beers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     "name" => "required|max:255",
        //     "color" => "required",
        //     "alcohol" => "required",
        //     "price" => "required|numeric|between:0,9999.99",
        //     "cover" => "required",
        //     "description" => "required",
        //     "content" => "required",
        // ]);

        $this->validateForm($request);

        $data = $request->all();
        $beer = new Beer();
        $beer->name = $data["name"];
        $beer->color = $data["color"];
        $beer->alcohol = $data["alcohol"];
        $beer->price = $data["price"];
        $beer->cover = $data["cover"];
        $beer->description = $data["description"];
        $beer->content = $data["content"];

        $beer->save();

        $beerStored = Beer::orderBy("id", "desc")->first();
        return redirect()->route("beers.index", $beerStored);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Ottavio dice di mettere (Beer $id), ma nn funziona lo stesso
    public function show($id)
    {

        $beer = Beer::find($id);

        return view("show_product", ["beer" => $beer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function edit(Beer $beer)
    {
        return view('form_edit', compact('beer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beer $beer)
    {

        $this->validateForm($request);

        // dd($beer);
        $data = $request->all();
        $beer->update($data);

        return redirect()->route('beers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beer $beer)
    {
        $beer->delete();

        return redirect()->route('beers.index');
    }

    protected function validateForm(Request $request) {
        $request->validate([
            "name" => "required|max:255",
            "color" => "required",
            "alcohol" => "required",
            "price" => "required|numeric|between:0,9999.99",
            "cover" => "required",
            "description" => "required",
            "content" => "required",
        ]);
    }

}
