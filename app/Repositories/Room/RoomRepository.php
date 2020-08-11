<?php

namespace App\Repositories\Room;

use App\Repositories\EloquentRepository;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Room;


class RoomRepository extends EloquentRepository implements RoomRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Room::class;
    }

    public function isExist($request)
    {
        $name = $request->name;
        $check = Room::where('name', $name)->where('status', 'Hoạt động')->first();
        if ($check) {
            if ($check->id == $request->id) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deleteRoom($id){
        $room['status'] = 'Đã xóa';
        $delete = new RoomRepository;
        $delete->update($id, $room);
    }

    public function updateRoom($request)
    {
        $id = $request->id;
        $room = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'using' => $request->status
        ];
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $image1 = $image1->store('rooms', 'public');
            $room['image1'] = $image1;
        }
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2 = $image2->store('rooms', 'public');
            $room['image2'] = $image2;
        }
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $image3 = $image3->store('rooms', 'public');
            $room['image3'] = $image3;
        }

        $update = new RoomRepository;
        $update->update($id, $room);
    }

    public function getRooms()
    {
        $rooms = Room::select('id', 'name', 'category_id', 'image1', 'image2', 'image3', 'using')->where('status', 'Hoạt động')->with('category')->get();

        return $rooms;
    }

    public function getRoom($id)
    {
        $room = Room::select('id', 'name', 'category_id', 'using')->where('id', $id)->with('category')->get();

        return $room;
    }

    public function addRoom($request)
    {
        $name = $request->name;
        $category = $request->category;

        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $path = $image1->store('rooms', 'public');
            $image1 = $path;
        }
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $path = $image2->store('rooms', 'public');
            $image2 = $path;
        }
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $path = $image3->store('rooms', 'public');
            $image3 = $path;
        }

        $room =
            [
                'name' => $name,
                'category_id' => $category,
                'image1' => $image1,
                'image2' => $image2,
                'image3' => $image3
            ];
        $create = new RoomRepository;
        $create->create($room);
    }
}
