# Projet Docker #1

## Initialisation du projet

Pour des raisons d'optimisation de mon espace en local, j'ai voulu build mon application java dans mon container.
J'ai donc modifié le Dockerfile en fonction, pour utiliser gradle 8.5 avec mon jdk 21. Pour l'image java, j'ai utilisé l'image corretta d'amazone : amazonecorretta:21
Je build donc d'abord le projet, puis j'attend que ce build soit completé avant d'executer ma snapshot java.

## Run le projet :

> docker build -t rental-service .

Puis

> docker run -p 8080:8080 rental-service