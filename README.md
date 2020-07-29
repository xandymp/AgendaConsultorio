# Agenda Consultório

## Pré-requisitos

- Apache
- MySQL
- PHP 7.3

## Inicializando o projeto

Para este projeto o arquivo .env.example está pré-configurado, é necessário personalizá-lo de acordo com o seu ambiente para que funcione corretamente. Faça uma cópia dele renomeie o arquivo para .env e preencha as variáveis conforme necessário para realizar a sua conexão com banco de dados.

Após criar o seu banco de dados e configurar o arquivo .env é preciso executar os seguintes comandos no terminal para que a aplicação funcione corretamente:
- composer install
- php artisan key:generate
- php artisan migrate --seed

Após executar estes comandos basta acessar o endereço configurado para visualizar o sistema funcionando.

Também está disponível uma versão para testes online no endereço http://agendaconsultorio.pe.hu/

## Cadastro de usuário

O cadastro de usuários e realizado utilizando o padrão que o Laravel Framework fornece.
Caso tenha utilizado o seeder criado no projeto é criado o usuário padrão com as seguintes credenciais

usuário: admin@mazzafc.tech
senha: password

## Exclusão de registros no banco de dados

A exclusão de qualquer registro é realizada por meio de softDelete, ou seja, o registro não é de fato excluído da tabela, o que ocorre é que o campo "deleted_at" é carimbado com a data e hora de exclusão.

## API para médicos

Conforme solicitado, abaixo estão as rotas relacionadas a médicos

- /api/medicos GET - (Rota utilizada para listar todos os médicos em ordem alfabética)
- /api/medico/{id} GET - (Rota utilizada para visualizar um médico em específico)
- /api/medico POST - (Rota utilizada para inserir um novo médico)
- /api/medico/{id} PUT - (Rota utilizada para atualizar os dados de um médico)
- /api/medico/{id} DELETE - (Rota utilizada para deletar o registro de um médico)

Para as rotas de INSERT e UPDATE deve-se utilizar um JSON conforme no formato abaixo

```
{
    "nome": "Teste de inserção",
    "email": "mail@mail.com",
    "data_nascimento": "1964-03-18",
    "tipo": 1
}
```

- Para utilização da API diretamente do servidor que está online deve-se utilizar /public/api/{Rota}

## Notas para avaliação

Gostaria e agradecer pela oportunidade oferecida. Também gostaria de me desculpar por não ter utilizado o padrão Git-Flow separando as features em branches durante o desenvolvimento, Quando li o documento não havia notado a segunda página (fiquei empolgado para começar) e como é um projeto de apenas um desenvolvedor não vi a necessidade de separar cada nova feature em branches.

É a primeira vez que faço um teste com prazo tão pequeno, fiquei satisfeito com o resultado apesar do tempo limite ser menor, pois estava habituado ao prazo de uma semana para realizar um teste. Foi uma ótima experiência e espero que gostem do resultado.
