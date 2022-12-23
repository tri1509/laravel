<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use Carbon\Carbon;

use function PHPUnit\Framework\fileExists;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category','genre','country') -> orderBy('position','ASC') -> get();
        return view('admincp.movie.index',compact('list'));
    }

    public function update_year(Request $request)
    {
        $data = $request -> all();
        $movie = Movie::find($data['id_phim']);
        $movie -> year = $data['year'];
        $movie -> save();
    }

    public function update_topview(Request $request)
    {
        $data = $request -> all();
        $movie = Movie::find($data['id_phim']);
        $movie -> topview = $data['topview'];
        $movie -> save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $country = Country::pluck('title','id');
        $list = Movie::with('category','genre','country') -> orderBy('position','ASC') -> get();
        return view('admincp.movie.form',compact('category','country','genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> all();
        // dd($data);
        $movie = new Movie();
        $movie -> title = $data['title'];
        $movie -> trailer = $data['trailer'];
        $movie -> description = $data['description'];
        $movie -> status = $data['status'];
        $movie -> category_id = $data['category_id'];
        $movie -> genre_id = $data['genre_id'];
        $movie -> country_id = $data['country_id'];
        $movie -> slug = $data['slug'];
        $movie -> phim_hot = $data['phim_hot'];
        $movie -> resolution = $data['resolution'];
        $movie -> name_eng = $data['name_eng'];
        $movie -> phude = $data['phude'];
        $movie -> ngaytao = Carbon::now('asia/Ho_Chi_Minh');
        $movie -> ngaycapnhat = Carbon::now('asia/Ho_Chi_Minh');
        $movie -> thoiluong = $data['thoiluong'];
        $movie -> tags = $data['tags'];
        
        $get_image = $request -> file('image');

        if($get_image) {
            $get_name_image = $get_image -> getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image -> getClientOriginalExtension();
            $get_image -> move('uploads/movie/',$new_image);
            $movie -> image = $new_image;
        }
        $movie -> save();
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $country = Country::pluck('title','id');
        return view('admincp.movie.form',compact('category','country','genre','movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> all();
        $movie = Movie::find($id);
        $movie -> title = $data['title'];
        $movie -> description = $data['description'];
        $movie -> status = $data['status'];
        $movie -> category_id = $data['category_id'];
        $movie -> genre_id = $data['genre_id'];
        $movie -> trailer = $data['trailer'];
        $movie -> country_id = $data['country_id'];
        $movie -> slug = $data['slug'];
        $movie -> phim_hot = $data['phim_hot'];
        $movie -> resolution = $data['resolution'];
        $movie -> name_eng = $data['name_eng'];
        $movie -> phude = $data['phude'];
        $movie -> ngaytao = Carbon::now('asia/Ho_Chi_Minh');
        $movie -> ngaycapnhat = Carbon::now('asia/Ho_Chi_Minh');
        $movie -> thoiluong = $data['thoiluong'];
        $movie -> tags = $data['tags'];
        
        $get_image = $request -> file('image');
        if($get_image) {
            if(file_exists('uploads/movie/'.$movie -> image)){
                unlink('uploads/movie/'.$movie -> image);
            }else{
                $get_name_image = $get_image -> getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,9999).'.'.$get_image -> getClientOriginalExtension();
                $get_image -> move('uploads/movie/',$new_image);
                $movie -> image = $new_image;
            }
        }
        $movie -> save();
        return redirect() -> back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if(file_exists('uploads/movie/'.$movie -> image)) {
            unlink('uploads/movie/'.$movie -> image);
        }
        $movie -> delete();
        return redirect() -> back();
    }

    public function resorting(Request $request)
    {
        $data = $request -> all();
        foreach($data['array_id'] as $key => $value){
            $movie = Movie::find($value);
            $movie -> position = $key;
            $movie -> save();
        }
    }
}