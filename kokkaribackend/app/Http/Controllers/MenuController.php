<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{
    public function getMenus()
    {
        $menus = Menu::all();
        return response()->json($menus);
    }

    public function getMenu(Menu $menu)
    {
        return response()->json($menu);
    }

    public function createMenu(Request $request)
    {
        $request->validate([
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

           // Handle image uploads
           $imagessss = [];
           for ($i = 1; $i <= 5; $i++) {
               if ($request->hasFile("image$i")) {
                   $path = $request->file("image$i")->store("imagessss");
                   $imagessss["image$i"] = $path;
               }
           }
   
        //    $private_dining = Private_dining::create(array_merge(
        //        $request->only([
        //         'specialties', 'description', 'ingredients','techniques'
        //        ]),
        //        $imagess // Merge uploaded image paths
        //    ));

        return response()->json($menu);
    }

    public function editMenu(Request $request, Menu $menu)
    {
        $request->validate([
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
    $imagessss = [];
    for ($i = 1; $i <= 5; $i++) {
        if ($request->hasFile("image$i")) {
            $path = $request->file("image$i")->store("imagessss");
            $imagessss["image$i"] = $path;
        }
    }

    // Merge updated fields and images
    // $data = array_merge(
    //     $request->only([
    //         'specialties', 'description', 'ingredients','techniques'
    //     ]),
    //     $imagess // Merge updated image paths
    // );

    $private_dining->update($data);
    
        return response()->json($menu);
    }

    public function deleteMenu(Menu $menu)
    {
        $menu->delete();

        return response()->json(['message' => 'Menu deleted successfully']);
    }
}
