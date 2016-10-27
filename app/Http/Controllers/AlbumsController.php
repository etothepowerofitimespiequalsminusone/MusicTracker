<?php

namespace musictracker\Http\Controllers;

use Illuminate\Http\Request;

use musictracker\Album;
use musictracker\Http\Requests;
use Session;
use DB;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $albums = Album::paginate(10);

        return view('albums.index')->withAlbums($albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $this->getXmlData();
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
//        $this->validate($request,array(
//            'title' => 'required|max:255',
//            'artist' => 'required',
//            'released' => 'required',
//            'albumUrl' => 'required'
//        ));

        //store in the database
        $album = new Album();
        $album->title = $request->title;
        $album->artist = $request->artist;
        $album->released = $request->released;
        $album->albumUrl = $request->albumUrl;
        $album->save();

        Session::flash('success','Album was successfully saved');

        //redirect to another page
        return redirect()->route('albums.show',$album->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);



        //if user checks the check-box then the respective album id gets passed to function

        //function adds the selected album to users "watching list"

        return view('albums.show')->withAlbum($album);
    }

    public function addToWatchList($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return view('albums.edit')->withAlbum($album);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $album = Album::find($id);

        $album->delete();

        return redirect()->route('albums.index');
    }

    public function getXmlData(){
        //this is the 'coming soon' rss feedback
        $coming_soon = 'http://hasitleaked.com/feed/';
        //this is the leaked album rss feed
        $leaked= 'http://hasitleaked.com/leakedfeed/';

        $xml = @simplexml_load_file($leaked);
        $item = $xml->channel->item;

        $albumnames = array();


//        DB::table('albums')
//            ->where('id', 2)
//            ->update(['title' => $item->title]);

        foreach($item as $album)
        {
            $albumnames[] = $album->title;

            //check if album isn't in the database

            //if it isn't then add insert



            $artist= substr($album->title,0,strpos(strval($album->title),':')-1);
            $title = substr(strval($album->title),strpos(strval($album->title),':')+1);
            $released = $album->pubdate;

//            go through all genre tags and concatenate them together
            $genre = $album->category;

            $description = $album->description;

//            DB::table('albums')->firstOrCreate(['title'=>'asdf']);


//            DB::table('albums')->insert([
//                ['title' => $title, 'artist' => $artist,'released'=>'10.10.2010','albumURL'=>'thisisurl','genre'=>$genre,
//                'description'=>$description],
//            ]);
        }



        return $albumnames;

    }
}
