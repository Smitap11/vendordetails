<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorDashboardModel extends Model
{
    protected $table = 'businessdetails';
    protected $primaryKey = 'businessId';

    public function getAllCategories()
    {
        return $this->db->table('vendordashboardcategory')->select('categoryName')->get()->getResultArray();
    }

    public function getFilteredData($filters)
        {
            $builder = $this->db->table('businessdetails')
                ->join('contactinformation', 'contactinformation.businessId = businessdetails.businessId', 'left')
                ->join('vendorsetting', 'vendorsetting.businessId = businessdetails.businessId', 'left')
                ->select('businessdetails.businessId, 
                        businessdetails.businessUnit, 
                        businessdetails.companyName, 
                        contactinformation.contactEmail AS contactEmail,
                        contactinformation.contactNumber AS contactNumber,
                        businessdetails.businessWebsite AS website, 
                        businessdetails.businessCategory AS category, 
                        vendorsetting.skuPrefix,
                        vendorsetting.vendorManager')
                ->groupBy('businessdetails.businessId'); // Ensure unique businessId rows


            // Apply filters only if they are provided
            if (!empty($filters['companyName'])) {
                $builder->like('businessdetails.companyName', $filters['companyName'], 'both');
            }
            if (!empty($filters['contactNumber'])) {
                $builder->like('contactinformation.contactNumber', $filters['contactNumber'], 'both');
            }
            if (!empty($filters['category'])) {
                $builder->where('businessdetails.businessCategory', $filters['category']);
            }
            if (!empty($filters['vendorManager'])) {
                $builder->where('vendorsetting.vendorManager', $filters['vendorManager']);
            }
            if (!empty($filters['email'])) {
                $builder->like('contactinformation.contactEmail', $filters['email'], 'both');
            }
            if (!empty($filters['sku'])) {
                $builder->like('vendorsetting.skuPrefix', $filters['sku'], 'both');
            }
            if (!empty($filters['website'])) {
                $builder->like('businessdetails.businessWebsite', $filters['website'], 'both');
            }
            if (!empty($filters['businessUnit'])) {
                $builder->where('businessdetails.businessUnit', $filters['businessUnit']);
            }

            log_message('error', 'Model Filters: ' . print_r($filters, true));

            $compiledQuery = $builder->getCompiledSelect();
            $query = $this->db->query($compiledQuery);
            return $query->getResultArray();

        }

    }
