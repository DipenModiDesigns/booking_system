<?php

namespace App\Http\Controllers;

use App\Models\BookingDetails;
use Illuminate\Http\Request;
use Validator;

class BookingDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = BookingDetails::all()->toArray();
        return $booking; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'booking_type' => 'required',
            'booking_date' => 'required',
            'booking_slot' => 'required',
            'booking_time' => 'required',
        ]);

        if ($validator->fails()) {    
            return response()->json($validator->messages(), 400);
        }

        $errorMsg = [];
        $bookingdata = BookingDetails::get();
        foreach($bookingdata as $booking)
        {
            if(($request->booking_date == $booking->booking_date) && ($request->booking_type == $booking->booking_type))
            {
                if($request->booking_type == 'fullday')
                {
                    return response()->json($errorMsg = 'Please select another date for booking for full day, This day is booked', 400);
                }
                else if($request->booking_type == 'halfday' && ($request->booking_slot == $booking->booking_slot))
                {
                    return response()->json($errorMsg = 'Please select another date for booking for half day, This day is booked', 400);
                }
            }
            else if(($request->booking_date == $booking->booking_date) && ($request->booking_type != $booking->booking_type))
            {
                return response()->json($errorMsg = 'Please select another date for booking, This day is booked', 400);
            }
        }
       
        

        $booking = new BookingDetails;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->booking_type = $request->booking_type;
        $booking->booking_date = $request->booking_date;
        $booking->booking_slot = $request->booking_slot;
        $booking->booking_time = $request->booking_time;
        $booking->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $booking = BookingDetails::find($id);
        return response()->json($booking);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookingDetails $bookingDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'booking_type' => 'required',
            'booking_date' => 'required',
            'booking_slot' => 'required',
            'booking_time' => 'required',
        ]);

        if ($validator->fails()) {    
            return response()->json($validator->messages(), 400);
        }

        $errorMsg = [];
        $bookingdata = BookingDetails::get();
        foreach($bookingdata as $booking)
        {
            if(($request->booking_date == $booking->booking_date) && ($request->booking_type == $booking->booking_type))
            {
                if($request->booking_type == 'fullday')
                {
                    return response()->json($errorMsg = 'Please select another date for booking for full day, This day is booked', 400);
                }
                else if($request->booking_type == 'halfday' && ($request->booking_slot == $booking->booking_slot))
                {
                    return response()->json($errorMsg = 'Please select another date for booking for half day, This day is booked', 400);
                }
            }
            else if(($request->booking_date == $booking->booking_date) && ($request->booking_type != $booking->booking_type))
            {
                return response()->json($errorMsg = 'Please select another date for booking, This day is booked', 400);
            }
        }


        $booking = BookingDetails::find($id);
        $booking->update($request->all());
        return response()->json('Booking updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = BookingDetails::find($id);
        $booking->delete();
        return response()->json('Booking deleted!');
    }
}
