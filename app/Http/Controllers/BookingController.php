<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // Decode JSON strings into arrays
        $data1 = json_decode(file_get_contents(storage_path() . "/json-1.json"), true)['data'];
        $data2 = json_decode(file_get_contents(storage_path() . "/json-2.json"), true)['data'];
        // Iterate over bookings in JSON1 and add workshop info from JSON2
        $result = [];
        foreach ($data1 as $booking) {
            // Find matching workshop in JSON2
            $workshop = null;
            foreach ($data2 as $item) {
                if ($item['code'] == $booking['booking']['workshop']['code']) {
                    $workshop = $item;
                    break;
                }
            }
            // Add booking with workshop info to result
            $result[] = [
                'name' => $booking['name'],
                'email' => $booking['email'],
                'booking_number' => $booking['booking']['booking_number'],
                'book_date' => $booking['booking']['book_date'],
                'ahass_code' => $booking['booking']['workshop']['code'],
                'ahass_name' => $workshop ? $workshop['name'] : '',
                'ahass_address' => $workshop ? $workshop['address'] : '',
                'ahass_contact' => $workshop ? $workshop['phone_number'] : '',
                'ahass_distance' => $workshop ? $workshop['distance'] : 0,
                'motorcycle_ut_code' => $booking['booking']['motorcycle']['ut_code'],
            ];
        }

        // Sort the result array by ahass_distance in ascending order
        usort($result, function ($a, $b) {
            return $a['ahass_distance'] <=> $b['ahass_distance'];
        });

        // Return result as JSON response
        return response()->json([
            'status' => 1,
            'message' => 'Data Successfully Retrieved.',
            'data' => $result,
        ]);
    }
}
