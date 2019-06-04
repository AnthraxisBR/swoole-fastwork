<?php 


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\Sdk\Node;

/**
 * Auto generated class from google-docs-sdk-generator from AnthraxisBR
 */
class Node extends \AnthraxisBR\SwooleFW\CloudServices\GCP\FwGoogleClient
{
	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function GroupsAddNodes($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups/{resourceId}/addNodes', $args);
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
	public function GroupsAggregatedList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/aggregated/nodeGroups', $args);
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
	public function GroupsDelete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function GroupsDeleteNodes($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups/{resourceId}/deleteNodes', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	public function GroupsGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	public function GroupsGetIamPolicy()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups/{resourceId}/getIamPolicy', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 * Initial count of nodes in the node group.
	 */
	public function GroupsInsert($data, string $requestId, int $initialNodeCount)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$queryArgs[] = $initialNodeCount;
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
	public function GroupsList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups', $args);
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
	public function GroupsListNodes($data, int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups/{resourceId}/listNodes', $args);
		$queryArgs = [];
		$queryArgs[] = $maxResults;
		$queryArgs[] = $pageToken;
		$queryArgs[] = $filter;
		$queryArgs[] = $orderBy;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	public function GroupsSetIamPolicy($data)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups/{resourceId}/setIamPolicy', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function GroupsSetNodeTemplate($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups/{resourceId}/setNodeTemplate', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	public function GroupsTestIamPermissions($data)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeGroups/{resourceId}/testIamPermissions', $args);
		$queryArgs = [];
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
	public function TemplatesAggregatedList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/aggregated/nodeTemplates', $args);
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
	public function TemplatesDelete(string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/nodeTemplates/{resourceId}', $args);
		$queryArgs = [];
		$queryArgs[] = $requestId;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->delete($url);
	}


	public function TemplatesGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/nodeTemplates/{resourceId}', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	public function TemplatesGetIamPolicy()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/nodeTemplates/{resourceId}/getIamPolicy', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	/**
	 * An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
	 */
	public function TemplatesInsert($data, string $requestId)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/nodeTemplates', $args);
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
	public function TemplatesList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/nodeTemplates', $args);
		$queryArgs = [];
		$queryArgs[] = $maxResults;
		$queryArgs[] = $pageToken;
		$queryArgs[] = $filter;
		$queryArgs[] = $orderBy;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	public function TemplatesSetIamPolicy($data)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/nodeTemplates/{resourceId}/setIamPolicy', $args);
		$queryArgs = [];
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->post($url, $data->getJson());
	}


	public function TemplatesTestIamPermissions($data)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{region}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/regions/{region}/nodeTemplates/{resourceId}/testIamPermissions', $args);
		$queryArgs = [];
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
	public function TypesAggregatedList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/aggregated/nodeTypes', $args);
		$queryArgs = [];
		$queryArgs[] = $maxResults;
		$queryArgs[] = $pageToken;
		$queryArgs[] = $filter;
		$queryArgs[] = $orderBy;
		$url = $this->parseArgs($url, $queryArgs);
		$url = $this->prepareUrl($url);
		return $this->get($url);
	}


	public function TypesGet()
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$args[] = "{resourceId}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeTypes/{resourceId}', $args);
		$queryArgs = [];
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
	public function TypesList(int $maxResults, string $pageToken, string $filter, string $orderBy)
	{
		$args = [];
		$args[] = "{project}";
		$args[] = "{zone}";
		$url = $this->replaceUri('https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/nodeTypes', $args);
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
