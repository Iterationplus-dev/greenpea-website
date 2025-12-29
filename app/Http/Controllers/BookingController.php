<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function show(\App\Models\Apartment $apartment)
    {
        return view('booking.show', compact('apartment'));
    }

    public function store(Request $request, \App\Models\Apartment $apartment)
    {
        $booking = \App\Models\Booking::create([
            'apartment_id' => $apartment->id,
            'guest_name' => $request->name,
            'guest_email' => $request->email,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pending',
            'amount' => $apartment->price_per_month,
        ]);

        return redirect()->route('booking.thankyou');
    }

    public function pay(\App\Models\Booking $booking)
    {
        return redirect($booking->payment_link);
    }
}

