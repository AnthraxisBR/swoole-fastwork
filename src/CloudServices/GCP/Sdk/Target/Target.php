<?php 


namespace AnthraxisBR\FastWork\CloudServices\GCP\Sdk\Target;

/**
 * Auto generated class from google-docs-sdk-generator from AnthraxisBR
 */
class Target extends \AnthraxisBR\FastWork\CloudServices\GCP\FwGoogleClient
{
	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function HttpProxiesDelete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetHttpProxies/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	public function HttpProxiesGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetHttpProxies/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function HttpProxiesInsert($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetHttpProxies', $args);
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
	public function HttpProxiesList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetHttpProxies', $args);
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
	public function HttpProxiesSetUrlMap($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/targetHttpProxies/{resourceId}/setUrlMap', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function HttpsProxiesDelete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetHttpsProxies/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	public function HttpsProxiesGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetHttpsProxies/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function HttpsProxiesInsert($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetHttpsProxies', $args);
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
	public function HttpsProxiesList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetHttpsProxies', $args);
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
	public function HttpsProxiesSetQuicOverride($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetHttpsProxies/{resourceId}/setQuicOverride', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function HttpsProxiesSetSslCertificates($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/targetHttpsProxies/{resourceId}/setSslCertificates', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function HttpsProxiesSetSslPolicy($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetHttpsProxies/{resourceId}/setSslPolicy', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function HttpsProxiesSetUrlMap($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/targetHttpsProxies/{resourceId}/setUrlMap', $args);
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
	public function InstancesAggregatedList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/aggregated/targetInstances', $args);
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
	public function InstancesDelete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/targetInstances/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	public function InstancesGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/targetInstances/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function InstancesInsert($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/targetInstances', $args);
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
	public function InstancesList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/targetInstances', $args);
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
	public function PoolsAddHealthCheck($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetPools/{resourceId}/addHealthCheck', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function PoolsAddInstance($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetPools/{resourceId}/addInstance', $args);
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
	public function PoolsAggregatedList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/aggregated/targetPools', $args);
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
	public function PoolsDelete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetPools/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	public function PoolsGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetPools/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	public function PoolsGetHealth($data)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetPools/{resourceId}/getHealth', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function PoolsInsert($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetPools', $args);
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
	public function PoolsList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetPools', $args);
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
	public function PoolsRemoveHealthCheck($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetPools/{resourceId}/removeHealthCheck', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function PoolsRemoveInstance($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetPools/{resourceId}/removeInstance', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * New failoverRatio value for the target pool.
	 */
	public function PoolsSetBackup($data, string $requestId, int $failoverRatio)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetPools/{resourceId}/setBackup', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $failoverRatio;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SslProxiesDelete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetSslProxies/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	public function SslProxiesGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetSslProxies/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SslProxiesInsert($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetSslProxies', $args);
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
	public function SslProxiesList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetSslProxies', $args);
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
	public function SslProxiesSetBackendService($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetSslProxies/{resourceId}/setBackendService', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SslProxiesSetProxyHeader($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetSslProxies/{resourceId}/setProxyHeader', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SslProxiesSetSslCertificates($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetSslProxies/{resourceId}/setSslCertificates', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function SslProxiesSetSslPolicy($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetSslProxies/{resourceId}/setSslPolicy', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function TcpProxiesDelete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetTcpProxies/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	public function TcpProxiesGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetTcpProxies/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function TcpProxiesInsert($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetTcpProxies', $args);
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
	public function TcpProxiesList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetTcpProxies', $args);
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
	public function TcpProxiesSetBackendService($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetTcpProxies/{resourceId}/setBackendService', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function TcpProxiesSetProxyHeader($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/global/targetTcpProxies/{resourceId}/setProxyHeader', $args);
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
	public function VpnGatewaysAggregatedList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/aggregated/targetVpnGateways', $args);
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
	public function VpnGatewaysDelete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetVpnGateways/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	public function VpnGatewaysGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetVpnGateways/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function VpnGatewaysInsert($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetVpnGateways', $args);
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
	public function VpnGatewaysList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/targetVpnGateways', $args);
		$queryArgs = [];
		$queryArgs[] = $maxResults;
		$queryArgs[] = $pageToken;
		$queryArgs[] = $filter;
		$queryArgs[] = $orderBy;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}
}
