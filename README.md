# Teste para Empresa Adorei
Teste: construção de uma API para compra de celulares onde será avaliado
as boas práticas de programação e dominio do `Framework Laravel`

#### Tecnologias utilizadas
> `Laravel FrameWork 10`, `Mysql 8`

### Instruções para funcionamento da APi 
Para poder rodar a aplicação, clone este repositório, entre na pasta através de um prompt de comando e execute o comando 

```bash
docker-compose up
```
OU através de uma ferramenta gráfica como o docker-desktop ou VScode, nas opções relacionadas. Após esses passos, e os containers estarem sendo executados, entre no terminal do container da API Laravel 10, e execute os comandos para inicializar o Ambiente da API como: 
```bash
composer install
```
Posteriormente:
```bash
mv .env.example .env
```

> [!CAUTION]
> `Obs:` Como é apenas um teste, as configurações de banco de dados estão no env.example, mas não é uma prática recomendada.

Depois é necessário executar as migrações:
```bash
php artisan migrate
```
Agora para ter dados iniciais, é preciso executar os semeadores.
```bash
php artisan db:seed
```

