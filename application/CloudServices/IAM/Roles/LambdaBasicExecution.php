<?php


namespace App\CloudServices\IAM\Roles;


use AnthraxisBR\SwooleFW\CloudServices\AWS\IAM\Role;
use App\CloudServices\IAM\Accounts\SwooleAccount;

class LambdaBasicExecution extends Role
{

    public $name = 'lambda_basic_execution';

    public $service = 'iam';

    public $account = SwooleAccount::class;

    public $policies;


}