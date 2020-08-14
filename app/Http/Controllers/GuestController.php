<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;

class GuestController extends Controller
{
    protected $categoryRepository;
    protected $roomRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository,
    RoomRepositoryInterface $roomRepository) {
        $this->categoryRepository = $categoryRepository;
        $this->roomRepository = $roomRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('welcome', compact('categories'));
    }

    public function confirm_info()
    {

        return view('user.confirm');
    }

    public function view_categories()
    {
        $categories = $this->categoryRepository->getAll();
        return view('user.categories', compact('categories'));
    }

    public function view_category($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('user.category', compact('category'));
    }

    public function view_booking(Request $request)
    {
        $checkIn = $request->checkIn;
        $checkOut = $request->checkOut;

        return view('user.booking', compact('checkIn','checkOut'));
    }

    public function view_booking_page()
    {
        if(Session::has('checkIn')){
            $checkIn = Session::get('checkIn');
            $checkOut = Session::get('checkOut');
        }else{
            $checkIn = "";
            $checkOut = "";
        }

        return view('user.booking', compact('checkIn','checkOut'));
    }

    public function check_rooms(Request $request)
    {
        $rooms = $this->roomRepository->getRoomsEmpty($request);
        $infoBooking['Tổng cộng'] = 0;

        return view('user.selection', compact('rooms','infoBooking'));
    }

     public function select_room($id){
        $result = $this->roomRepository->getRoomsEmptyRecall($id, 'add');
        $rooms = $result[0];
        $infoBooking = $result[1];

        return view('user.selection', compact('rooms','infoBooking'));
    }

    public function unselect_room($id){
        $result = $this->roomRepository->getRoomsEmptyRecall($id, 'sub');
        $rooms = $result[0];
        $infoBooking = $result[1];

        return view('user.selection', compact('rooms','infoBooking'));
    }
}
