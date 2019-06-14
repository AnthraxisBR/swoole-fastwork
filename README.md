**Swoole Fast Work**

(Incomplete)

Wiki: 

https://github.com/AnthraxisBR/swoole-fastwork/wiki


**Summary**

O FastWork, is a High-level framework, that will allow you to construct full cloud services integrations, tasks/queues, databases, and a lot of kinds of APIs in a easy way.


 1. ORM Doctrine
 2. Router
 3. GraphQL
 4. JSONRPC (under development)
 5. SOAP (under development)
 5. Integration SDK for Google Cloud
 6. Extended SDK for AWS 
 7. Extended SDK for Azure
 8. Service Providers
 9. Queues/Tasks
 10. PAAS Unifier (Multi Cloud Platform Unifier to AWS, GCP and AWS organizaed from clas objects)
  

**Initializing**

**Apache || NGINX**

index.php in folder /public.

**Swoole**

Install swoole:

https://github.com/swoole/swoole-src/wiki/Installing

**DB**

Install docker and docker-compose:

    `$ sudo apt install docker.io docker-compose`

After: 

   `$ docker-compose up -d`

   `$ ./run.sh`

**Routing**

You need to put define routes in file: (TODO: Acept more than one router file)

  `routes\routes.php`
  
    $routes = Route::implements(
        $prefix = 'api',
        $routes =
        [
            (new Multiple(['POST','GET']))
                ->name('\users')
                ->actionPost('Users@store')
                ->actionGet('Users@index')
                ->graphqlEnabled(true)
                )
        ]
   );
 
The class informed in 'action' method, has to be declared on folder:

    `application/actions`
    
Following the rule:

    `{Class}Action extends Actions`
      
**Providers**

You can inhect providers inside the main 'Action' class, to do it, the providers need to be declared on file:

    `config/providers.yaml`

Exists two types of providers:

fixed_providers => Will be called every request

action_providers => Will be called only if the service is a parameters of a action method.

**GraphQL**

To declare a route as 'GraphQL' vsible, you need to inform in they declaration in file routes.php, call method `->graphqlEnabled(true)` on the route will has GraphQL Fields.

To routes whos has method to enable GraphQL called, you can declare a GraphQL route in file:

  `config\GraphQL-routes.yaml`

Exemple:

    routes:
      \users:
        function: graphql
        object: Users
        fields: ['SearchUsers']


GraphQL Object, has to be created folowing:

  `Utils\GraphQL\{GraphQLObjectName}\{GraphQLObjectName}.php`  


Create folder for fields inside GraphQL Object folder:


  `Utils\GraphQL\{NomeDoObjeto}\{NomeDoObjeto}\Fields`
  
 
 Create yout FwFiels inside Fields folder.

See the example files. 

**Queues \ Tasks**


To use queues and tasks, you wil need only to declare de class signature in folder:

 `applcation/tasks`
 
Extendind from TaskReveicer class.

The task signature will follow:

ClassName + '@' + FunctionName

Example for initiate a task:


    public function create(TasksManager $TasksManager, Request $request)
    {
        $TasksManager->signature('Users@insertUser');
        return $TasksManager->startTask($request->getData(),$request->getHeaders(),$request->getServerJson());
    }


**TODO**

Muita coisa






