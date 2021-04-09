<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Chadicus\Marvel\Api\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $client = new Client(env('MARVEL_PRIVATE_KEY'),env('MARVEL_PUBLIC_KEY'));
        $response = $client->get('characters', 1009610);

        $attributionText = $response->getDataWrapper()->getAttributionText();
        $character = $response->getDataWrapper()->getData()->getResults()[0];
        $title='Comics';
        $name=$character->getName();
        $image_url= $character->getThumbnail()->path;
        $data = $character->getComics()->getItems();
        //dd($character->getStories()->getItems());

        $content=count($character->getComics()->getItems());
        return view('home',compact(
                            'data',
                          'image_url',
                                     'name',
                                     'content',
                                     'title'
                          ));

    }
    public function add(Request $request)
    {
        if(!($request->user()->hasRole('admin'))){
             abort(403,'permission dennied');
        }
        else{
            $client = new Client(env('MARVEL_PRIVATE_KEY'),env('MARVEL_PUBLIC_KEY'));
            $id=(int)$request->input('id');
            $response = $client->get('characters', (int)$request->input('id'));
            $attributionText = $response->getDataWrapper()->getAttributionText();
            $character = $response->getDataWrapper()->getData()->getResults()[0];
            $name=$character->getName();
            $image_url= $character->getThumbnail()->path;
            $type=$request->input('type');
            if ($type == 'eventos') {
                $data = $character->getEvents()->getItems();
                $content = count($character->getEvents()->getItems());
                $title='Eventos';
                return view('home', compact(
                                    'data',
                                  'image_url',
                                             'name',
                                             'content',
                                             'id',
                                             'title'
                                 ));
            }
            else if ($type == 'series'){
                $data = $character->getSeries()->getItems();
                $content = count($character->getSeries()->getItems());
                $title='Series';
                return view('home', compact(
                                    'data',
                                  'image_url',
                                             'name',
                                             'content',
                                             'id',
                                             'title'
                                  ));
            }
            else if($type == 'historias') {
                $data = $character->getStories()->getItems();
                $content = count($character->getStories()->getItems());
                $title = 'Historias';
                return view('home', compact(
                    'data',
                    'image_url',
                    'name',
                    'content',
                    'id',
                    'title'
                ));
            }
        }
    }
    public function delete(Request $request)
    {
        if(($request->user()->hasRole('edit'))){
            abort(403,'permission dennied');
        }

    }

    public function update(Request $request)
    {
        if(($request->user()->hasRole('remove'))){
            abort(403,'permission dennied');
        }
        else {
            $client = new Client(env('MARVEL_PRIVATE_KEY'), env('MARVEL_PUBLIC_KEY'));
            $id = (int)$request->input('id');
            $response = $client->get('characters', $id);
            $attributionText = $response->getDataWrapper()->getAttributionText();
            $character = $response->getDataWrapper()->getData()->getResults()[0];
            $name = $character->getName();
            $image_url = $character->getThumbnail()->path;
            $data = $character->getComics()->getItems();
            $title = 'Comics';
            $content = count($character->getComics()->getItems());
            return view('home', compact(
                'data',
                'image_url',
                'name',
                'content',
                'id',
                'title'
            ));
        }
    }



}
