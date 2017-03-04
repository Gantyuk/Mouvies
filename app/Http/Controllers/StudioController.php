<?php

namespace App\Http\Controllers;

use App\addres;
use App\studio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    protected $_header = "Студій";

    public function index()
    {
        $studios = DB::table('studios')
            ->join('addres', 'studios.id_Address', '=', 'addres.id')
            ->join('countries', 'countries.id', '=', 'addres.id_countries')
            ->join('town', 'town.id', '=', 'addres.id_town')
            ->select('studios.id', 'studios.Name_studio', 'countries.countries', 'town.town',
                'addres.street', 'addres._index', 'studios.Contact')
            ->paginate(6);
        return view('Studios.index', compact('studios'))->with(['header' => $this->_header]);
    }

    public function add()
    {
        $countries = DB::table('countries')->select('*')->get();
        $town = DB::table('town')->select('*')->get();
        return view('Studios.add', compact('countries', 'town'))->with(['header' => $this->_header]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        ]);
        $addres = new addres();
        $addres->fill($request->all());
        $addres->save();
        $studio = new studio();
        $studio->fill($request->all());
        $studio->fill(['id_Address' => $addres->id]);
        $studio->save();
        return redirect('studios/index');

    }
}
