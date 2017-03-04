<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class movie extends Model
{
    protected $fillable = ['id_directors', 'Name', 'id_genres', 'Duration', 'year', 'Biudjet', 'id_Studio', 'Date', 'images', 'discription'];

    public static function getAll()
    {
        return DB::table('movies')
            ->join('directors', 'movies.id_directors', '=', 'directors.id')
            ->join('genres', 'genres.id', '=', 'movies.id_genres')
            ->join('studios', 'studios.id', '=', 'movies.id_Studio')
            ->select('movies.id', 'directors.L_Name', 'directors.S_Name', 'movies.Name', 'movies.images', 'movies.discription',
                'genres.genres', 'movies.Duration', 'movies.year', 'movies.Biudjet', 'studios.Name_studio', 'movies.Date')
            ->paginate(4);
    }

    public static function orderBY($value)
    {
        return DB::table('movies')
            ->join('directors', 'movies.id_directors', '=', 'directors.id')
            ->join('genres', 'genres.id', '=', 'movies.id_genres')
            ->join('studios', 'studios.id', '=', 'movies.id_Studio')
            ->select('movies.id', 'directors.L_Name', 'directors.S_Name', 'movies.Name', 'movies.images', 'movies.discription',
                'genres.genres', 'movies.Duration', 'movies.year', 'movies.Biudjet', 'studios.Name_studio', 'movies.Date')
            ->orderBy('movies.' . $value)->paginate(4);
    }

    public static function searchLike($value)
    {
        return DB::table('movies')
            ->join('directors', 'movies.id_directors', '=', 'directors.id')
            ->join('genres', 'genres.id', '=', 'movies.id_genres')
            ->join('studios', 'studios.id', '=', 'movies.id_Studio')
            ->select('movies.id', 'directors.L_Name', 'directors.S_Name', 'movies.Name', 'movies.images', 'movies.discription',
                'genres.genres', 'movies.Duration', 'movies.year', 'movies.Biudjet', 'studios.Name_studio', 'movies.Date')
            ->where('movies.Name', 'LIKE', '%' . $value . '%')
            ->orwhere('studios.Name_studio', 'LIKE', '%' . $value . '%')
            ->orwhere('directors.S_Name', 'LIKE', '%' . $value . '%')
            ->paginate(4);
    }

    public static function searchId($nameTable, $value)
    {
        return DB::table('movies')
            ->join('directors', 'movies.id_directors', '=', 'directors.id')
            ->join('genres', 'genres.id', '=', 'movies.id_genres')
            ->join('studios', 'studios.id', '=', 'movies.id_Studio')
            ->select('movies.id', 'directors.L_Name', 'directors.S_Name', 'movies.Name', 'movies.images', 'movies.discription',
                'genres.genres', 'movies.Duration', 'movies.year', 'movies.Biudjet', 'studios.Name_studio', 'movies.Date')
            ->where($nameTable . '.id', '=', $value)
            ->paginate(4);
    }

}
