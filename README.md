# Back-end Challenge - Dictionary
>  This is a challenge by [Coodesh](https://coodesh.com/)

*OBS: A Documentação e o link da publicação do projeto estão no final deste README.md*

## Introdução

Este é um teste para que possamos ver as suas habilidades como Back-end Developer.

Nesse teste você deverá desenvolver um aplicativo para listar palavras em inglês, utilizando como base a API [Free Dictionary API](https://dictionaryapi.dev/). O projeto a ser desenvolvido por você tem como objetivo exibir termos em inglês e gerenciar as palavras visualizadas, conforme indicado nos casos de uso que estão logo abaixo.

[SPOILER] As instruções de entrega e apresentação do challenge estão no final deste Readme (=

### Antes de começar
 
- O projeto deve utilizar a Linguagem específica na avaliação. Por exempo: Python, R, Scala e entre outras;
- Considere como deadline da avaliação a partir do início do teste. Caso tenha sido convidado a realizar o teste e não seja possível concluir dentro deste período, avise a pessoa que o convidou para receber instruções sobre o que fazer.
- Documentar todo o processo de investigação para o desenvolvimento da atividade (README.md no seu repositório); os resultados destas tarefas são tão importantes do que o seu processo de pensamento e decisões à medida que as completa, por isso tente documentar e apresentar os seus hipóteses e decisões na medida do possível.

#### Tecnologias (Back-End):
- API (Node.js, PHP, Ruby, etc) com ou sem uso de frameworks
- Banco de dados (Postgres, MySQL, MongoDB, etc).

Como sugestões, pode criar um banco de dados grátis **MongoDB** usando Atlas: https://www.mongodb.com/cloud/atlas ou banco de dados grátis **MySQL** no Heroku: https://elements.heroku.com/addons/jawsdb ou banco de dados grátis **Postgres** no Heroku: https://elements.heroku.com/addons/heroku-postgresql; (Recomendável usar Drivers oficiais para integração com o DB)

#### Organização:
- Aplicação de padrões Clean Code
- Validação de chamadas assíncronas para evitar travamentos

### Modelo de Dados:

Conforme indicado na documentação da API, a API retorna as informações de uma palavra, tais como etimologia, sinônimos, exemplos de uso, etc. Utilize os campos indicados na documentação dos endpoints para obter os dados necessários.

### Back-End:

Nessa etapa você deverá construir uma API Restful com as melhores práticas de desenvolvimento.

**Obrigatório 1** - Você deverá atender aos seguintes casos de uso:

- Como usuário, devo ser capaz de realizar login com usuário e senha
- Como usuário, devo ser capaz de visualizar a lista de palavras do dicionário
- Como usuário, devo ser capaz de guardar no histórico palavras já visualizadas
- Como usuário, devo ser capaz de visualizar o histórico de palavras já visualizadas
- Como usuário, deve ser capaz de guardar uma palavra como favorita
- Como usuário, deve ser capaz de apagar uma palavra favorita
- Internamente, a API deve fazer proxy da Words API, pois assim o front irá acessar somente a sua API

**Obrigatório 2** - Você deverá desenvolver as seguintes rotas com suas requisições e respostas:

<details open>
<summary>[GET] /</summary>
<p>
Retornar a mensagem "Fullstack Challenge 🏅 - Dictionary"
</p>

```json
{
    "message": "Fullstack Challenge 🏅 - Dictionary"
}
```
</details>
<details open>
<summary>[POST] /auth/signup</summary>

```json
{
    "name": "User 1",
    "email": "example@email.com",
    "password": "test"
}
```

```json
{
    "id": "f3a10cec013ab2c1380acef",
    "name": "User 1",
    "token": "Bearer JWT.Token"
}
```
</details>
<details open>
<summary>[POST] /auth/signin</summary>

```json
{
    "email": "example@email.com",
    "password": "test"
}
```

```json
{
    "id": "f3a10cec013ab2c1380acef",
    "name": "User 1",
    "token": "Bearer JWT.Token"
}
```
</details>
<details open>
<summary>[GET] /entries/en</summary>
<p>
Retornar a lista de palavras do dicionário, com paginação e suporte a busca. O endpoint de paginação de uma busca hipotética deve retornar a seguinte estrutura:
<br/>
[GET]/entries/en?search=fire&limit=4
</p>

```json
{
    "results": [
        "fire",
        "firefly",
        "fireplace",
        "fireman"
    ],
    "totalDocs": 20,
    "page": 1,
    "totalPages": 5, 
    "hasNext": true,
    "hasPrev": false
}
```
</details>
<details open>
<summary>[GET] /entries/en/:word</summary>
<p>
Retornar as informações da palavra especificada e registra o histórico de acesso.
</p>
</details>
<details open>
<summary>[POST] /entries/en/:word/favorite</summary>
<p>
Salva a palavra na lista de favoritas (retorno de dados no body é opcional)
</p> 
</details>
<details open>
<summary>[DELETE] /entries/en/:word/unfavorite</summary>
<p>
Remover a palavra da lista de favoritas (retorno de dados no body é opcional)
</p>
</details> 
<details open>
<summary>[GET] /user/me</summary>
<p>
Retornar o perfil do usúario
</p>
</details> 
<details open>
<summary>[GET] /user/me/history</summary>
<p>
Retornar a lista de palavras visitadas
</p>

```json
{
    "results": [
        {
            "word": "fire",
            "added": "2022-05-05T19:28:13.531Z"
        },
        {
            "word": "firefly",
            "added": "2022-05-05T19:28:44.021Z"
        },
        {
            "word": "fireplace",
            "added": "2022-05-05T19:29:28.631Z"
        },
        {
            "word": "fireman",
            "added": "2022-05-05T19:30:03.711Z"
        }
    ],
    "totalDocs": 20,
    "page": 2,
    "totalPages": 5,
    "hasNext": true,
    "hasPrev": true
}
```
</details> 
<details open>
<summary>[GET] /user/me/favorites</summary>
<p>
Retornar a lista de palavras marcadas como favoritas
</p>

```json
{
    "results": [
        {
            "word": "fire",
            "added": "2022-05-05T19:30:23.928Z"
        },
        {
            "word": "firefly",
            "added": "2022-05-05T19:30:24.088Z"
        },
        {
            "word": "fireplace",
            "added": "2022-05-05T19:30:28.963Z"
        },
        {
            "word": "fireman",
            "added": "2022-05-05T19:30:33.121Z"
        }
    ],
    "totalDocs": 20,
    "page": 2,
    "totalPages": 5,
    "hasNext": true,
    "hasPrev": true
}
```

</details>

Além disso, os endpoints devem utilizar os seguintes códigos de status:
- 200: sucesso com body ou sem body
- 204: sucesso sem body
- 400: mensagem de erro em formato humanizado, ou seja, sem informações internas e códigos de erro:

```json
{
    "message": "Error message"
}
```

**Obrigatório 3** - Você deve criar um script para baixar a lista de palavras do repositório e importar estas palavras para o banco de dados. A API não possui endpoint com a lista de palavras. Para criar seu endpoint será necessário alimentar o seu banco de dados com o [arquivo existente dentro do projeto no Github](https://github.com/dwyl/english-words/blob/master/words_dictionary.json).

**Obrigatório 4** - Salvar em cache o resultado das requisições a API, para agilizar a resposta em caso de buscas com parâmetros repetidos. Sugestões são usar o Redis e/ou MongoDB;

O cache pode ser feito a guardar todo o corpo das respostas ou para guardar o resultado das queries do banco. Para identificar a presença de cache, será necessário adicionar os seguintes headers nas respostas:
- x-cache: valores HIT (retornou dados em cache) ou MISS (precisou buscar no banco)
- x-response-time: duração da requisição em milissegundos

**Diferencial 1** - Descrever a documentação da API utilizando o conceito de Open API 3.0;

**Diferencial 2** - Escrever Unit Tests para os endpoints da API;

**Diferencial 3** - Configurar Docker no Projeto para facilitar o Deploy da equipe de DevOps;

**Diferencial 4** - Deploy em algum servidor, com ou sem automatização do CI.

**Diferencial 5** - Implementar paginação com cursores ao inves de usar page e limit . Ao realizar este diferencial, o retorno dos endpoints deve possuir a seguinte estrutura:

```json
{
    "results": [
        "fire",
        "firefly",
        "fireplace",
        "fireman"
    ],
    "totalDocs": 20,
    "previous": "eyIkb2lkIjoiNTgwZmQxNmjJkOGI5In0",
    "next": "eyIkb2lkIjoiNTgwZmQxNm1NjJkOGI4In0",
    "hasNext": true,
    "hasPrev": true,
}
```


## Readme do Repositório

- Deve conter o título do projeto
- Uma descrição sobre o projeto em frase
- Deve conter uma lista com linguagem, framework e/ou tecnologias usadas
- Como instalar e usar o projeto (instruções)
- Não esqueça o [.gitignore](https://www.toptal.com/developers/gitignore)
- Se está usando github pessoal, referencie que é um challenge by coodesh:  

>  This is a challenge by [Coodesh](https://coodesh.com/)

## Finalização e Instruções para a Apresentação

1. Adicione o link do repositório com a sua solução no teste
2. Adicione o link da apresentação do seu projeto no README.md.
3. Verifique se o Readme está bom e faça o commit final em seu repositório;
4. Envie e aguarde as instruções para seguir. Sucesso e boa sorte. =)

## Suporte

Use a [nossa comunidade](https://discord.gg/rdXbEvjsWu) para tirar dúvidas sobre o processo ou envie uma mensagem diretamente a um especialista no chat da plataforma. 

-------------------------------------------------------------------------------------------

## Documentação

- Após ler todas as instruções, atualizar este README.md, documentar, na medida em que for progredindo.

- Criar a estrutura inicial do projeto em Laravel: `composer create-project laravel/laravel Dictionary-API`

- Por segurança e boa prática, deixar o arquivo .env apenas no repositório local, INCLUINDO a sua referência no .gitignore.

- Remoção do arquivo `database.sqlile` e das referências ao sqlite no arquivo .env, uma vez que usarei o banco de dados grátis MySQL no Heroku.

- Remoção da view padrão `welcome.blade.php`, uma vez que se trata de uma API.

- Instalação do `Laravel Sanctum`: `php artisan install:api`

- Configuração inicial (localhost) do banco de dados mysql `DictionaryAPI`, que foi criado usando o PHPMyAdmin ANTES de alterar as configurações no .env.
Este banco de dados armazenará localmente as informações relativas aos `users` (autenticações) e às `words` ("CRUD").

- Neste ponto pausei o desenvolvimento local, abri uma conta no Heroku e estudei como publicar uma aplicação PHP lá.
Farei mais um _commit_ neste ponto, logo após as "migrations" locais, e então publicarei a aplicação como está neste momento, incompleta, mas funcionando.

- Baixar a lista de palavras e importá-las para o banco de dados local para ter dados para mostrar quando for criar as rotas do "CRUD".

- Hoje, dia 08/12/2024, às 07:44, faltando 2 dias e 7 horas para entregar o projeto (completando-o ou não, pretendo entregar *o melhor que eu conseguir*, dentro do prazo, com alguma margem), o status do que foi feito é resumidamente (mais detalhes podem ser vistos nos commits, analisando o código e testando-o localmente)

-- Como estou buscando um emprego, priorizei publicar o app (mesmo ciente de que ele ainda está incompleto) do que apenas fazê-lo funcionar localmente e deixar o código aqui no Github, pois a publicação de um app tambḿ envolve vários detalhes que acho importantes além do desenvolvimento local.
<img src="/challenge_images/1o deploy para o Heroku além do app exemplo.png">
-- Exportei e importei as tabelas dos bancos de dados local e remoto, mas mesmo tendo importado-as para o BD no Heroku, o app publicado não está funcionando como deveria, como está rodando localmente.
<img src="/challenge_images/MySQL Workbenk acessando o Jawsdb remoto do Heroku.png">
-- Mesmo localmente, o app está funcionando apenas com uma parte do que foi pedido. 
Por exemplo: 
1. O App lista as "words", mas na rota http://localhost:8000/api/words, não na rota sugerida: /entries/en
<!-- <![alt](https://)> -->
<img src="/challenge_images/Captura de tela de 2024-12-08 07-50-56.png">
2. Nem todas as rotas foram implantadas, mas é possível fazer um "CRUD" com as "words"
3. Baixei a lista de palavras, analisei os scripts que estão no repositório indicado, mas não consegui importar a "lista de palavras" para o banco de dados.

-- Mesmo fugindo da estrutura padrão do Laravel, criei a pasta "challenge_images" neste repositório para colocar alguns prints (que serão inseridos neste README.md apenas) e facilitar esta documentação.


## Apresentação

### Link do repositório:
https://github.com/danielramosbh74/coodesh-backend-dictionary

### Link da apresentação:
https://coodesh-backend-dictionary-0ad92ea0ed90.herokuapp.com/

