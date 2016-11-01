<?php

namespace musictracker\Http\Controllers;


use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{
    public function getIndex(){
        return view('pages.index');
    }

    public function getArticles(){
        return view('pages.articles');
    }
    public function getLeaked(){

        $title = $this->getXmlData();

        return view('pages.leaked')->withAlbumnames($this->getXmlData());
    }


    public function getXmlData(){
        //this is the 'coming soon' rss feedback
        $coming_soon = 'http://hasitleaked.com/feed/';
        //this is the leaked album rss feed
        $leaked= 'http://hasitleaked.com/leakedfeed/';

        $xml = @simplexml_load_file($leaked);
        $title = $xml->channel->title;
        $item = $xml->channel->item;

        $lastbuilddate = $xml->channel->lastbuilddate;

        echo strtotime($lastbuilddate);

        $albumnames = array();

        foreach($item as $album)
        {
            $albumnames[] = $album->title;
        }

        return $albumnames;

    }
    public function getItunes(){

        $term = Input::get('term');
        $results = $this->searchItunes($term);

        return view('pages.itunes')->withResults($results);
    }

    public function searchItunes($keyword){
        $entity = 'musicArtist';
        $attribute = 'artistTerm';
        $tags = $keyword;
        $url_data = array(
            'entity'=>$entity,
            'attribute'=>$attribute,
            'term'=>$tags
        );
        $url_beg = 'https://itunes.apple.com/search?';
        $url_tags = http_build_query($url_data);
        $url_full = $url_beg . $url_tags;


        $file = file_get_contents($url_full);
        $json_data = json_decode($file);

        $results = $json_data->results;

        return $results;
    }
}
