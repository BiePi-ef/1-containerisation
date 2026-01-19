# TP3

## introduction 

Je réutilise le mini projet php avec Dockerfile pour ce projet Kubernetes.
Il est situé dans ./name

## Mise en place
(après installation de minikube)

> minikube start
![alt text](images/image7.png)

## Create a kubernetes deployment from a Docker image

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

## Expose HTTP and HTTPS routes from outside the cluster to services within the cluster

> kubectl expose deployment app-php --type=NodePort --port=8080
![alt text](images/image13.png)

> minikube service app-php --url
![alt text](images/image14.png)
![alt text](images/image15.png)

## Scaling and load balancing

> kubectl get deployments
![alt text](images/image.png)

> kubectl get pods
![alt text](images/image17.png)

> kubectl scale --replicas=2 deployment/app-php
> kubectl get deployments
> kubectl get pods
![alt text](images/image18.png)

## Creating a Service of type LoadBalancer

> kubectl get deployments
![alt text](images/image19.png)

> kubectl get services
> kubectl delete service app-php
![alt text](images/image20.png)
![alt text](images/image21.png)

> kubectl expose deployment app-php --type=LoadBalancer --port=8080
> minikube service app-php --url
![alt text](images/image22.png)

*test in browser*
![alt text](images/image23.png)

## Rolling updates

> kubectl set image deployments/app-php php-app-simple=bipief/php-app-simple:1
> kubectl rollout status deployments/app-php
![alt text](images/image24.png)

> kubectl rollout undo deployments/app-php
-> doesn't work :
![alt text](images/image25.png)

tried :
> kubectl rollout history deployment/app-php
> ![alt text](images/image26.png)
> kubectl rollout undo deployment/app-php --to-revision=0
![alt text](images/image27.png)

=> Le rollout ne marche pas car il n'y a qu'un seul rollout effectué, sur lequel nous nous trouvons actuellement. On ne peut donc pas revenir sur un rollout plus ancient.

## Create a deployment and a service using a yaml file

I imported and updated the yaml files.

> kubectl apply -f myservice-deployment.yml
![alt text](images/image28.png)

> kubectl apply -f myservice-loadbalancing-service.yml
![alt text](images/image29.png)

> kubectl get pods
![alt text](images/image30.png)

