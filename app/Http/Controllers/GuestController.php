<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Category;

class GuestController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('welcome', compact('categories'));
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
}
