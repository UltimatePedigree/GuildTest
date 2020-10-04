<?php

namespace App\Http\Controllers;

use App\ShowCase;
use App\Gallery;
use App\Photographer;
use App\Photo;
use Illuminate\Http\Request;

class ShowCaseController extends Controller
{
    /**
     * CRR TODO: REMOVE THIS AS OUR SHOWCASE WILL SHOW ONLY 1 GALLERY BY GALLERY TITLE
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Gallery::all();
    }

    /**
     * CRR TODO: REMOVE THIS AS OUR SHOWCASE WILL SHOW ONLY 1 GALLERY BY GALLERY TITLE
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShowCase  $showCase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$filteredId = $id;

        /* so far attempt, close but not going in*/
        /*
        $data = Gallery::find($id);

        $photographer = Photographer::SELECT('photographers.name', 'photographers.phone')->
        where('id', '=', $data->user_id)->get();

        $photographer->album = Photo::select('title')
        ->where('gallery_id', '=', $id)->get();

        //return $data;
        return $photographer;
        //return $photographer->album;
        */

        //scribles and results
        //$photographer = Photographer::where('id', '=', $data->user_id);
        //return $photographer;

        //$photosByGalleryId = Photo::where('gallery_id', '=', $filteredId)->get();
/*
        $photographer = Photographer::where('id', $gallery->user_id)->first();
        
        //return $gallery; //this will defaulting to finding by id
        return $photographer;
        //return Gallery::where('title', $title)->first();  //this will find by title of gallery
        */
        /* further, progress
        $data = Gallery::find($id)
                ->JOIN('photographers', 'photographers.id', '=', 'galleries.user_id')
                ->JOIN('photos', 'photos.gallery_id', '=', 'galleries.id')
                ->SELECT('photographers.name', 'photos.title')
                ->get();

        return $data;
        */

        /*
        //this is good, now to slim down our result set
        $data = Gallery::find($id)
                ->JOIN('photographers', 'photographers.id', '=', 'galleries.user_id')
                ->where('galleries.id', '=', $id)

                //->JOIN('photos', 'photos.gallery_id', '=', 'galleries.id')
                //->SELECT('photographers.name', 'galleries.id')
                ->get();

        foreach($data as $v) {
            $v->album = Photo::where('gallery_id', '=', $v->id)->get()->toArray();
        }

        return $data;
        */

        //this is good, now to slim down our result set!!!!!!!!!!!!!!! (last one had issue getting photos for showcase3)
        //$data = Gallery::find($id)
        $data = Gallery::select('name', 'phone', 'email', 'bio', 'profile_picture')
        ->JOIN('photographers', 'photographers.id', '=', 'galleries.user_id')
        ->where('galleries.id', '=', $id)
        ->get();

        foreach($data as $v) {
            //$v->album = Photo::select('id', 'title', 'img', 'photos.gallery_id')
            $v->album = Photo::select('id', 'title', 'description', 'img', 'date', 'featured')
            ->where('photos.gallery_id', '=', $id)
            ->get()
            ->toArray();
        }

        return $data;



        /*
        $data = Gallery::find($id)
                ->JOIN('photographers', 'photographers.id', '=', 'galleries.user_id')
                //->JOIN('photos', 'photos.gallery_id', '=', 'galleries.id')
                //->SELECT('photographers.name', 'galleries.id')
                ->get();//->toArray();

        foreach($data as $v) {
            //$v->album = Photo::where('gallery_id', '=', $v->id)->get();
            $v->album = Photo::select('id', 'title', 'description', 'img', 'date', 'featured')
                ->where('gallery_id', '=', $v->id)->get();
        }
        */

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShowCase  $showCase
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, ShowCase $showCase)
    //{
        //
    //}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShowCase  $showCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShowCase $showCase)
    {
        //
    }
}
