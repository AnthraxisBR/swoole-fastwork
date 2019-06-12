<?php


namespace App\CloudServices\IAM\Roles;


use AnthraxisBR\FastWork\CloudServices\AWS\IAM\Role;
use App\CloudServices\IAM\Accounts\SwooleAwsAccount;

class LambdaBasicExecution extends Role
{

    public $name = 'lambda_basic_execution';

    public $service = 'iam';

    public $account = SwooleAwsAccount::class;

    public $policies;


}