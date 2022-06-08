# Encurtador de URL

## Sobre o projeto

-   Dada uma URL, a aplicação deverá retornar sua versão encurtada. O tamanho da URL encurtada deve ser o menor possível:

    Exemplo: `http://www.uol.com.br/noticias/abc.html -> http://aps.io/Kz78m`

-   Quando uma URL encurtada for acessada no browser, deve ser realizado um redirecionamento para a URL completa.

-   A aplicação permitirá que o cliente escolha (caso deseje e esteja disponível) o nome da URL Encurtada:

    Exemplo: `http://www.uol.com.br/noticias/abc.html -> http://aps.io/noticia-abc`

-   As URLs encurtadas possuem um tempo de expiração padrão (7 dias) e devem ser desativadas
    após o mesmo. Nesse caso, ao acessar uma URL expirada o sistema deve retornar HTTP 404 (not
    found).

## ⚙️ Tecnologias usadas

-   [ Laravel ](https://laravel.com/)

-   [ Livewire ](https://laravel-livewire.com)

-   [ Hash-ids ](https://hashids.org)

-   [ Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze)

-   [ MySQL ](https://www.mysql.com)

## 💻 Pré-requisitos

Antes de começar, verifique se você atendeu aos seguintes requisitos:

-   [PHP ](https://www.php.net/downloads.php#v8.1.1)
-   [Composer](https://getcomposer.org)
-   [ Laravel / Artisan](https://laravel.com/docs/8.x/installation)

Configure as variaves de ambiente em .env

```properties
DB_DATABASE= <database>
DB_USERNAME = <usuario>
DB_PASSWORD = <senha>
```

## 🚀 Iniciando a aplicação localmente

### Para iniciar o projeto, siga estas etapas:

#### Inicie o servidor local

```php
php artisan serv
```

#### Inicie as migrations e seeders:

```sh
php artisan migrate:fresh --seed
```

#### Inicie os schedules:

```sh
php artisan schedule:work
```

## 🔧 Endpoints da aplicação:

### Pagina inicial

```
http://localhost:8080/
```

### Dashboard com lista de links

```
http://localhost:8080/links

Login:
    Email: user@test.com
    Password: password
```

### Redirecionamento para link

```
http://localhost:8080/{slug}
```

### Resultado de encurtamento

```
http://localhost:8080/links/{slug}
```

## 🤝 Colaboradores

Agradecemos às seguintes pessoas que contribuíram para este projeto:

<table>
  <tr>
    <td align="center">
      <a href="github.com/danielnatham">
        <img src="https://avatars.githubusercontent.com/u/68167359?v=4" width="100px;" alt="Foto do Iuri Silva no GitHub"/>
        <br>
        <sub>
          <b>Daniel Nathan</b>
        </sub>
      </a>
    </td>
  </tr>
</table>
