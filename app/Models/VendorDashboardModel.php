<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorDashboardModel extends Model
{
    protected $table = 'vendordashboardcategory';
    protected $primaryKey = 'categoryId';
    protected $allowedFields = ['categoryName'];

    public function getCategories()
    {
        return $this->findAll();
        
    }
}
