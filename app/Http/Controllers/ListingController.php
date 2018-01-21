<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listing = Listing::all();
        return view('welcome',['listing'=>$listing]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $listing = new Listing;
        if(Auth::check()){
            $listing -> name = $request->input('name'); 
            $listing -> description = $request->input('description'); 
            $listingImage = $request->file('photo');
            $listingImage->move('img',$listingImage->getClientOriginalName());
            $listing -> photo = $listingImage->getClientOriginalName();
            $listing -> price = $request->input('price'); 
            $listing -> city = $request->input('city'); 
            $listing -> type = $request->input('listingType');
            $listing -> user_id = Auth::user()->getId();
            $listing -> save();
        }
        return redirect('myproperties');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }

	public function showMyListing(Listing $listing){
		$listing = Listing::where('listingId',$listing->listingId);

		return view('editproperty',['listing'=>$listing]);
	}

	public function getNewListings()
	{
		$newListings = Listing::limit(6)->get();
		return view('home',['newListings'=>$newListings]);
	}

	public function requestListings(Request $request)
	{
		$listings = DB::table('listings')->select(DB::raw('*')) -> where('city','like',$request->city)->where('price','<=',$request->price)->get();
		return view('findResults',['searchListings' =>$listings]);	
	}

	public function getUserListings()
	{
		$id = Auth::user()->getId();
		$listings = DB::table('listings')->select(DB::raw('*'))->where('user_id','=',$id)->get();
		return view('properties.myproperties',['myListings' => $listings]);
	}

	public function insert(Request $request){
		$name = $request->input('name');
		
		DB::table('listings')->insert([
			['name'=> 'kakakakka'],
			['description'=>'dsadsdsadsa'],
			['photo'=>'img/property_1.jpg'],
			['price'=>'300'],
			['city'=>'Serres'],
			
		]);
	}
}
