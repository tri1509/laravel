<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;


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
        $movie -> name_eng = $data['name_eng'];
        $movie -> phim_hot = $data['phim_hot'];
        $movie -> slug = $data['slug'];
        $movie -> status = $data['status'];
        $movie -> description = $data['description'];
        $movie -> category_id = $data['category_id'];
        $movie -> genre_id = $data['genre_id'];
        $movie -> country_id = $data['country_id'];
        
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
        // dd($data);
        $movie = Movie::find($id);
        $movie -> title = $data['title'];
        $movie -> name_eng = $data['name_eng'];
        $movie -> phim_hot = $data['phim_hot'];
        $movie -> slug = $data['slug'];
        $movie -> status = $data['status'];
        $movie -> description = $data['description'];
        $movie -> category_id = $data['category_id'];
        $movie -> genre_id = $data['genre_id'];
        $movie -> country_id = $data['country_id'];
        
        $get_image = $request -> file('image');
        if($get_image) {
            if(!empty($movie -> image)){
                unlink('uploads/movie/'.$movie -> image);
            }
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if(!empty($movie -> image)){
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