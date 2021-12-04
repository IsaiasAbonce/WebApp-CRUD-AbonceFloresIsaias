#Instalar la imagen base. 
FROM ubuntu
#Instalar paquetes necesarios: actualizamos y preparamos nuestro Ubuntu.
RUN apt update && apt upgrade -y
#Instalar supervirsord para la manipulación de nuestros servicos a levantar.
RUN DEBIAN_FRONTEND="noninteractive" TZ="America/New_York" apt install -y tzdata supervisor
#Instalar nuestra infraestrucutura LAMP para el despliegue de la web junto con el módulo git.
RUN apt install -y apache2 php php-mysql git

#Crear el Virtualhost de la web y configuración del nuestro root de documentos y del servidor apache.
COPY apache.conf /etc/apache2/sites-available/CRUD-Clientes.conf
RUN mkdir /var/www/html/CRUD-Clientes
#RUN git clone https://github.com/IsaiasAbonce/Simple-CRUD.git
RUN git clone https://github.com/IsaiasAbonce/CRUD-Clientes.git
RUN cp -R ./CRUD-Clientes/* /var/www/html/CRUD-Clientes
#
COPY 000-default.conf /etc/apache2/sites-enabled/000-default.conf

#Habilitar el nuevo Virtualhost ya creado y deshabilitar las configuraciones iniciales de apache. 
RUN /bin/sh -c a2ensite CRUD-Clientes.conf
RUN /bin/sh -c a2dissite 000-default.conf

#Establecer contraseña para el usurio root/administrador de la base de datos.
RUN echo 'mysql-server mysql-server/root_password password root' | debconf-set-selections
RUN echo 'mysql-server mysql-server/root_password_again password root' | debconf-set-selections
#Instalar MySQL bajo las caracteristicas previas.
RUN apt install -qqy mysql-server

#Creación y restauración de la base de datos.
RUN (service mysql start &); sleep 5; mysqladmin -u root -proot create clientes
RUN (service mysql start &); sleep 5; mysql -uroot -proot clientes < CRUD-Clientes/clientes.sql

#Configurar el supervisord indicando el levantameinto de los servicios a usar en la web.
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

#Habilitar y exponer el puerto a usar.
EXPOSE 80

#Levantar/Arrancar los servicios para nuestra web.
CMD ["/usr/bin/supervisord"]
#CMD ["apachectl", "-D", "FOREGROUND"]