<?php


namespace App\CloudServices\IAM\Accounts;


use AnthraxisBR\SwooleFW\CloudServices\IAM\AccountService;

/**
 * Representing AWS account using an class object
 *
 * Class SwooleAwsAccount
 * @package App\CloudServices\IAM
 */
class SwooleAzureAccount extends AccountService
{

    public $AccountName = 'AAA';

    public $AaccountKey = '000';

    public $DefaultEndpointsProtocol = 'https';

}