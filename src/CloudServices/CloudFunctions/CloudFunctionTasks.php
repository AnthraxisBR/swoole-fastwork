<?php


namespace AnthraxisBR\FastWork\CloudServices\CloudFunctions;


use AnthraxisBR\FastWork\System\Zip;
use AnthraxisBR\FastWork\tasks\TasksReceiver;
use Cz\Git\GitRepository;
use PhpZip\ZipFile;

class CloudFunctionTasks extends TasksReceiver
{
    public function cloneGitAndUnzip($gitUrl, $functionName)
    {
        $location = getenv('root_folder') . '/repositories/cloud-functions';
        $repo = GitRepository::cloneRepository($gitUrl, $location);

        $zip = new ZipFile();

        $zip->addDir($repo->getRepositoryPath())
            ->saveAsFile($functionName . '.zip')
            ->close();

    }

}