<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public static function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search', 'location', 'company']))->paginate(5)
        ]);
    }

    public static function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public static function create(Listing $listing)
    {
        return view('listings.create');
    }

    public static function store(Request $request)
    {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'desc' => 'required'
        ]);

        $formFields['logo'] = $request->file('logo')->store('logos', 'public');

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
}
