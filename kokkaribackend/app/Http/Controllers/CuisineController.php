<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CuisineController extends Controller
{
    public function getCuisines()
    {
        $cuisines = Cuisine::all();
        return response()->json($cuisines);
    }

    public function getCuisine(Cuisine $cuisine)
    {
        return response()->json($cuisine);
    }

    public function createCuisine(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'specialties' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'techniques' => 'nullable|string',
            // 'image' => 'nullable|image', // Validation de l'image
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

           // Handle image uploads
           $imagess = [];
           for ($i = 1; $i <= 5; $i++) {
               if ($request->hasFile("image$i")) {
                   $path = $request->file("image$i")->store("imagess");
                   $imagess["image$i"] = $path;
               }
           }
   
           $private_dining = Private_dining::create(array_merge(
               $request->only([
                'specialties', 'description', 'ingredients','techniques'
               ]),
               $imagess // Merge uploaded image paths
           ));
    
        // return $cuisine;
        return response()->json($cuisine);
    }

    public function editCuisine(Request $request, Cuisine $cuisine)
    {
        $request->validate([
            'description' => 'required|string',
            'specialties' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'techniques' => 'nullable|string',
            // 'image' => 'nullable|image',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        // $cuisine->update($request->all());
        if ($request->all() == []) {
            return response()->json([
                'message' => 'At least one field is required to edit!'
            ], 422);
        }

        // Handle image uploads
        $imagess = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("image$i")) {
                $path = $request->file("image$i")->store("imagess");
                $imagess["image$i"] = $path;
            }
        }

        // Merge updated fields and images
        $data = array_merge(
            $request->only([
                'specialties', 'description', 'ingredients','techniques'
            ]),
            $imagess // Merge updated image paths
        );

        $private_dining->update($data);


        return response()->json($cuisine);
    }

    public function deleteCuisine(Cuisine $cuisine)
    {
        $cuisine->delete();

        return response()->json(['message' => 'Cuisine deleted successfully']);
    }
}
