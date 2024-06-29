<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    public function getReservations()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);
    }

    public function getReservation(Reservation $reservation)
    {
        return response()->json($reservation);
    }

    public function createReservation(Request $request)
    {
        $request->validate([
            'instructions' => 'nullable|string',
            'phone_number' => 'required|string|max:255',
            'online_reservation_link' => 'nullable|url|max:255',
            'hours_of_operation' => 'required|string',
            'corkage_info' => 'required|string',
            'location_address' => 'required|string',
            'directions' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

                // Handle image uploads
                $imagesss = [];
                for ($i = 1; $i <= 5; $i++) {
                    if ($request->hasFile("image$i")) {
                        $path = $request->file("image$i")->store("imagesss");
                        $imagesss["image$i"] = $path;
                    }
                }
        
                $private_dining = Private_dining::create(array_merge(
                    $request->only([
                        'instructions', 'phone_number', 'online_reservation_link', 'hours_of_operation', 'corkage_info', 'location_address', 'directions'
                    ]),
                    $imagesss // Merge uploaded image paths
                ));

        // $reservation = Reservation::create([
        //     'instructions' => $request->instructions,
        //     'phone_number' => $request->phone_number,
        //     'online_reservation_link' => $request->online_reservation_link,
        //     'hours_of_operation' => $request->hours_of_operation,
        //     'corkage_info' => $request->corkage_info,
        //     'location_address' => $request->location_address,
        //     'directions' => $request->directions,
        // ]);


        return $reservation;
    }

    public function editReservation(Request $request, Reservation $reservation)
    {
        $request->validate([
            'instructions' => 'nullable|string',
            'phone_number' => 'required|string|max:255',
            'online_reservation_link' => 'nullable|url|max:255',
            'hours_of_operation' => 'required|string',
            'corkage_info' => 'required|string',
            'location_address' => 'required|string',
            'directions' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if ($request->all() == []) {
        //     return response()->json([
        //         'message' => 'At least one field is required to edit!'
        //     ], 422);
        // }

        // $reservation->update($request->all());

        if ($request->all() == []) {
            return response()->json([
                'message' => 'At least one field is required to edit!'
            ], 422);
        }

        // Handle image uploads
        $imagesss = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("image$i")) {
                $path = $request->file("image$i")->store("imagesss");
                $imagesss["image$i"] = $path;
            }
        }

        // Merge updated fields and images
        $data = array_merge(
            $request->only([
                'instructions', 'phone_number', 'online_reservation_link', 'hours_of_operation', 'corkage_info', 'location_address', 'directions'
            ]),
            $imagesss // Merge updated image paths
        );

        $private_dining->update($data);

        return response()->json($reservation);
    }

    public function deleteReservation(Reservation $reservation)
    {
        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted successfully']);
    }
}
