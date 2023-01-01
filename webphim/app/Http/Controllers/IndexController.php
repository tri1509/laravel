<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use DB;

class IndexController extends Controller
{
    public function timkiem() {
        if(isset($_GET['s'])) {
            $search = $_GET['s'];
            $category = Category::orderBy('id','DESC') -> where('status', 1) -> get();
            $genre = Genre::orderBy('id','DESC') -> get();
            $country = Country::orderBy('id','DESC') -> get();
            $phim_hot_sidebar = Movie::all() -> where('phim_hot', 1)-> where('status', 1) -> take('10');
            $topview_day = Movie::all() -> where('topview', 0)-> where('status', 1) -> take('10');
            $topview_tuan = Movie::all() -> where('topview', 1)-> where('status', 1) -> take('10');
            $topview_thang = Movie::all() -> where('topview', 2)-> where('status', 1) -> take('10');
            $phim_trailer = Movie::all() -> where('resolution', '2')-> where('status', 1) -> take('15');
            $movie = Movie::where('title','LIKE','%'.$search.'%') -> paginate(40);
            return view('pages.timkiem',compact('category','country','genre','movie','phim_hot_sidebar','topview_day','topview_tuan','topview_thang','phim_trailer','search'));
        }else{
            return redirect() -> to('/');
        }
    }

