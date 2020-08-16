<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Booking\BookingRepositoryInterface;

class EmployeeController extends Controller
{
    protected $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function get_bookings()
    {
        $bookings = $this->bookingRepository->getBookings();

        return response()->json($bookings);
    }

    public function get_booking($id)
    {
        $booking = $this->bookingRepository->getBooking($id);

        return response()->json($booking);
    }

    public function update_booking(Request $request)
    {
        $message = $this->bookingRepository->updateBooking($request);

        return response()->json($message);
    }

    public function get_receive()
    {
        $receives = $this->bookingRepository->getReceives();

        return response()->json($receives);
    }

    public function update_receive(Request $request)
    {
        $message = $this->bookingRepository->updateReceive($request);

        return response()->json($message);
    }

    public function get_repay()
    {
        $repay = $this->bookingRepository->getRepay();

        return response()->json($repay);
    }

    public function update_repay(Request $request)
    {
        $message = $this->bookingRepository->updateRepay($request);

        return response()->json($message);
    }
}

