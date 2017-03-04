<?php

namespace App\Http\Controllers;

use App\director;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    protected $_header = "Режисери";

    public function index()
    {
        $directors = DB::table('directors')
            ->join('countries', 'countries.id', '=', 'directors.id_contries')
            ->select('directors.id', 'directors.L_Name', 'directors.S_Name', 'directors.Y_Birth',
                'directors.Y_Death', 'countries.countries')
            ->paginate(6);
        return view('Directors.index', compact('directors'))->with(['header' => $this->_header]);
    }
    public function add()
    {
        $countries = DB::table('countries')->select('*')->get();
        return view('Directors.add', compact('countries'))->with(['header' => $this->_header]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'S_Name' => 'required|max:255',
            'L_Name' => 'required|max:255',
            'Y_Birth' => 'required|numeric',
        ]);
        $movie = new director();
        $movie->fill($request->all());
        $movie->save();
        return redirect('directors/index');

    }
}