    public function home() {
        $category = Category::orderBy('id','DESC') -> where('status', 1) -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $country = Country::orderBy('id','DESC') -> get();
        $category_home = Category::with('movie') -> orderBy('id','DESC') -> where('status', 1) -> get();
        $phim_hot = Movie::all() -> where('phim_hot', 1)-> where('status', 1);
        $phim_hot_sidebar = Movie::all() -> where('phim_hot', 1)-> where('status', 1) -> take('10');
        $topview_day = Movie::all() -> where('topview', 0)-> where('status', 1) -> take('10');
        $topview_tuan = Movie::all() -> where('topview', 1)-> where('status', 1) -> take('10');
        $topview_thang = Movie::all() -> where('topview', 2)-> where('status', 1) -> take('10');
        $phim_trailer = Movie::all() -> where('resolution', '2')-> where('status', 1) -> take('15');
        return view('pages.home',compact('category','country','genre','category_home','phim_hot','phim_hot_sidebar','topview_day','topview_tuan','topview_thang','phim_trailer'));
    }
    public function category($slug) {
        $category = Category::orderBy('id','DESC') -> where('status', 1) -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $country = Country::orderBy('id','DESC') -> get();
        $phim_hot_sidebar = Movie::all() -> where('phim_hot', 1)-> where('status', 1) -> take('10');
        $cate_slug = Category::where('slug',$slug) -> first();
        $movie = Movie::where('category_id',$cate_slug -> id) -> paginate(40);
        $topview_day = Movie::all() -> where('topview', 0)-> where('status', 1) -> take('10');
        $topview_tuan = Movie::all() -> where('topview', 1)-> where('status', 1) -> take('10');
        $topview_thang = Movie::all() -> where('topview', 2)-> where('status', 1) -> take('10');
        $phim_trailer = Movie::all() -> where('resolution', '2')-> where('status', 1) -> take('15');
        return view('pages.category',compact('category','country','genre','cate_slug','movie','phim_hot_sidebar','topview_day','topview_tuan','topview_thang','phim_trailer'));
    }
    public function year($year) {
        $category = Category::orderBy('id','DESC') -> where('status', 1) -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $phim_hot_sidebar = Movie::all() -> where('phim_hot', 1)-> where('status', 1) -> take('10');
        $country = Country::orderBy('id','DESC') -> get();
        $year = $year;
        $movie = Movie::where('year',$year) -> paginate(40);
        $topview_day = Movie::all() -> where('topview', 0)-> where('status', 1) -> take('10');
        $topview_tuan = Movie::all() -> where('topview', 1)-> where('status', 1) -> take('10');
        $topview_thang = Movie::all() -> where('topview', 2)-> where('status', 1) -> take('10');
        $phim_trailer = Movie::all() -> where('resolution', '2')-> where('status', 1) -> take('15');
        return view('pages.year',compact('category','country','genre','year','movie','phim_hot_sidebar','topview_day','topview_tuan','topview_thang','phim_trailer'));
    }
    public function tag($tag) {
        $category = Category::orderBy('id','DESC') -> where('status', 1) -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $country = Country::orderBy('id','DESC') -> get();
        $tag = $tag;
        $movie = Movie::where('tags','LIKE', '%'.$tag.'%') -> paginate(40);
        return view('pages.tag',compact('category','country','genre','tag','movie'));
    }
    public function genre($slug) {
        $category = Category::orderBy('id','DESC') -> where('status', 1) -> get();
        $phim_hot_sidebar = Movie::all() -> where('phim_hot', 1)-> where('status', 1) -> take('10');
        $genre = Genre::orderBy('id','DESC') -> get();
        $genre_slug = Genre::where('slug',$slug) -> first();
        $country = Country::orderBy('id','DESC') -> get();
        $topview_day = Movie::all() -> where('topview', 0)-> where('status', 1) -> take('10');
        $topview_tuan = Movie::all() -> where('topview', 1)-> where('status', 1) -> take('10');
        $topview_thang = Movie::all() -> where('topview', 2)-> where('status', 1) -> take('10');
        $phim_trailer = Movie::all() -> where('resolution', '2')-> where('status', 1) -> take('15');
        // Nhiều thể loại
        $movie_genre = Movie_Genre::where('genre_id',$genre_slug -> id) -> get();
        $many_genre = [];
        foreach($movie_genre as $count){
            $many_genre[] = $count->movie_id;
        }
        $movie = Movie::whereIn('id',$many_genre) -> paginate(40);
        // return response()->json($many_genre);
        return view('pages.genre',compact('category','country','genre','genre_slug','movie','phim_hot_sidebar','topview_day','topview_tuan','topview_thang','phim_trailer'));
    }
    public function country($slug) {
        $category = Category::orderBy('id','DESC') -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $phim_hot_sidebar = Movie::all() -> where('phim_hot', 1)-> where('status', 1) -> take('10');
        $country_slug = Country::where('slug',$slug) -> first();
        $country = Country::orderBy('id','DESC') -> get();
        $movie = Movie::where('country_id',$country_slug -> id) -> paginate(40);
        $topview_day = Movie::all() -> where('topview', 0)-> where('status', 1) -> take('10');
        $topview_tuan = Movie::all() -> where('topview', 1)-> where('status', 1) -> take('10');
        $topview_thang = Movie::all() -> where('topview', 2)-> where('status', 1) -> take('10');
        $phim_trailer = Movie::all() -> where('resolution', '2')-> where('status', 1) -> take('15');
        return view('pages.country',compact('category','country','genre','country_slug','movie','phim_hot_sidebar','topview_day','topview_tuan','topview_thang','phim_trailer'));
    }
    public function movie($slug) {
        $category = Category::orderBy('id','DESC') -> get();
        $phim_hot_sidebar = Movie::all() -> where('phim_hot', 1)-> where('status', 1) -> take('10');
        $country = Country::orderBy('id','DESC') -> get();
        $genre = Genre::orderBy('id','DESC') -> get();
        $movie = Movie::with('category','genre','country','movie_genre') -> where('slug',$slug) -> where('status', 1) -> first();
        $related = Movie::with('category','genre','country') -> where('category_id',$movie -> category -> id) -> orderBy(DB::raw('RAND()')) -> whereNotIn('slug',[$slug]) -> get();
        $topview_day = Movie::all() -> where('topview', 0)-> where('status', 1) -> take('10');
        $topview_tuan = Movie::all() -> where('topview', 1)-> where('status', 1) -> take('10');
        $topview_thang = Movie::all() -> where('topview', 2)-> where('status', 1) -> take('10');
        $phim_trailer = Movie::all() -> where('resolution', '2')-> where('status', 1) -> take('15');
        return view('pages.movie',compact('category','country','genre','movie','related','phim_hot_sidebar','topview_day','topview_tuan','topview_thang','phim_trailer'));
    }
    public function watch() {
        return view('pages.watch');
    }
    public function episode() {
        return view('pages.episode');
    }
}