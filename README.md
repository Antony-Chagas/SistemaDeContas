## Requisitos 

* PHP 8 ou superior 
* Composer
* Node.js 20 ou superior

## Como rodar o projeto baixado 
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
