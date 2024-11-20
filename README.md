## Requisitos 

* PHP 8 ou superior 
* Composer

## Como rodar o projeto baixado 
Instalar as dependências

```
composer install
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

Criar a migration

```
php artisan make:migration create_contas_table
```
