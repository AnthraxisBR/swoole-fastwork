<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\S3;


use AnthraxisBR\SwooleFW\CloudServices\AWS\ACL;
use AnthraxisBR\SwooleFW\CloudServices\GCP\Storage\StorageClient;
use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\FwObjectStorageInterface;
use AnthraxisBR\SwooleFW\Defining\Required;
use Psr\Http\Message\StreamInterface;


class Bucket implements FwObjectStorageInterface
{

    /**
     * @var ACL
     */
    public $ACL = null;

    /**
     * @var string|resource|StreamInterface
     */
    public $body = null;

    /**
     * @var Required::string
     */
    public $bucket = null;

    /**
     * @var string|null
     */
    public $cache_control = null;


    /**
     * @var string|null
     */
    public $content_disposition = null;


    /**
     * @var string|null
     */
    public $content_enconding = null;


    /**
     * @var string|null
     */
    public $content_language = null;


    /**
     * @var integer
     */
    public $content_length = null;


    /**
     * @var string|null
     */
    public $content_sha256 = null;


    /**
     * @var string|null
     */
    public $content_type = null;


    /**
     * @var integer|string|\DateTime
     */
    public $expires = null;

    /**
     * @var string|null
     */
    public $grant_full_control = null;

    /**
     * @var string|null
     */
    public $grant_read = null;


    /**
     * @var string|null
     */
    public $grant_read_acp = null;


    /**
     * @var
     */
    public $grant_write_acp = null;

    /**
     * @var string|null
     */
    public $key = null;

    /**
     * @var string|null
     */
    public $metadata = null;

    /**
     * @var string|null
     */
    public $object_lock_legal_hold_status = null;

    /**
     * 'GOVERNANCE|COMPLIANCE'
     * @var string|null
     */
    public $object_lock_mode = null;

    /**
     * @var string|null
     */
    public $object_lock_reatain_until_date = null;

    /**
     * @var string|null
     */
    public $request_payer = null;

    /**
     * @var string|null
     */
    public $sse_customer_algorithm = null;

    /**
     * @var string|null
     */
    public $sse_customer_key = null;

    /**
     * @var string|null
     */
    public $sse_customer_keymd5 = null;

    /**
     * @var string|null
     */
    public $sse_kms_key_id = null;

    /**
     * @var string|null
     */
    public $server_side_encryption = null;

    /**
     * @var string|null
     */
    public $source_file = null;

    /**
     * @uses StorageClass
     * @var string |null
     */
    public $storage_class = null;

    /**
     * @var string|null
     */
    public $tagging = null;

    /**
     * @var string|null
     */
    public $website_redirect_location = null;

    /**
     * @var string|null
     */
    public $client;


    /**
     * Bucket constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->body = $content;

        $this->client = new S3();
    }

    /**
     * @param string $foldername
     * @return $this|mixed
     */
    public function createFolder(string $foldername)
    {
        $this->sendToCloud();
        return $this;
    }

    /**
     * @param string $body
     * @return $this|mixed
     */
    public function setBody(string $body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param $name
     * @return $this|mixed
     */
    public function setFilename($name)
    {
        $this->key = $name;
        return $this;
    }

    /**
     * @param $bucket
     * @return $this|mixed
     */
    public function setTarget($bucket)
    {
        $this->bucket = $bucket;
        return $this;
    }

    /**
     * Return a single uploaded object
     * Use $obj['body'] to get content of object
     * @return mixed
     */
    public function uploadObject()
    {
        return $this->client->putObject($this->getObjectConfig());
    }

    /**
     * Return a list of objects
     * Use $obj['body'] to get content of object
     * @return mixed
     */
    public function listObjects()
    {
        return $this->client->listObjects([
            'Bucket' => $this->bucket
        ]);
    }

    /**
     * Return a single object
     * Use $obj['body'] to get content of object
     * @return mixed
     */
    public function getObject()
    {
        return $this->client->listObjects([
            'Bucket' => $this->bucket,
            'Key' => $this->name
        ]);
    }

    /**
     * Remove object from s3
     * @return \Aws\Result
     */
    public function deleteObject()
    {

        return $this->client->deleteObject([
            'Bucket' => $this->bucket,
            'Key' => $this->name
        ]);
    }

    /**
     * Remove full bucekt
     * @return \Aws\Result
     */
    public function deleteFolder()
    {
        return $this->client->deleteBucket($this->bucket);
    }

    public function getObjectConfig() : array
    {
        $config = [];
        foreach ($this as $attr => $value){
            if($attr == 'client'){
                continue;
            }

            if(is_null($value)){
                continue;
            }

            $exp = explode('_', $attr);
            $exp = array_map(function($str){
                return ucfirst($str);
            },$exp);
            $attr = implode('',$exp);
            $config[$attr] = $value;
        }

        return (array) $config;
        /*
        return [
                'ACL' => $this->ACL,
                'Body' => $this->body,
                'Bucket' => $this->bucket, // REQUIRED
                'CacheControl' => $this->cache_control,
                'ContentDisposition' => $this->content_disposition,
                'ContentEncoding' => $this->content_enconding,
                'ContentLanguage' => $this->content_language,
                'ContentLength' => $this->content_length,
                'ContentSHA256' => $this->content_sha256,
                'ContentType' => $this->content_type,
                'Expires' => $this->expires,
                'GrantFullControl' $this->,
                'GrantRead' => '<string>',
                'GrantReadACP' => '<string>',
                'GrantWriteACP' => '<string>',
                'Key' => '<string>', // REQUIRED
                'Metadata' => ['<string>', ...],
                'ObjectLockLegalHoldStatus' => 'ON|OFF',
                'ObjectLockMode' => 'GOVERNANCE|COMPLIANCE',
                'ObjectLockRetainUntilDate' => <integer || string || DateTime>,
                'RequestPayer' => 'requester',
                'SSECustomerAlgorithm' => '<string>',
                'SSECustomerKey' => '<string>',
                'SSECustomerKeyMD5' => '<string>',
                'SSEKMSKeyId' => '<string>',
                'ServerSideEncryption' => 'AES256|aws:kms',
                'SourceFile' => '<string>',
                'StorageClass' => 'STANDARD|REDUCED_REDUNDANCY|STANDARD_IA|ONEZONE_IA|INTELLIGENT_TIERING|GLACIER|DEEP_ARCHIVE',
                'Tagging' => '<string>',
                'WebsiteRedirectLocation' => '<string>',
            ];
        return [
            'Bucket' => $this->bucket,
            'Key' => $this->key,
            'Body' => $this->body
        ];*/
    }
}