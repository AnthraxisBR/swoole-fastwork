<?php


namespace App\CloudServices\IAM\Accounts;


use AnthraxisBR\FastWork\CloudServices\IAM\AccountService;

/**
 * Representing AWS account using an class object
 *
 * Class SwooleGCPAccount
 * @package App\CloudServices\IAM
 */
class SwooleGCPAccount extends AccountService
{

    public $AccountName = 'AAA';

    public $AccountKey = '000';

    public $DefaultEndpointsProtocol = 'https';

}