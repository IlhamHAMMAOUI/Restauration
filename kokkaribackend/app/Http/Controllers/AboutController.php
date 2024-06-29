<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AboutController extends Controller
{
    public function getAbouts()
    {
        $abouts = About::all();
        return response()->json($abouts);
    }

    public function getAbout(About $about)
    {
        return response()->json($about);
    }

    public function createAbout(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string|max:255',
            'managing_partner' => 'required|string|max:255',
            'chef_partner' => 'required|string|max:255',
            'general_manager' => 'required|string|max:255',
            'executive_chef' => 'required|string|max:255',
            'chef_de_cuisine' => 'required|string|max:255',
            'office_manager' => 'required|string|max:255',
            'sous_chefs' => 'required|string|max:255',
            'pastry' => 'required|string|max:255',
            'managers' => 'required|string|max:255',
            'wine_buyer' => 'required|string|max:255',
            'event_manager' => 'required|string|max:255',
        ]);

        $about = About::create([
            "title" => $request->title,
            "description" => $request->description,
            "email" => $request->email,
            "address" => $request->address,
            "phone" => $request->phone,
            "managing_partner" => $request->managing_partner,
            "chef_partner" => $request->chef_partner,
            "general_manager" => $request->general_manager,
            "executive_chef" => $request->executive_chef,
            "chef_de_cuisine" => $request->chef_de_cuisine,
            "office_manager" => $request->office_manager,
            "sous_chefs" => $request->sous_chefs,
            "pastry" => $request->pastry,
            "managers" => $request->managers,
            "wine_buyer" => $request->wine_buyer,
            "event_manager" => $request->event_manager,
        ]);


        return $about;
    }

    public function editAbout(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string|max:255',
            'managing_partner' => 'required|string|max:255',
            'chef_partner' => 'required|string|max:255',
            'general_manager' => 'required|string|max:255',
            'executive_chef' => 'required|string|max:255',
            'chef_de_cuisine' => 'required|string|max:255',
            'office_manager' => 'required|string|max:255',
            'sous_chefs' => 'required|string|max:255',
            'pastry' => 'required|string|max:255',
            'managers' => 'required|string|max:255',
            'wine_buyer' => 'required|string|max:255',
            'event_manager' => 'required|string|max:255',
        ]);

        if ($request->all() == []) {
            return response()->json([
                'message' => 'At least one field is required to edit!'
            ], 422);
        }

        $about->update($request->all());

        return response()->json($about);
    }

    public function deleteAbout(About $about)
    {
        $about->delete();

        return response()->json(['message' => 'About deleted successfully']);
    }
}
