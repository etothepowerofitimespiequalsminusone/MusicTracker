<?php

namespace musictracker\Http\Controllers;


class PagesController extends Controller
{
    public function getIndex(){
        return view('pages.index');
    }
}
