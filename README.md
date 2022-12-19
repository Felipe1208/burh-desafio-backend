<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Sistema de Recrutamento e Seleção

Esta aplicação busca simular um sistema de recrutamento e seleção. 
Desenvolvido com Laravel (v9.19), MySQL (v5.7.22) e Docker.

## Instalação

Primeiro de tudo, você precisa ter o Docker e docker-compose instalado na sua máquina.

Depois disso, clone o repositório em sua máquina, entre na pasta e suba os containers Docker.

```
$ git clone https://github.com/Felipe1208/burh-desafio-backend
$ cd burh-desafio-backend
$ cp .env.example .env
$ docker-compose -f "docker-compose.yml" up -d --build
```

Acesse o container com o seguinte comando:
```
$ docker-compose exec app bash
```

Uma vez dentro do container, rode os seguintes comandos:
```
# Instalar as dependências do projeto
$ composer install

# Gerar uma chave para o projeto
$ php artisan key:generate

# Limpar os caches do sistema
$ php artisan optimize:clear

# Rodar migrations e seeders para criar e popular o banco de dados
$ php artisan migrate --seed
```

Agora você tem sua aplicação rodando em [http://localhost:8989](http://localhost:8989).

## Documentação da API completa

Você pode acessar a documentação completa da API [aqui](https://documenter.getpostman.com/view/24928584/2s8YzZRKqj).

## Testes

Para rodar os testes de integração, basta rodar o seguinte comando dentro do seu container da aplicação (mesmo citado acima):

```
php artisan test
```
