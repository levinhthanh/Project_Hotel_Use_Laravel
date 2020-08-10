<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    /**
     * Lấy các hạng phòng
     * @return mixed
     */
    public function getCategories();

    public function getCategory($id);

    public function add_category($category);

    public function update_category($category);

    public function delete_category($id);
}
