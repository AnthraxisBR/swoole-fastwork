<?php


namespace AnthraxisBR\FastWork\CloudServices\ObjectStorage;


/**
 * This class represents and ObjectStorage to FastWork
 * It will be representend by service providers in their respectives object instance
 * Interface FwObjectStorageInterface
 * @package AnthraxisBR\FastWork\CloudServices\ObjectStorage
 */
interface FwObjectStorageInterface
{

    /**
     * This function represents any function 'create a folder', in a ObjectStorage tool integrated.
     * @param string $foldername
     * @return mixed
     */
    function createFolder(string $foldername);

    /**
     * Set te content of the file
     * @param $body
     * @return mixed
     */
    function setBody(string $body);

    /**
     * Set te name of the file
     * @param $key
     * @return mixed
     */
    function setFilename($key);

    /**
     * Set o 'path' of the file on the bucket/container
     * @param $bucket
     * @return mixed
     */
    function setTarget($bucket);

    /**
     * This functions represents the action to 'upload' file to server
     * @return mixed
     */
    function uploadObject();

    /**
     * This function represents the action to 'list files' in server
     * @return mixed
     */
    function listObjects();

    /**
     * This function get only one file
     * @return mixed
     */
    function getObject();

    #function deleteObject();

    /**
     * This function represents the action to delete an folder in server
     * @return mixed
     */
    function deleteFolder();

}