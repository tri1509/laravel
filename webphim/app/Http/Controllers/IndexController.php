<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;

class IndexController extends Controller
{
    public function home() {
        $category = Category::orderBy('id','DESC') -> where('status', 1) -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $country = Country::orderBy('id','DESC') -> get();
        $category_home = Category::with('movie') -> orderBy('id','DESC') -> where('status', 1) -> get();
        $phim_hot = Movie::all() -> where('phim_hot', 1)-> where('status', 1);
        return view('pages.home',compact('category','country','genre','category_home','phim_hot'));
    }
    public function category($slug) {
        $category = Category::orderBy('id','DESC') -> where('status', 1) -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $country = Country::orderBy('id','DESC') -> get();
        $cate_slug = Category::where('slug',$slug) -> first();
        $movie = Movie::where('category_id',$cate_slug -> id) -> paginate(4);
        return view('pages.category',compact('category','country','genre','cate_slug','movie'));
    }
    public function genre($slug) {
        $category = Category::orderBy('id','DESC') -> where('status', 1) -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $genre_slug = Genre::where('slug',$slug) -> first();
        $country = Country::orderBy('id','DESC') -> get();
        $movie = Movie::where('genre_id',$genre_slug -> id) -> paginate(40);
        return view('pages.genre',compact('category','country','genre','genre_slug','movie'));
    }
    public function country($slug) {
        $category = Category::orderBy('id','DESC') -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $country_slug = Country::where('slug',$slug) -> first();
        $country = Country::orderBy('id','DESC') -> get();
        $movie = Movie::where('country_id',$country_slug -> id) -> paginate(40);
        return view('pages.country',compact('category','country','genre','country_slug','movie'));
    }
    public function movie($slug) {
        $category = Category::orderBy('id','DESC') -> get();
        $country = Country::orderBy('id','DESC') -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $movie = Movie::with('category','genre','country') -> where('slug',$slug) -> where('status', 1) -> first();
        return view('pages.movie',compact('category','country','genre','movie'));
    }
    public function watch() {
        return view('pages.watch');
    }
    public function episode() {
        return view('pages.episode');
    }
}