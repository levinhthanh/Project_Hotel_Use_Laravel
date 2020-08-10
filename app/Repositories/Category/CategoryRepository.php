<?php

namespace App\Repositories\Category;

use App\Repositories\EloquentRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Category;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Category::class;
    }

    public function getCategories(){
        $categories = Category::select('name','id')->where('status','Hoạt động')->get();

        return $categories;
    }

    public function getCategory($id){
        $category = Category::where('id',$id)->get();

        return $category;
    }

    public function add_category($request){
        $name = $request->name;
        $price_hour = $request->price_hour;
        $price_day = $request->price_day;
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $path = $image1->store('categories', 'public');
            $image1 = $path;
        }
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $path = $image2->store('categories', 'public');
            $image2 = $path;
        }
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $path = $image3->store('categories', 'public');
            $image3 = $path;
        }
        $description1 = $request->description1;
        $description2 = $request->description2;
        $description3 = $request->description3;

        $category =
        [
            'name'=>$name,
            'price_hour'=>$price_hour,
            'price_day'=>$price_day,
            'image1'=>$image1,
            'image2'=>$image2,
            'image3'=>$image3,
            'description1'=>$description1,
            'description2'=>$description2,
            'description3'=>$description3
        ];
        $create = new CategoryRepository;
        $create->create($category);
    }

    public function update_category($request){
        $id = $request->id;
        $category = [];

        $name = $request->name;
        $price_hour = $request->price_hour;
        $price_day = $request->price_day;
        $description1 = $request->description1;
        $description2 = $request->description2;
        $description3 = $request->description3;
        $category =
        [
            'name'=>$name,
            'price_hour'=>$price_hour,
            'price_day'=>$price_day,
            'description1'=>$description1,
            'description2'=>$description2,
            'description3'=>$description3
        ];
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $path = $image1->store('categories', 'public');
            $image1 = $path;
            $category['image1'] = $image1;
        }
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $path = $image2->store('categories', 'public');
            $image2 = $path;
            $category['image2'] = $image2;
        }
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $path = $image3->store('categories', 'public');
            $image3 = $path;
            $category['image3'] = $image3;
        }

        $update = new CategoryRepository;
        $update->update($id, $category);
    }

    public function delete_category($id){
        $delete = new CategoryRepository;
        $delete->delete($id);
    }

}

