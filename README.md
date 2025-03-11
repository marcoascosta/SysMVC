# SysMVC

## 📌 Informações do Projeto
**SysMVC** é um sistema desenvolvido por **Marco Costa** (**marcocosta@gmx.us**), com código-fonte licenciado sob a **Licença MIT**.

Este software é oferecido de forma gratuita e pode ser utilizado, modificado e distribuído conforme os termos da Licença MIT.

Site do projeto: [https://sysmvc.duckdns.org](https://sysmvc.duckdns.org)

Se você deseja apoiar o desenvolvimento do SysMVC, considere fazer uma doação via PIX para **marcocosta@gmx.us**.

---

## 🚀 Tutorial de Instalação

### ✅ Pré-requisitos
- **PHP 7.4** ou superior
- **Composer** (gerenciador de dependências para PHP)
- **Servidor Web** (Apache ou Nginx)
- **MySQL** ou outro banco de dados compatível

### 🔧 Passo a Passo

#### 1️⃣ Descompacte o Arquivo
Baixe e descompacte o arquivo do SysMVC para o seu ambiente local:

```sh
unzip sysmvc.zip -d sysmvc
cd sysmvc
```

#### 2️⃣ Instale as Dependências
Use o Composer para instalar as dependências do projeto:

```sh
composer install
```

#### 3️⃣ Configure o Ambiente
Copie o arquivo `.env.example` para `.env` e configure suas variáveis de ambiente:

```sh
cp .env.example .env
```

Abra o arquivo `.env` e edite as seguintes linhas com suas informações:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

#### 4️⃣ Ajuste as Permissões
Altere as permissões dos diretórios de armazenamento e cache para garantir que o servidor web possa gravar neles:

```sh
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

#### 5️⃣ Gere a Chave da Aplicação

```sh
php bin/console generate:app-key
```

#### 6️⃣ Execute as Migrações
Execute as migrações para criar as tabelas no banco de dados:

```sh
php bin/console migrate
```

#### 7️⃣ Configure o Servidor Web

##### 📌 Apache
Adicione a seguinte configuração ao seu arquivo de configuração do Apache:

```apache
<VirtualHost *:80>
    ServerName sysmvc.local
    DocumentRoot /caminho/para/sysmvc/public

    <Directory /caminho/para/sysmvc/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

##### 📌 Nginx
Adicione a seguinte configuração ao seu arquivo de configuração do Nginx:

```nginx
server {
    listen 80;
    server_name sysmvc.local;
    root /caminho/para/sysmvc/public;

    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    }
}
```

---

## 📦 Dependências Utilizadas
O projeto utiliza os seguintes pacotes de terceiros, cada um com sua respectiva licença:


### ✅ Pacotes com Licença MIT
1. **Illuminate Database** → [`illuminate/database`](https://github.com/illuminate/database)
2. **Monolog** → [`monolog/monolog`](https://github.com/Seldaek/monolog)
3. **BladeOne** → [`eftec/bladeone`](https://github.com/EFTEC/BladeOne)
4. **Twig** → [`twig/twig`](https://github.com/twigphp/Twig)
5. **Symfony Console** → [`symfony/console`](https://github.com/symfony/console)
6. **Phinx** → [`robmorgan/phinx`](https://github.com/cakephp/phinx)
7. **Defuse Encryption** → [`defuse/php-encryption`](https://github.com/defuse/php-encryption)
8. **Random Compatibility** → [`paragonie/random_compat`](https://github.com/paragonie/random_compat)
9. **Rakit Validation** → [`rakit/validation`](https://github.com/rakit/validation)
10. **Carbon** → [`nesbot/carbon`](https://github.com/briannesbitt/Carbon)
11. **Flysystem** → [`league/flysystem`](https://github.com/thephpleague/flysystem)
12. **Intervention Image** → [`intervention/image`](https://github.com/Intervention/image)
13. **Symfony Cache** → [`symfony/cache`](https://github.com/symfony/cache)
14. **Predis Redis Client** → [`predis/predis`](https://github.com/predis/predis)
15. **PHP Dependency Injection** → [`php-di/php-di`](https://github.com/PHP-DI/PHP-DI)
16. **Symfony Dotenv** → [`symfony/dotenv`](https://github.com/symfony/dotenv)
17. **BladeOne HTML** → [`eftec/bladeonehtml`](https://github.com/EFTEC/BladeOneHTML)
18. **Pecee SimpleRouter** → [`pecee/simple-router`](https://github.com/pecee/pecee-simple-router)
19. **Nyholm PSR7** → [`nyholm/psr7`](https://github.com/Nyholm/psr7)
20. **FakerPHP Faker** → [`fakerphp/faker`](https://github.com/FakerPHP/Faker)
21. **Symfony Mailer** → [`symfony/mailer`](https://github.com/symfony/mailer)



---

## 📜 Termos de Uso
Este projeto está licenciado sob a **Licença MIT**.

Você pode usar, copiar, modificar, fundir, publicar, distribuir, sublicenciar ou vender cópias do Software, desde que a licença e a nota de copyright sejam incluídas em todas as cópias ou partes substanciais do Software.

O Software é fornecido "no estado em que se encontra", sem garantias de qualquer tipo. Para mais detalhes, consulte a [Licença MIT](LICENSE).

Para mais informações, entre em contato: **marcocosta@gmx.us**

---

© 2025 Marco Costa - Todos os direitos reservados sob a Licença MIT.

