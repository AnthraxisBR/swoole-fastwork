<?php 


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\Sdk\Health;

/**
 * Auto generated class from google-docs-sdk-generator from AnthraxisBR
 */
class Health extends \AnthraxisBR\SwooleFW\CloudServices\GCP\FwGoogleClient
{
	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function ChecksDelete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/healthChecks/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	public function ChecksGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/healthChecks/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function ChecksInsert($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/healthChecks', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
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
	public function ChecksList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/healthChecks', $args);
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
	public function ChecksPatch($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/healthChecks/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->patch($url, $data->getJson());
	}


	public function ChecksUpdate()
	{
	}
}
