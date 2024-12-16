<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderProcessingModel extends Model
{
    protected $table = 'orderprocessing';
    protected $primaryKey = 'orderProcessingId';
    protected $allowedFields = [
        'howToPlaceOrder',
        'orderPrimeEmail',
        'websiteUrl',
        'websiteUsername',
        'websitePassword',
        'warehouseAddr',
        'orderStreet',
        'orderCity',
        'orderCountry',
        'orderState',
        'orderZipcode',
        'timeToShip',
        'shippingContactEmail',
        'inventoryHandlingTime',
        'emailEmailId',
        'ftpHost',
        'ftpUsername',
        'ftpPassword',
        'emailHowToPlaceOrder',
        'shippingDestinations',
        'poBoxNo',
        'assgEmailTemp',
        'groundShipment',
        'shippingAcc',
        'ltlShipment',
        'trackingEmail',
        'labelEmail',
        'labelPhoneNo',
        'rrdInvolved',
        'modifiedOn',
        'modifiedBy',
        'cancellationEmail',
        'vendorQueryEmail',
        'orderComments',
        'shippingComments',
        'shipFollowEmails',
        'shipFollowTemplates',
        'epgAddress',
        'formStatus',
        'skuPrefix',
        'businessId'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';
}
