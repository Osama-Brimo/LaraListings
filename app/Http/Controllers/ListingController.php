<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{


    public static function index()
    {
        // Display a message describing what listings we are showing
        $filterMsg = 'Showing all listings';
        $query = request()->query();

        if (count($query) === 1) {
            $queryKey = key($query);
            $queryVal = $query[$queryKey];
            $filterMsg .= " ({$queryKey} {$queryVal})";
        }

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search', 'location', 'company']))->paginate(5),
            'filterMsg' => $filterMsg
        ]);
    }

    public static function show(Listing $listing)
    {
        // ddd($listing);

        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public static function create()
    {
        return view('listings.create');
    }

    public static function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'desc' => 'required'
        ]);

        if ($request->file('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->user()->id;

        Listing::create($formFields);
        
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    public static function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    public static function update(Listing $listing)
    {
        //check if the company name is unique
        //but allow the listing to use its current company name at the same time
        $formFields = request()->validate([
            'company' =>  Rule::unique('listings', 'company')->whereNot('company', $listing->company),
            'email' => 'email'
        ]);

        if (request()->file('logo')) {
            $formFields['logo'] = request()->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        $listing->save();

        return back()->with('message', 'Listing updated successfully!');
    }

    public static function destroy(Listing $listing)
    {
        $afterDeleteRedirect = request()->afterAction;
        $redirectURL = $afterDeleteRedirect ? $afterDeleteRedirect : '/';
        $listing->delete();
        return redirect($redirectURL)->with('message', 'Listing deleted successfully!');
    }
}
