# TP3

## introduction 

Je réutilise le mini projet php avec Dockerfile pour ce projet Kubernetes.
Il est situé dans ./name

## Mise en place
(après installation de minikube)

> minikube start
![alt text](images/image7.png)

> kubectl get nodes
![alt text](images/image8.png)

> kubectl create deployment app-php --image=bipief/php-app-simple:1
![alt text](images/image9.png)

> kubectl get pods
![alt text](images/image10.png)

> kubectl describe pods
![alt text](images/image11.png)

> kubectl exec -it app-php-857794c797-psvp2 -- /bin/bash
![alt text](images/image12.png)

> kubectl expose deployment app-php --type=NodePort --port=8080
![alt text](images/image13.png)

> minikube service app-php --url
![alt text](images/image14.png)
![alt text](images/image15.png)

> kubectl get deployments