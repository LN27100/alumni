# Utiliser une image PHP de base
FROM php:latest

# Définir le répertoire de travail dans le conteneur
WORKDIR /var/www/html

# Copier les fichiers PHP de votre projet dans le conteneur
COPY ./src/ /var/www/html/

# Exposer le port 80 pour le serveur web PHP
EXPOSE 80

# Démarrer le serveur web PHP (dans ce cas, avec le serveur web intégré de PHP)
CMD ["php", "-S", "0.0.0.0:80"]