### Red Social Laravel 7 /

[![Build Status](https://travis-ci.org/patamimbre/sptorrent-api.svg?branch=master)](https://travis-ci.org/patamimbre/sptorrent-api)

#### Introducción 

* **Ruby** como lenguaje de programación.
* **Sinatra** como framework para la API.
* **Puma** como servidor web Rack.
* **MongoDB** como base de datos.
* **Mongoid** como framework ODM (Object-Document-Mapper).
* **Foreman**
* **Rake**
* **Travis CI** para integración continua.
* **Docker** y **Docker Compose**

### Uso

#### Uso básico
* Para correr la aplicación usa `docker-compose up`. 
* Accede a la aplicación en `0.0.0.0`

#### Rutas para el uso de la aplicación

[![Heroku 
Deploy](https://miro.medium.com/max/1400/1*_-vJQqeCmpw-kghDFX8yJw.png)](https://sleepy-brushlands-97842.herokuapp.com/)

Despliegue https://blooming-caverns-15858.herokuapp.com

#### Despliegue en Zeit

Contenedor https://sptorrent-api-rqkodvifnc.now.sh

#### Contenedor en DockerHub

https://hub.docker.com/r/patamimbre/sptorrent-api/

`docker pull patamimbre/sptorrent-api`

#### Despliegue en Azure
Dado que mi aplicación requiere de dos contenedores para funcionar (API y mongodb) **no era posible su correcto despliegue en Zeit o Heroku**. Quedaba claro que necesitaba algo más poderoso, y lo he conseguido creando una máquina virtual. Los pasos están desarrollados en [este documento](https://github.com/patamimbre/IV_Trabajos/blob/master/iaas.md). 

Despliegue final: floral-tree-92.westus.cloudapp.azure.com

#### Funcionamiento

La aplicación se nutre de [](http://www.divxtotal2.net). Cada vez que se realiza una búsqueda, la API busca directamente en esta web los resultados coincidentes y estos son almacenados en la base de datos local. 

Cada uno de los resultados es guardado con un *ID identificativo*. Cuando se accede a */entry/<ID>*, la aplicación busca los enlaces a la serie indicada y los muestra al usuario.

Los resultados son mostrados en una página web muy simple. Si se desean en *JSON* basta con añadir al final de la dirección web **?json=yes**.

#### Documentos para el despliegue y desarrollo de la aplicación.

[PaaS - Despliegue en Heroku](https://github.com/patamimbre/IV_Trabajos/blob/master/paas.md)

[IaaS - Despliegue en Azure](https://github.com/patamimbre/IV_Trabajos/blob/master/iaas.md)

