<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS;


class ACL
{
    public const PRIVATE = 'private';
    public const PUBLIC_READ = 'public-read';
    public const PUBLIC_READ_WRITE = 'public-read-write';
    public const AUTHENTICATE_READ = 'authenticate-read';
    public const AWS_EXEC_READ = 'aws-exec-read';
    public const BUCKET_OWNER_READ = 'bucker-owner-full-read';
    public const BUCKET_OWNER_FULL_CONTROL = 'bucket-owner-full-control';
}