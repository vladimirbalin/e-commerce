FROM mysql:8

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY init.sql /docker-entrypoint-initdb.d/

RUN mysql -u$ENV_MYSQL_USER -p$ENV_MYSQL_PASSWORD myshop < ./myshop.sql