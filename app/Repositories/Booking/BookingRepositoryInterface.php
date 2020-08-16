<?php

namespace App\Repositories\Booking;

interface BookingRepositoryInterface
{
    /**
     *
     * @return mixed
     */

    public function getBookings();

    public function getBooking($id);

    public function updateBooking($request);

    public function getReceives();

    public function updateReceive($request);

    public function getRepay();

    public function updateRepay($request);
}

