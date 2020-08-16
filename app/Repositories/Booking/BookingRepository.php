<?php

namespace App\Repositories\Booking;

use App\Repositories\EloquentRepository;
use App\Repositories\Booking\BookingRepositoryInterface;
use App\Repositories\Room\RoomRepository;
use App\BookRoom;
use App\Room;


class BookingRepository extends EloquentRepository implements BookingRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return BookRoom::class;
    }

    public function updateBooking($request)
    {
        $id = $request->id;
        $status = $request->status;
        $user_make = $request->user_email;
        // update bảng đặt phòng
        $booking = ['bookStatus' => $status, 'user_make' => $user_make];
        $update = new BookingRepository;
        $update->update($id, $booking);
        // update lại phòng nếu hủy đơn
        if ($status == 'Hủy đơn') {
            $rooms_name = $request->rooms_name;
            $rooms_name = explode('-', $rooms_name);
            foreach ($rooms_name as $key => $value) {
                if ($value != "") {
                    $id_room = Room::select('id')->where('name', '=', $value)->get();
                    $id_room = (int)$id_room[0]->id;
                    $room = Room::find($id_room);
                    $room->using = 'Sẵn sàng';
                    $room->save();
                }
            }
        }

        return 'Đã cập nhật trạng thái đặt phòng';
    }

    public function updateReceive($request)
    {
        $id = $request->id;
        $user_receive = $request->user_email;
        // Thay đổi trạng thái đơn đặt
        $bookroom = BookRoom::find($id);
        $bookroom->bookStatus = 'Đã nhận phòng';
        $bookroom->user_receive = $user_receive;
        $bookroom->save();
        // Lấy id của phòng từ id của đơn đặt để thay đổi trạng thái phòng
        $rooms_id = BookRoom::select('id_room_list')->where('id', '=', $id)->get();
        $rooms_id = $rooms_id[0]->id_room_list;
        $rooms_id = explode('-', $rooms_id);
        foreach ($rooms_id as $key => $value) {
            if ($value != "") {
                $room = Room::find($value);
                $room->using = 'Đang sử dụng';
                $room->save();
            }
        }

        return 'Đã giao phòng thành công!';
    }

    public function updateRepay($request)
    {
        $id = $request->id;
        $user_repay = $request->user_email;
        // Thay đổi trạng thái đơn đặt
        $bookroom = BookRoom::find($id);
        $bookroom->bookStatus = 'Đã trả phòng';
        $bookroom->user_repay = $user_repay;
        $bookroom->save();
        // Lấy id của phòng từ id của đơn đặt để thay đổi trạng thái phòng
        $rooms_id = BookRoom::select('id_room_list')->where('id', '=', $id)->get();
        $rooms_id = $rooms_id[0]->id_room_list;
        $rooms_id = explode('-', $rooms_id);
        foreach ($rooms_id as $key => $value) {
            if ($value != "") {
                $room = Room::find($value);
                $room->using = 'Chưa sẵn sàng';
                $room->save();
            }
        }

        return 'Đã trả phòng thành công!';
    }


    public function getBookings()
    {
        $bookings = BookRoom::select('name', 'id', 'phone')
            ->where([['status', 'Hoạt động'], ['bookStatus', 'Chưa duyệt'],])
            ->orWhere([['status', 'Hoạt động'], ['bookStatus', 'Chưa xác nhận'],])
            ->get();

        return $bookings;
    }

    public function getRepay(){
        $repay = BookRoom::select('name', 'id', 'phone')
            ->where([['status', 'Hoạt động'], ['bookStatus', 'Đã nhận phòng'],])
            ->get();

        return $repay;
    }

    public function getReceives()
    {
        $receives = BookRoom::select('name', 'id', 'phone')
            ->where([['status', 'Hoạt động'], ['bookStatus', 'Hoàn tất'],])
            ->get();

        return $receives;
    }

    public function getBooking($id)
    {
        $booking = BookRoom::find($id);
        $rooms = $booking->id_room_list;
        $room_ids = explode('-', $rooms);

        $booking->room_name = "";
        foreach ($room_ids as $key => $value) {
            if ($value != "") {
                $room = Room::findOrFail($value);
                $room_name = $room->name;
                $booking->room_name .= "-" . $room_name;
            }
        }

        return $booking;
    }
}
