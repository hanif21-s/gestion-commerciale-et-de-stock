<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use DB;

class CategorieController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $first_categories = Categorie::whereNull('parent_id')->with('children')->get();
        return view('admins.categories', compact('first_categories'));
    }

    public function index1() {
        $categories = Categorie::all();
            return view('admins.listCategorie',compact('categories'));
        }

    public function store(Request $request){
        $request->validate([
            "libelle"=>"required",
            "parent_id"=>"",
            "description"=>"required",
        ]);

        Categorie::create($request->all());
        return redirect('/admins/categories')->with("success", "Catégorie ajoutée avec succès!");
    }

    public function create() {
        $categories = Categorie::all();
        return view('admins.createCategorie',compact('categories'));
    }

    public function edit(Categorie $categorie) {
        $categories = Categorie::all();
        //dd($categories);
        $parents = DB::table('categories')
            ->select('categories.parent_id')
            ->get();
        //dd($parent);
        return view('admins.editCategorie',compact('categorie', "categories", "parents"));
    }

    public function update(Request $request, Categorie $categorie){
        $request->validate([
            "libelle"=>"required",
            "parent_id"=>"",
            "description"=>"required",
        ]);

        $categorie->update($request->all());
        return redirect('/admins/categories')->with("success", "Catégorie mise à jour avec succès!");
    }

    public function delete(Categorie $categorie){
        $nom_complet = $categorie->libelle;
        $categorie->delete();
        return back()->with("successDelete", "La catégorie '$nom_complet' supprimée avec succès!");
    }
}
