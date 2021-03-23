# RECAP LARAVEL FULL PROJECT
## Installazione dipendenze
## database e collegamenti con Laravel
## views
## crud
## validazione
1. installare laravel:
`composer create-project --prefer-dist laravel/laravel:^7.0 NomeProgetto`
2. aggiornare laravel mix in package.json + npm install + npx mix + npx mix
- in package.json, cambiare versione laravel-mix: `laravel-mix”: “^6.0.13`;
- `npm install`
- `npx mix`
3. installare bootstrap: 
```
composer require laravel/ui:^2.4
php artisan ui bootstrap
npm install
```
3. installare font awesome + @import in app.scss + npx mix
```
npm install --save-dev @fortawesome/fontawesome-free

// in ...
@import '~@fortawesome/fontawesome-free/css/all.min.css';
```
3. creo db di nome "automotive" su mamp;
4. sistemo env + test (tinker)
```
DB-DATABASE = nomeDB // nome del database
DB-USERNAME = root // controlla su MAMP
DB-PASSWORD = root // controlla su MAMP
DB-PORT = 8889 // mettere la porta indicata in MAMP
```
- Testare connessione:
```
// in cartellaProgetto, in terminale
php artisan tinker // invio, apre una shell interna; per uscire CTRL + C
DB::Connection()->getPdo();
// se tutto va bene, output: PDO{...}
```
5. creare migration per creare tabella "auto": 
`php artisan make:migration create_auto_table`
6. in database / migrations / auto / Schema::create , aggiungiamo tra id e timestamps nuove colonne per la nostra tabella:
```
$table->string('model_name', 255);
$table->unsignedSmallInteger('cubic_capacity');
$table->unsignedSmallInteger('max_speed');
$table->string('pic', 2048);
```
7. lancio con `php artisan migrate` e controllo su db
8. creare Model `php artisan make:model Auto`
9. in App / Auto.php (il Model), facciamo il match manuale della tabella
```
// nella class Auto:
protected $table = 'auto'; // solo nel caso in cui nn sia mappata automaticamente (nome migrations diverso da nome tabella)
protected $fillable = ['model_name', 'cubic_capacity', 'max_speed', 'pic'];
```
12. Creo il controller crud: `php artisan make:controller --resource AutoController`
13. in routes/web.php, creo la route resource:
```
`Route::resource('auto', AutoController::class)` // ritorna il nome di una classe (php) // video 11:50
```
- controllo con `php artisan route:list`
14. in resources/views creo la struttura template
creo cartella template e dentro file base.blade.php. Nella view base:
```
<title>Boolean Laravel - @yield('title')</title>
link href="{{asset('css/app.css')}}"
script src="{{asset('js/app.js)}}"

div.container > @yield('content') // video 10:50
```
15. in http/controllers/AutoController .create
`return view('auto.create);`
16. view: nuova folder "auto" e file "create.blade.php". Nella view create:
```
@extends('template.base')
@section('title', 'Create Auto') // video 10:55 circa
@section('content')
@endsection
```
17. in resources/sass creo automotive.scss. Tengo app.scss solo per gli import. In app.scss:
```
@import 'automotive.scss
npmx mix
```
- in automotive.scss scriverò il mio stile
18. in view create, creiamo la form che dovremo centralizzare
```
<form action="{{route('auto.store')}}" method="post">
    @csrf
    @method('post')
    // form con validazione bootstrap, uno per ogni colonna
    <div class="form-group"
    <label for model_name>Model Name</label>
    <input class="form-control {{$errors->has('model_name') ? 'is-invalid' : ''}}" name="model_name" type="text palceholder="Model name" value="" />
    <div class="invalid-feedback">
        {{$errors->first('model_name')}}
    </div>
    </div>

    <button type="submit" class="btn btn-primary">
        Inserisci nuova automobile
    </button>

    </form>
```
- facciamo una prova inviando e controllando in devtools/network/auto/form data
19. in AutoController.store:
- all'inizio di AutoController: `use App\Auto;`
- in .store:
```
$this->validateForm($request);
$data = $request->all();
$auto = new Auto(); // istanzio un nuovo oggetto/riga per db
$auto->fill($data);
$auto->save();
$newAuto = Auto::orderBy('id', 'desc')->first(); // oggetto/riga preso da db
return redirect()->route('auto.show', $newAuto);
```
20. validazione: metodo separato in fondo alla classe AutoController
```
protected function validateForm(Request $request){
    request->validate({
        'model_name'=>'required|max:255',
        'cubic_capacity'=>'required|numeric|between:1000, 10000',
        'max_speed'=>'required|numeric|50, 500'
    })
}
```
- per vedere possibili errori in form
```
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```
21. creo la view index.blade.php in view/auto
22. in AutoController.index
```
$auto = Auto::all();
return view('auto.index', compact('auto')); // nella view avremo $auto = Auto::all()
```
23. nella view index:
```
#extends('template.base')
@section('title', 'Index Auto')
@section('content')
// tabella con titoli id, model name, capacity, max speed, pic, inserito il, actions
// valori in foreach $auto as $car
// valori td $car->nomeColonna
// colonna actions:
a href="{{route('auto.show'), ['auto' => $car]}}" // compact, video 12:10 // se la var e la prop fossero state tutte e due chiamate "auto", avrei potuto usare il compact('auto')
@endsection
// sostituire auto.show con auto.edit per l'azione edit
```
24. creo view show (sempre in auto), dentro show:
```
@extends('template.blade')
@section('title', 'Show')
@section('content')
// card con dati presi da {{ $auto->nomeColonna }}
@endsection
```
25. in AutoController.show:
```
// cerchiamo il nostro record tramite id // video 12:19
(Auto $auto) // parametro
return view('auto.show', compact('auto'));
```
26. in model Auto.php:
- all'inizio aggiungi `use Carbon\Carbon;`
- quando app richiama created_at (quando l'auto è stata inserita nel catalogo), mostriamo la data nel formato italiano (d/m/y)
> // lo faccio nel Model xé si mette nel mezzo fra db e prop
> // (guarda eloquent mutators accessors)
> // nella classe Auto, dopo quello che c'è prima, creo un accessor che prende il dato e lo restituisce modificato ogni volta qlcno chiama il created_at (il nome dell'accessor comprende il nomeColonna in PascalCase):
```
public function getCreatedAtAttribute($value) { // $value è la data, il created_at del db
    $date = new Carbon($value); // creare oggetto carbon da stringa
    $date = $date->format('d F Y'); // ritorna una stringa con il formato impostato
    // possiamo usare i formati data di php
    return $date;
}
```
27. edit
```
public function edit(Movie $movie)
return view('movies.edit', compact('movie))
```
update
```
(Request $request, Movie $movie)
$this->validateMovie($request);
$data = $request->all();
$movie->update($data);
return redirect()->route('movies.show', compact('movie'));
```
28. destroy
```
(Movie $movie)
$movie->delete();
return redirect()->route('movies.index');
```


