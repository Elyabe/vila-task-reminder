<!-- # Logo ou Banner -->
<!-- <p align="center">
   <img src="https://trello-attachments.s3.amazonaws.com/5c3b9c9903d1b107b15a5271/182x42/078f443628a4ad74cafa0b01f44b4a7f/ppclogov1-2.png" alt="PPC Choice" width="280"/>
</p> -->

# :rocket: Vila Task Reminder - API
[![PHP](https://img.shields.io/static/v1?label=PHP&message=7.4&colorA=purple&color=black&logo=PHP&logoColor=white)](https://www.php.net/) [![Laravel](https://img.shields.io/static/v1?label=Laravel&message=v6&colorA=darkred&color=black&logo=Laravel&logoColor=white)](https://laravel.com/) [![ApidocGen](https://img.shields.io/static/v1?label=apiDocGenerator&message=4.8&colorA=pink&color=black&logo=javascript&logoColor=white)](https://github.com/mpociot/laravel-apidoc-generator) [![MySQL](https://img.shields.io/static/v1?label=MySQL&message=5.7&colorA=darkblue&color=black&logo=mysql&logoColor=white)](https://mysql.com/) [![Symfony Doctrine ORM](https://img.shields.io/static/v1?label=Symfony%20Doctrine&message=6.0&colorA=blue&color=black&logo=symfony)](https://www.doctrine-project.org/) [![PHPUnit](https://img.shields.io/static/v1?label=PHPUnit&message=7.0&colorA=blue&color=black&logo=PHP&logoColor=white)](https://phpunit.de/) 

## :book: Overview 
API Rest para agendamento e lembrete de tarefas que permite:
- Cadastro e login de usuários com autenticação via JWT
- Confirmação de cadastro por email;
- Cadastro de tarefas do usuário (nome, data, hora);
- O usuário é informado por email 10 minutos antes da sua tarefa;
- Importação de lista de tarefas por meio de arquivo Excel (.xlsx);

Recursos disponíveis:
- User
    * Registro
    * Verificação de E-mail
    * Atualização
    * Deleção
- Task
    * Agendamento
    * Atualização
    * Exclusão
    * Importação de arquivo excel (.xlsx)
    * **(PLUS)** Agendamento de tarefa compartilhada com outro usuário

Você pode acessar mais detalhes na seção [Documentação](#books-Documentação-da-API).

### Sumário

* [Documentação](#books-Documentação-da-API)
* [Demonstração](#dark_sunglasses-Demonstração-da-aplicação)
* [Problemas](#ghost-Problemas)
* [Contribuição](#balloon-Contribuição)
  * [Limitações](#1-pushpin-Pré-requisitos-e-limitações)
  <!-- * [Fork este repositório e realize alterações](#2-fork_and_knife-Fork-este-repositório-e-realize-alterações) -->
  <!-- * [Planeje e execute testes](#3-clipboard-Planeje-e-execute-testes) -->
  <!-- * [Solicite a incorporação](#4-heavy_check_mark-Solicite-a-incorporação) -->
<!-- * [Autores](#pencil2-Autores) -->


## :books: Documentação da API 
A versão em desenvolvimento da API pode ser acessada pelo endpoint: [http://dev.elyabe.com/api](http://dev.elyabe.com/api).

Os detalhes dos endpoints, todas as rotas, parâmetros e suas respectivas restrições podem ser acessados <b>[aqui](http://dev.elyabe.com/api/doc)</b>. Nela também conta em anexo uma coleção do Postman pronta para uso.

## :dark_sunglasses: Configurando ambiente de desenvolvimento


1. Clone este projeto;
    <pre> git clone [url] </pre>
2. Instale as dependências utilizando o Composer, executando o seguinte comando na raíz do projeto
    <pre> composer install </pre>

3. Configure as variáveis de ambiente execute o seguinte comando também na raíz do projeto
    <pre> cp .env.example .env </pre> 

4. Lance o container com o comando:
    <pre>docker-compose up --build -d</pre>

    A fim de facilitar as tarefas de desenvolvimento, a API está conteineirizada utilizando o <i> docker-compose</i> em três contêineres:

    - **vila-task-reminder**: Conteiner da servidor Apache2 + PHP7
    - **vila-task-reminder-mysql**: Conteiner suporte da base de dados da aplicação
    - **vila-task-reminder-scheduler**: Responsável pelo notificador/lembrete de tarefas de forma antecipada.

    Aguarde até que o docker informe que os contêineres foram lançados com sucesso.

5. Atualize o banco de dados:
    <pre> docker exec -it vila-task-reminder bash</pre>
    Se executado com sucesso, você agora tem acesso ao terminal do ambiente conteineirizado.
    Execute as migrations:
    <pre> php artisan doctrine:migrations:migrate</pre>

    Pronto. A API estará disponível, por padrão, no endereço da [ máquina local na porta 8000](http://localhost:8000).


## :dark_sunglasses: Demonstração da aplicação

Uma vez que, para consumir os recursos da API é necessário que o usuário esteja autenticado e com o e-mail verificado, sua primeira tarefa, será [registrar-se](http://dev.elyabe.com/api/doc#create-an-user);

Um e-mail será enviado ao endereço informado no corpo da requisição contendo informações para que o usuário tenha a conta verificada.


Recomendamos o [Postman](https://www.postman.com/) para realização de requisições. Um arquivo inicial com todas as requisições pode ser baixado a seguir.

<!-- > [Baixe os arquivos do Postman](https://github.com/ppc-choice/dev.api.ppcchoice.ufes.br/tree/master/postman) -->

#### :pushpin: Pré-requisitos e limitações

- Como não há tratamento de níveis de acesso, para este exemplo, só é permitido ao usuário 
alterar e excluir seus próprios dados.


<!-- # :closed_book: Licença -->
# :ghost: Problemas

Fique à vontade para contribuir ou registrar *bugs*. Abra uma *issue* descrevendo o problema e não se esqueça de incluir as etapas para que possamos reproduzi-lo facilmente.

