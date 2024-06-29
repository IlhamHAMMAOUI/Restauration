<?php

namespace App\Http\Controllers;

use App\Models\Private_dining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Private_diningController extends Controller
{
    public function getPrivate_dinings()
    {
        $private_dinings = Private_dining::all();
        return response()->json($private_dinings);
    }

    public function getPrivate_dining(Private_dining $private_dining)
    {
        return response()->json($private_dining);
    }

    public function createPrivate_dining(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer',
            'details' => 'required|string',
            'contact_phone' => 'required|string|max:20',
            'contact_email' => 'required|email|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image uploads
        $images = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("image$i")) {
                $path = $request->file("image$i")->store("images");
                $images["image$i"] = $path;
            }
        }

        $private_dining = Private_dining::create(array_merge(
            $request->only([
                'name', 'description', 'capacity', 'details', 'contact_phone', 'contact_email'
            ]),
            $images // Merge uploaded image paths
        ));

        return response()->json($private_dining);
    }

    public function editPrivate_dining(Request $request, Private_dining $private_dining)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'capacity' => 'sometimes|required|integer',
            'details' => 'sometimes|required|string',
            'contact_phone' => 'sometimes|required|string|max:20',
            'contact_email' => 'sometimes|required|email|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->all() == []) {
            return response()->json([
                'message' => 'At least one field is required to edit!'
            ], 422);
        }

        // Handle image uploads
        $images = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("image$i")) {
                $path = $request->file("image$i")->store("images");
                $images["image$i"] = $path;
            }
        }

        // Merge updated fields and images
        $data = array_merge(
            $request->only([
                'name', 'description', 'capacity', 'details', 'contact_phone', 'contact_email'
            ]),
            $images // Merge updated image paths
        );

        $private_dining->update($data);

        return response()->json($private_dining);
    }

    public function deletePrivate_dining(Private_dining $private_dining)
    {
        // Delete associated images from storage if they exist
        for ($i = 1; $i <= 5; $i++) {
            $imageField = "image$i";
            if ($private_dining->$imageField) {
                Storage::delete($private_dining->$imageField);
            }
        }

        $private_dining->delete();

        return response()->json(['message' => 'Private dining deleted successfully']);
    }
}
