FROM mysql:8

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN mysql -u username -p root myshop < ./myshop.sql