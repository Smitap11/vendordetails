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
        'orderWebsite',
        'orderUsername',
        'orderPassword',
        'warehouseAddr',
        'orderStreet',
        'orderCity',
        'orderCountry',
        'orderState',
        'orderZipcode',
        'timeToShip',
        'shippingContactEmail',
        'websiteEmail',
        'websiteHowToPlaceOrder',
        'alaska',
        'hawaii',
        'puertoRico',
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
        'shipFollowStatus',
        'shiplemtFollowupEmails',
        'shipFollowTemplates',
        'epgAddress',
        'formStatus',
        'businessId'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';
}
