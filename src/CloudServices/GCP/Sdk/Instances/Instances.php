<?php 


namespace AnthraxisBR\FastWork\CloudServices\GCP\Sdk\Instances;

/**
 * Auto generated class from google-docs-sdk-generator from AnthraxisBR
 */
class Instances extends \AnthraxisBR\FastWork\CloudServices\GCP\FwGoogleClient
{
	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * The name of the network interface to add to this instance.
	 */
	public function AddAccessConfig($data, string $requestId, string $networkInterface)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/addAccessConfig', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $networkInterface;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * The maximum number of results per page that should be returned. If the number of available results is larger than maxResults, Compute Engine returns a nextPageToken that can be used to get the next page of results in subsequent list requests. Acceptable values are 0 to 500, inclusive. (Default: 500)
	 * Specifies a page token to use. Set pageToken to the nextPageToken returned by a previous list request to get the next page of results.
	 * A filter expression that filters resources listed in the response. The expression must specify the field name, a comparison operator, and the value that you want to use for filtering. The value must be a string, a number, or a boolean. The comparison operator must be either =, !=, >, or <.For example, if you are filtering Compute Engine instances, you can exclude instances named example-instance by specifying name != example-instance.You can also filter nested fields. For example, you could specify scheduling.automaticRestart = false to include instances only if they are not scheduled for automatic restarts. You can use filtering on nested fields to filter based on resource labels.To filter on multiple expressions, provide each separate expression within parentheses. For example, (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake"). By default, each expression is an AND expression. However, you can include AND and OR expressions explicitly. For example, (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND (scheduling.automaticRestart = true).
	 * Sorts list results by a certain order. By default, results are returned in alphanumerical order based on the resource name.You can also sort results in descending order based on the creation timestamp using orderBy="creationTimestamp desc". This sorts results based on the creationTimestamp field in reverse chronological order (newest result first). Use this to sort resources like operations so that the newest operation is returned first.Currently, only sorting by name or creationTimestamp desc is supported.
	 */
	public function AggregatedList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/aggregated/instances', $args);
		$queryArgs = [];
		$queryArgs[] = $maxResults;
		$queryArgs[] = $pageToken;
		$queryArgs[] = $filter;
		$queryArgs[] = $orderBy;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * Whether to force attach the disk even if it's currently attached to another instance.
	 */
	public function AttachDisk($data, string $requestId, \boolean $forceAttach)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/attachDisk', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $forceAttach;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function Delete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * The name of the access config to delete.
	 * The name of the network interface.
	 */
	public function DeleteAccessConfig($data, string $requestId, string $accessConfig, string $networkInterface)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/deleteAccessConfig', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $accessConfig;
		$queryArgs[] = $networkInterface;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * The device name of the disk to detach. Make a get() request on the instance to view currently attached disks and device names.
	 */
	public function DetachDisk($data, string $requestId, string $deviceName)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/detachDisk', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $deviceName;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	public function Get()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	public function GetIamPolicy()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/getIamPolicy', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * Specifies which COM or serial port to retrieve data from.
	 * Returns output starting from a specific byte position. Use this to page through output when the output is too large to return in a single request. For the initial request, leave this field unspecified. For subsequent calls, this field should be set to the next value returned in the previous call.
	 */
	public function GetSerialPortOutput(int $port, \string  $start)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/serialPort', $args);
		$queryArgs = [];
		$queryArgs[] = $port;
		$queryArgs[] = $start;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	public function GetShieldedInstanceIdentity()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/getShieldedInstanceIdentity', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * Specifies instance template to create the instance.This field is optional. It can be a full or partial URL. For example, the following are all valid URLs to an instance template:https://www.googleapis.com/compute/v1/projects/project/global/instanceTemplates/instanceTemplate projects/project/global/instanceTemplates/instanceTemplate global/instanceTemplates/instanceTemplate Authorization requires the following Google IAM permission on the specified resource sourceInstanceTemplate:
	 */
	public function Insert($data, string $requestId, string $sourceInstanceTemplate)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $sourceInstanceTemplate;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * The maximum number of results per page that should be returned. If the number of available results is larger than maxResults, Compute Engine returns a nextPageToken that can be used to get the next page of results in subsequent list requests. Acceptable values are 0 to 500, inclusive. (Default: 500)
	 * Specifies a page token to use. Set pageToken to the nextPageToken returned by a previous list request to get the next page of results.
	 * A filter expression that filters resources listed in the response. The expression must specify the field name, a comparison operator, and the value that you want to use for filtering. The value must be a string, a number, or a boolean. The comparison operator must be either =, !=, >, or <.For example, if you are filtering Compute Engine instances, you can exclude instances named example-instance by specifying name != example-instance.You can also filter nested fields. For example, you could specify scheduling.automaticRestart = false to include instances only if they are not scheduled for automatic restarts. You can use filtering on nested fields to filter based on resource labels.To filter on multiple expressions, provide each separate expression within parentheses. For example, (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake"). By default, each expression is an AND expression. However, you can include AND and OR expressions explicitly. For example, (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND (scheduling.automaticRestart = true).
	 * Sorts list results by a certain order. By default, results are returned in alphanumerical order based on the resource name.You can also sort results in descending order based on the creation timestamp using orderBy="creationTimestamp desc". This sorts results based on the creationTimestamp field in reverse chronological order (newest result first). Use this to sort resources like operations so that the newest operation is returned first.Currently, only sorting by name or creationTimestamp desc is supported.
	 */
	public function List(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances', $args);
		$queryArgs = [];
		$queryArgs[] = $maxResults;
		$queryArgs[] = $pageToken;
		$queryArgs[] = $filter;
		$queryArgs[] = $orderBy;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * The maximum number of results per page that should be returned. If the number of available results is larger than maxResults, Compute Engine returns a nextPageToken that can be used to get the next page of results in subsequent list requests. Acceptable values are 0 to 500, inclusive. (Default: 500)
	 * Specifies a page token to use. Set pageToken to the nextPageToken returned by a previous list request to get the next page of results.
	 * A filter expression that filters resources listed in the response. The expression must specify the field name, a comparison operator, and the value that you want to use for filtering. The value must be a string, a number, or a boolean. The comparison operator must be either =, !=, >, or <.For example, if you are filtering Compute Engine instances, you can exclude instances named example-instance by specifying name != example-instance.You can also filter nested fields. For example, you could specify scheduling.automaticRestart = false to include instances only if they are not scheduled for automatic restarts. You can use filtering on nested fields to filter based on resource labels.To filter on multiple expressions, provide each separate expression within parentheses. For example, (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake"). By default, each expression is an AND expression. However, you can include AND and OR expressions explicitly. For example, (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND (scheduling.automaticRestart = true).
	 * Sorts list results by a certain order. By default, results are returned in alphanumerical order based on the resource name.You can also sort results in descending order based on the creation timestamp using orderBy="creationTimestamp desc". This sorts results based on the creationTimestamp field in reverse chronological order (newest result first). Use this to sort resources like operations so that the newest operation is returned first.Currently, only sorting by name or creationTimestamp desc is supported.
	 */
	public function ListReferrers(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/referrers', $args);
		$queryArgs = [];
		$queryArgs[] = $maxResults;
		$queryArgs[] = $pageToken;
		$queryArgs[] = $filter;
		$queryArgs[] = $orderBy;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function Reset($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/reset', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * Whether the resource should be protected against deletion.
	 */
	public function SetDeletionProtection($data, string $requestId, \boolean $deletionProtection)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setDeletionProtection', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $deletionProtection;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * The device name of the disk to modify. Make a get() request on the instance to view currently attached disks and device names.
	 * Whether to auto-delete the disk when the instance is deleted.
	 */
	public function SetDiskAutoDelete($data, string $requestId, string $deviceName, \boolean $autoDelete)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setDiskAutoDelete', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $deviceName;
		$queryArgs[] = $autoDelete;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	public function SetIamPolicy($data)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setIamPolicy', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SetLabels($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setLabels', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SetMachineResources($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setMachineResources', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SetMachineType($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setMachineType', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SetMetadata($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setMetadata', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SetMinCpuPlatform($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setMinCpuPlatform', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SetScheduling($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setScheduling', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SetServiceAccount($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setServiceAccount', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SetShieldedInstanceIntegrityPolicy($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setShieldedInstanceIntegrityPolicy', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->patch($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SetTags($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/setTags', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	public function SimulateMaintenanceEvent($data)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/simulateMaintenanceEvent', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function Start($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/start', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function StartWithEncryptionKey($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/startWithEncryptionKey', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function Stop($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/stop', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	public function TestIamPermissions($data)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/testIamPermissions', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * The name of the network interface where the access config is attached.
	 */
	public function UpdateAccessConfig($data, string $requestId, string $networkInterface)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/updateAccessConfig', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $networkInterface;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * The name of the network interface to update.
	 */
	public function UpdateNetworkInterface($data, string $requestId, string $networkInterface)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/updateNetworkInterface', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $networkInterface;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->patch($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function UpdateShieldedInstanceConfig($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/updateShieldedInstanceConfig', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->patch($url, $data->getJson());
	}
}
