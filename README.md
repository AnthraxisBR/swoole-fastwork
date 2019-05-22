### Swoole Fast Work 

Este é um projeto que visa prover uma camada de abstração para desenvolvimento de APIs com o Swoole, provendo uma construção baseada em estruturação, assim agilizando o desenvolvimento e forma de trabalhar.

Atualmente o projeto encontra em fase de esboço, utilize apenas para brincar.

###Rodando

Primeiro, instale o swoole:

https://github.com/swoole/swoole-src/wiki/Installing

Instale o docker, e docker compose.

Depois rode: 

   `$ docker-compose up -d`

   `$ php start.php`

### Breve explicação

As rotas serão sempre declaradas no `config/routes.yaml`

As rotas que irão aceitar GraphQL serão sempre declaradas no `config/graphql-routes.yaml`, usa a mesma estrutura das rotas comuns.

Qualquer rota declarada irá apontar para a pasta `application/actions/`, então aponte declare as classes informadas nos arquivos de rotemaneto aqui dentro, aceita subniveis.

Os Providers serãao declarados em `config/providers.yaml`, os providers são executados antes de chegarmos a rotas, e podem ser responsáveis por boa parte do programa.

O banco de dados pode ser configurado em `config/database.yaml`.

O ORM utilizado, é o Doctrine. 

Esse projeto **NÃO** usa o padrão MVC, aqui chamamos a camada de interação de **Action**.





