<?php
namespace App\Repositories\Room;

interface RoomRepositoryInterface
{
    /**
     *
     * @return mixed
     */
    public function getRooms();

    public function getRoomsBook();

    public function getRoomsEmpty($request);

    public function getRoomsEmptyRecall($id, $acction);

    public function getRoom($id);

    public function updateRoom($request);

    public function deleteRoom($id);

    public function addRoom($request);

    public function isExist($request);

    // public function getInfoBooking();

    public function finishBooking();

}
