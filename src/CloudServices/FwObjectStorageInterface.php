<?php


namespace AnthraxisBR\SwooleFW\CloudServices;


interface FwObjectStorageInterface
{

    function createFolder(string $foldername);

    function setBody($body);

    function setFilename($key);

    function setTarget($bucket);

    function sendToCloud();

    function getObjectConfig();
}