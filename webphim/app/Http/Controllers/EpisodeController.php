<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Episode;


class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit_episode($id)
    {
        $movie = Movie::find($id);
        $list_episode = Episode::with('movie') -> where('movie_id',$id) -> get();
        return view('admincp.episode.edit-episode',compact('list_episode','movie'));
    }

    public function add_episode($id)
    {
        $movie = Movie::find($id);
        $list_episode = Episode::with('movie') -> where('movie_id',$id) -> orderBy('episode','DESC') -> get();
        $tap_cao_nhat = Episode::with('movie') -> where('movie_id',$id) -> orderBy('episode','DESC') -> first();
        return view('admincp.episode.add-episode',compact('list_episode','movie','tap_cao_nhat'));
    }
    
    public function select_movie()
    {
        $id = $_GET['id'];
        $movie= Movie::find($id);
        if($movie->thuocphim!='phim lẻ'){
            $output = '<option value="selected">----Chọn tập phim----</option>';
            for($i=1; $i<=$movie->sotap; $i++){
                $output .= '<option value="'.$i.'">'.$i.'</option>';
            }
        }else{
            $output = '<option value="0">Phim 1 tập</option>';
        }
        return $output;
    }
    
    public function index()
    {
        $list_episode = Episode::with('movie') -> orderBy('episode','DESC') -> get();
        return view('admincp.episode.index',compact('list_episode'));
        // return response()->json($list_episode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id','DESC') -> pluck('title','id');
        return view('admincp.episode.form',compact('list_movie'));
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
        $episode_check = Episode::where('episode',$data['episode']) -> where('movie_id',$data['movie_id']) -> count();
        if($episode_check > 0) {
            return redirect() -> back();
        }else{
            $episode = new Episode();
            $episode -> movie_id = $data['movie_id'];
            $episode -> link = $data['link'];
            $episode -> episode = $data['episode'];
            $episode -> save();
            return redirect() -> back();
        }
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
        $list_movie = Movie::orderBy('id','DESC') -> pluck('title','id');
        $episode = Episode::find($id);
        return view('admincp.episode.form',compact('episode','list_movie'));
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
        $episode = Episode::find($id);
        $episode -> movie_id = $data['movie_id'];
        $episode -> link = $data['link'];
        $episode -> episode = $data['episode'];
        $episode -> save();
        return redirect() -> route('episode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Episode::find($id) -> delete();
        return redirect() -> back();
    }
}