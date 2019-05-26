**Swoole Fast Work**

**Iniciando**

Instale o swoole:

https://github.com/swoole/swoole-src/wiki/Installing

Instale o docker, e docker-compose:

   `$ sudo apt install docker.io docker-compose`

Depois: 

   `$ docker-compose up -d`

   `$ ./run.sh`

**Banco de dados**

No arquivo `docker-compose.yml` está um imagem do banco mysql, e está pré-configurado.

Para alterar a configuração de conexão com o banco de dados, acesse o arquivo:

   `config\database.yaml`
  
Qualquer configuração aceita pelo **ORM Doctrine** será aceita.
Veja: 
https://www.doctrine-project.org/projects/doctrine-dbal/en/2.9/reference/configuration.html

**Roteamento**

Para declarar um rota, é necessário apenas inserir no arquivo:

  `config\routes.yaml`
  
Verifique o exemplo, até o momento é aceito apenas um subnivel.

A classe extensão de Action referente a rota declara do arquivo de configuração, e função devem ser declaradas.
Deverá ser criada dentro de:

  `application\actions`
  
**Providers**

O projeto prove o injeção de serviçõs na requisição, que permite alterar, inserir, apagar, ou qualquer coisa, em cima da requisiçãom, antes, durante, ou depois da execução do do código da chamada em sí.

Os providers são divididos a principio em 2 categorias:

fixed_providers

action_providers

Action providers, são os providers que podem ser injetos diretamente no método da sua action, veja os métodos da classe:

  `application\actions\Users.php`
  
Se for um parametro da função indicada na rota, o serviço será injetado.

**GraphQL**

Para declarar que uma rota terá acesso ao recurso, é necessário informar em na configuração no arquigo:
  
  `config\routes.yaml` 
  
Mas também, será necessário criar o 'equivalente' no arquivo:

  `config\graphql-routes.yaml`

Nesse arquivo é necessário uma rota, e o objeto que relacionado.

O Objeto graphql deverá ser criado dentro da uma pasta com nome do Objeto em:

  `database\graphql\{NomeDoObjeto}\{NomeDoObjeto}.php`  

Veja o exemplo de Users existente na pasta.

O objeto precisa ser criado em uma pasta especifica, pois dentro  iremos criar um outr pasta, para os possíveis Fields.

Dentro da pasta:


  `database\graphql\{NomeDoObjeto}\{NomeDoObjeto}\Fields`
  
 Iremos colocar os 'Fields', copie o exemplo de Users\Fields.


Lembrando que, para os Fields serem encontrados, é necessário declarar na routa do arquivo de configurações de rotas graphql.

**Queues \ Tasks**

O uso de tasks é bem simples, e não precisa de nada além do proprio swoole até o momento do projeto. 

Você precisa apenas, criar uma classe dentro da pasta herdada de TaskReceiver:

  `application\tasks`
  
Copie do exemplo.

E o nome da classe + @ + nome da função, serão a assinatura da task, chamada de 'signature'.

Para iniciar a task, é apenas necessário fazer um rota de api que aponte a alguma Action.

No exemplo pode ver que existe uma classe Tasks dentro da pasta `applications\actions`

Para iniciar a classe informe com argumento da função a heranção do TaskManager, e chame a função startTask, assim como no exemplo.

A função startTask vai aceitar até 3 argumentos, sempre arrays sem objetos não serializaveis. 

**TODO**

Muita coisa






