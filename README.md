### Swoole Fast Work 

Este é um projeto que visa prover uma camada de abstração para desenvolvimento de APIs com o Swoole, provendo uma construção baseada em estruturação, assim agilizando o desenvolvimento e a forma de trabalhar.

Pretende prever o multitaks usando coroutines, queues orientada a threads, e também o uso de kubernets como objeto de classe, assim que que estiver 'testável' será criada uma documentação explicando direito o projeto. 

Também pretende integrar nativamente com AWS, GCP, Azure e IBM Cloud.

Atualmente o projeto encontra em fase de esboço.

###Rodando

Primeiro, instale o swoole:

https://github.com/swoole/swoole-src/wiki/Installing

Instale o docker, e docker compose.

Depois rode: 

   `$ docker-compose up -d`

   `$ php start.php`

Teste funcionando:

GraphQL
   `http://127.0.0.1:8101//api/users?graphql={"query": "query { echo(message: \"Hello World\") }" }`

REST
   `http://127.0.0.1:8101//api/users`

### Breve explicação

As rotas serão sempre declaradas no `config/routes.yaml`

As rotas que irão aceitar GraphQL serão sempre declaradas no `config/graphql-routes.yaml`, usa a mesma estrutura das rotas comuns.

Qualquer rota declarada irá apontar para a pasta `application/actions/`, então aponte declare as classes informadas nos arquivos de rotemaneto aqui dentro, aceita subniveis.

Os Providers serãao declarados em `config/providers.yaml`, os providers são executados antes de chegarmos a rotas, e podem ser responsáveis por boa parte do programa.

O banco de dados pode ser configurado em `config/database.yaml`.

O ORM utilizado, é o Doctrine. 

Esse projeto **NÃO** usa o padrão MVC, aqui chamamos a camada de interação de **Action**.





