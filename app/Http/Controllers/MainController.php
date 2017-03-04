<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movie;
use App\genre;
use App\director;
use App\studio;

class MainController extends Controller
{
    public function index()
    {
        $movies = movie::getAll();
        return view('Main.index', compact('movies'));
    }

    public function add()
    {
        $directors = director::all();
        $genres = genre::all();
        $studio = studio::all();
        return view('Main.add', compact('directors', 'genres', 'studio'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required|max:255',
            'Duration' => 'required|numeric',
            'year' => 'required|numeric',
            'Biudjet' => 'required|numeric',
            'Date' => 'required',
            'images' => 'required',
            'discription' => 'required'
        ]);
        $request->images->move('images/muvies/', $request->images->getClientOriginalName());
        $movie = new movie();
        $movies = $request->all();
        $movies['images'] = $request->images->getClientOriginalName();
        $movie->fill($movies)->save();
        return redirect('/');

    }

    public function search_option()
    {
        $directors = director::all();
        $studio = studio::all();
        return view('Main.search', compact('directors', 'studio'));
    }

    public function search()
    {
        $movies = [];
        if (isset($_POST['studion']) && !empty($_POST['studion'])) {
            $movies = movie::searchId('studios', $_POST['studion']);
        } elseif (isset($_POST['directors']) && !empty($_POST['directors'])) {
            $movies = movie::searchId('directors', $_POST['directors']);
        } elseif (isset($_POST['search_str']) && !empty($_POST['search_str'])) {
            $movies = movie::searchLike($_POST['search_str']);
        }
        $directors = director::all();
        $studio = studio::all();
        return view('Main.search', compact('directors', 'studio', 'movies'));
    }

    public function order()
    {
        $movies = [];
        if (isset($_POST['sort'])):
            $movies = movie::orderBY($_POST['sort']);
        endif;
        return view('Main.index', compact('movies'));
    }

}

?>