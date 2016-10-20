<?php

namespace musictracker\Http\Controllers;


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
}
