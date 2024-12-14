# Sistema controle de contas 💲💲
**Staus do projeto: Em desenvolvimento ⚠️** <br>
**Em breve:** Compo de pesquisa, paginação e inclução do status da conta.

## Descrição do Projeto 📰
Sistema completo para controle de contas.

## Requisitos 🪄

 * PHP 8 ou superior
 * Servidor local (Ex: xammp)
 * Composer
 * Node.js 20 ou superior

## Tecnologias utilizadas 🖥
 * XAMPP Foi utilizada a versão 3.3.0, utilizado para ativar o servidor local e uso do PHP e banco de dados.
 * PHP 8: Foi utilizada a versão PHP 8.2.12, utilizado para criação do do BackEnd do projeto.
 * bootstrap: Foi utilizada a versão 5.3, utilizado para configuração do front, deixando o sistema mais funcional e mais profissional
 * MySQL: Banco utilizado na aplicação.
 * Composer: Utilizado para instalação do Framework laravel.
 * Framework laravel Foi utilizada a versão 11x.
 * Node.js 20.

## Como rodar o projeto baixado 🎡
Instalar as dependências PHP
```
composer install
```
Instalar as dependências Node.Js
```
nmp install
```
Duplicar o arquivo ".env.example" e renomear para ".env"
Gerar a chave
```
php artisan key:generate
```

Executar as migration
```
php artisan migrate
```

Inicar o prjeto com laravel 
```
php artisan serve
http://127.0.0.1:8000/
```

## Criar a migration

```
php artisan make:migration create_contas_table
```

Criar seed, dados de teste para o sistema
```
php artisan make:seeder ContasSeeder
```
Executar as seed
```
php artisan db:seed
```

## Layout
Executar as bibliotecas Node.Js
```
npm run dev
```
Instalar o bootstrap 
```
npm i --save bootstrap @popperjs/core
```
Instalar sass, extenção css
```
npm i --save-dev sass
```


## Funcionalidades do projeto 🛠️

 * Cadastrar contas com informações de nome, valor, valor.
 * Editar contas para atualizar suas informações.
 * Excluir contas para removê-las da lista.
 * Listar contas exibindo o nome, valor, valor.
 * Visualiar contas para ver todos os detalhes.

## Banco de dados 🎲
 * Configure a conexão com o banco de dados no arquivo .env localizado na raiz do projeto. <br>
   Exemplo de configuração:
   ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=contas
    DB_USERNAME=root
    DB_PASSWORD=
   ```
