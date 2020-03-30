<?php

namespace App\Http\Controllers;

use App\Hero;
use Illuminate\Http\Request;
use function Sodium\compare;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroes = Hero::paginate(5);;
        return view('heroes.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('heroes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nickname' => 'required|max:100',
            'realName' => 'required',
            'description' => 'required',
            'superpowers' => 'required',
            'phrase' => 'required',
            'images' => 'required',
        ]);

        $hero = new Hero();
        $hero->nickname = $request->nickname;
        $hero->name = $request->realName;
        $hero->origin_description = $request->description;
        $hero->superpowers = $request->superpowers;
        $hero->catch_phrase = $request->phrase;

        $file = $request->file('images');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move(public_path() . '/images', $fName);
            $hero->images = '/images/' . $fName;
        }
        $hero->save();
        return redirect('/heroes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hero = Hero::find($id);
        return view('heroes.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hero = Hero::find($id);
        $img = scandir(public_path() . '/images');
        //dd($hero->images);
        return view('heroes.edit', compact('hero', 'img'));
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
        $validatedData = $request->validate([
            'nickname' => 'required|max:100',
            'realName' => 'required',
            'description' => 'required',
            'superpowers' => 'required',
            'phrase' => 'required',
            'newimage' => 'required',
        ]);

        $hero = Hero::find($id);
        $hero->nickname = $request->nickname;
        $hero->name = $request->realName;
        $hero->origin_description = $request->description;
        $hero->superpowers = $request->superpowers;
        $hero->catch_phrase = $request->phrase;

        $hero->images = '/images/' . $request->newimage;

        $hero->save();
        return redirect('/heroes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero = Hero::find($id);
        $hero->delete();
        return redirect('/heroes');
    }




}
