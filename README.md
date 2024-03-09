# Teste para Empresa Adorei
Teste: construção de uma API para compra de celulares onde será valiado
as boas práticas de programação e dominio do framewirk Laravel

### Instruções para funcionamento da APi 
Para poder rodar a aplicação, clone este repositório, entre na pasta através de um prompt de comando e execute o comando 

```bash
docker-compose up
```
OU através de uma ferramenta grafica como o docker-desktop ou VScode, na sopções relacionadas. Após esses passos, e os containers estarem sendo executados, entre no terminal do container da API Laravel 10, e execute os comandos para inicializar o Ambiente da API como: 
```bash
composer install
```
Posteriormente:
```bash
mv .env.example .env
```
depois execute:
```bash
php artisan migrate
```

Para instalar as dependências e logo em seguida:

docker-compose up
