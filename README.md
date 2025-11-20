# Ambiente Docker para WordPress

Este repositório agora possui configuração para rodar o WordPress localmente via Docker.

## Serviços
- **wordpress**: Container com Apache + PHP 8.2 e WordPress (código montado por bind mount).
- **db (MariaDB)**: Banco de dados persistido em volume `db_data`.
- **phpmyadmin**: Interface opcional para administrar o banco (porta 8081).

## Portas
- WordPress: http://localhost:8080
- PhpMyAdmin: http://localhost:8081

## Variáveis principais / Ambiente
Agora usamos um arquivo `.env` (não versionado) para credenciais e configuração.

Passo inicial:
```powershell
copy env.example .env
```
Edite os valores reais no `.env` (principalmente senhas e salts).

Exemplo (trecho simplificado):
```
MYSQL_ROOT_PASSWORD=troque_root
DB_NAME=trentin_db
DB_USER=wpuser
DB_PASSWORD=troque_senha
DB_HOST=db:3306
WORDPRESS_TABLE_PREFIX=trentin_
WORDPRESS_DEBUG=1
```
Gere as chaves/salts em: https://api.wordpress.org/secret-key/1.1/salt/
Substitua os placeholders no `.env`.

## Uso
### Subir containers
```powershell
docker compose up -d
```
Aguarde alguns segundos e acesse http://localhost:8080.

### Ver logs
```powershell
docker compose logs -f wordpress
```

### Derrubar ambiente
```powershell
docker compose down
```
Mantém o volume do banco. Para remover tudo (inclusive dados):
```powershell
docker compose down -v
```

### Recriar após mudanças no Dockerfile
```powershell
docker compose build --no-cache
docker compose up -d
```

### Execução de comandos WP-CLI (opcional)
A imagem oficial não traz WP-CLI; para adicionar, você pode estender o `Dockerfile`:
```Dockerfile
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && php wp-cli.phar --info \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp
```
Depois:
```powershell
docker compose exec wordpress wp core version
```

## Desenvolvimento
O bind mount `.:/var/www/html` permite editar arquivos localmente e ver imediatamente no navegador.

## Produção (exemplo simplificado)
Para gerar uma imagem imutável para produção:
1. Comente o bind mount no serviço `wordpress`.
2. Descomente a linha `COPY . /var/www/html` no `Dockerfile`.
3. Faça build e push para seu registro.
4. Ajuste variáveis via `.env` ou secrets.

## Segurança / Próximos Passos
- Mover senhas para `.env` e adicioná-lo ao `.dockerignore`.
- Configurar backups do volume `db_data`.
- Ativar HTTPS via proxy reverso (Traefik / Nginx + certbot).

## Troubleshooting
- Se a página de instalação não aparecer, remova eventual `wp-config.php` e deixe o instalador gerar um novo.
- Verifique permissões de escrita em `wp-content` (no Windows geralmente OK).
- Logs de erro PHP: `docker compose logs wordpress`.

Bom desenvolvimento!
