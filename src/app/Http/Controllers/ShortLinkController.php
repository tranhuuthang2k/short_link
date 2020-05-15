<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use  App\models\ShortLink;
use Auth;
class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $UserShortLink = ShortLink::where('user_id','=',$id)->get();   
        return  view ('shortLink',['shortLinks'=> $UserShortLink]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ShortLink $ShortLink)
    {

        $request->validate([

           'link' => 'required|url'

        ]);
        $ShortLink->user_id= Auth::User()->id;
        $ShortLink->link= $request->link;
        $ShortLink->code= Str::random(6);
        $ShortLink->save();
        return redirect()->route('ShortLink.index');
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
        //
        return view('edit',['ShortLink'=> ShortLink::find($id)]);
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
        $ShortLink = ShortLink::findorfail($id);
        $ShortLink->fill( $request->all());
        $ShortLink->save();  
        return redirect()->route('ShortLink.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();
   
        return redirect($find->link);
    }
}
