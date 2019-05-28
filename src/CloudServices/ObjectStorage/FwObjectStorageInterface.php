<?php


namespace AnthraxisBR\SwooleFW\CloudServices\ObjectStorage;


interface FwObjectStorageInterface
{

    function createFolder(string $foldername);

    function setBody($body);

    function setFilename($key);

    function setTarget($bucket);

    function uploadObject();

    function listObjects();

    function getObject();

    #function deleteObject();

    function deleteFolder();

}