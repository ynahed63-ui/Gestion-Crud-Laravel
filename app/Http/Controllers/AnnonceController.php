<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
public function index(Request $request)
{
    $query = Annonce::query();

    // Search by title
    if ($request->filled('titre')) {
        $query->where('titre', 'like', '%' . $request->titre . '%');
    }

    //  Filter by type
    if ($request->filled('type') && $request->type != 'Tous') {
        $query->where('type', $request->type);
    }

    //  Filter by ville
    if ($request->filled('ville') && $request->ville != 'Toutes') {
        $query->where('ville', $request->ville);
    }

    //  Max price
    if ($request->filled('prix_max')) {
        $query->where('prix', '<=', $request->prix_max);
    }

    //  Surface min
    if ($request->filled('surface_min')) {
        $query->where('superficie', '>=', $request->surface_min);
    }

    //  Surface max
    if ($request->filled('surface_max')) {
        $query->where('superficie', '<=', $request->surface_max);
    }

    //  Etat
    if ($request->filled('etat')) {
        if ($request->etat == 'neuf') {
            $query->where('neuf', 1);
        } elseif ($request->etat == 'ancien') {
            $query->where('neuf', 0);
        }
    }

    $annonces = $query->latest()->paginate(6)->withQueryString();

    return view('annonces.index', compact('annonces'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
           $data = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'type' => 'required',
            'ville' => 'required',
            'superficie' => 'required|integer',
            'prix' => 'required|numeric',
            'photo' => 'nullable|image'
        ]);
                  if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('annonces','public');
        }
             Annonce::create($data);
                 return redirect()->route('annonces.index')
                 ->with('success','Annonce créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        //
        return view('annonces.show', compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        //
        return view('annonces.edit', compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Annonce $annonce)
    {
        $data = $request->validate([
            'titre'=>'required',
            'description'=>'required',
            'type'=>'required',
            'ville'=>'required',
            'superficie'=>'required|integer',
            'prix'=>'required|numeric'
        ]);

        $annonce->update($data);

        return redirect()->route('annonces.index')
            ->with('success','Annonce modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
      public function destroy(Annonce $annonce)
    {
        $annonce->delete();
        return back()->with('success','Annonce supprimée !');
    }

    public function dashboard()
{
    $stats = [
        'total' => Annonce::count(),
        'prix_total' => Annonce::sum('prix'),
        'prix_moyen' => Annonce::avg('prix'),
        'surface_total' => Annonce::sum('superficie'),
        'plus_chere' => Annonce::max('prix'),
        'plus_recente' => Annonce::latest()->first(),
    ];

    return view('annonces.dashboard', compact('stats'));
}
}
