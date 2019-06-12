<?php


namespace AnthraxisBR\FastWork\CloudServices\AWS\S3;


class StorageClass
{
    public const STANDAND = 'STANDARD';
    public const REDUCED_REDUNDANCY = 'REDUCED_REDUCDANCY';
    public const STANDANR_IA = 'REDUCED_REDUCDANCY';
    public const ONEZONE_IA = 'ONEZONE_IA';
    public const INTELLIGENT_TIERING = 'INTELLIGENT_TIERING';
    public const GLACIER = 'GLACIER';
    public const DEEP_ARCHIVE = 'DEEP_ARCHIVE';
}