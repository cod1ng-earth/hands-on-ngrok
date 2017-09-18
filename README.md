# ngrok Demo

_[Coding Berlin](https://www.meetup.com/CODING-BERLIN) Hands-On Meetup (2017-09-20)_

**Contents**

- [Intro](#intro)
- [Requirements](#requirements)
- [Setup](#setup)
- [Demos](#demos)
- [Web interface](#web-interface)
- [Links](#links)

### Intro

This is a demo for [ngrok](https://ngrok.com/) tunnels.  
ngrok allows you to expose a web server running on your local machine to the internet via a secure tunnel on a specific port.  
It is an easy tool to setup with just a binary to download and a configuration file to create.

This repository provides an environment for testing ngrok that comes in two flavors: Docker and Vagrant.  
To use it, just [sign up for a free account](https://dashboard.ngrok.com/user/signup) and follow the setup instructions below.  
For some of the demos, e.g. fixed subdomains or reserved domains, you have to sign up for a [paid plan](https://ngrok.com/pricing)   

### Requirements

For usage with Docker:

- Docker CE  
  [HowTo for Ubuntu](https://docs.docker.com/engine/installation/linux/ubuntu/#install-using-the-repository)   
  [HowTo for MacOS](https://docs.docker.com/docker-for-mac/install/) 
- docker-compose  
  [HowTo for Ubuntu](https://docs.docker.com/compose/install/)   
  [HowTo for MacOS](https://docs.docker.com/docker-for-mac/install/) 
  
For usage with Vagrant:

- [Vagrant](https://www.vagrantup.com/downloads.html)
- [VirtualBox](https://www.virtualbox.org/wiki/Downloads)


## Setup

- Clone repository
  ```
  git clone https://github.com/coding-berlin/hands-on-ngrok/
  cd hands-on-ngrok
  ```
  
- Add [your auth token](https://dashboard.ngrok.com/auth) to the config file `ngrok/ngrok.yml`, e.g. 
  ```
  authtoken: 12345pBj8WsoGAZCcmQ2w_7mdXGBj8N5oyZVfaWfwem
  ```

- Run setup 
  - for Docker
    ```
    docker-compose up -d
    ```
  - for Vagrant
    ```
    vagrant up
    ```
    
To verify your installation, open a browser tab
- for Docker setup:  http://localhost/
- for Vagrant setup: [http://192.168.99.99/](http://192.168.99.99/)     

## Demos

To run the demos, you have to open a shell. 

- with Docker
```
docker exec -ti handsonngrok_php-apache_1 /bin/bash
# note: the container name 'handsonngrok_php-apache_1' may be different 
# if you checked out the repository to a different folder 
```
- with Vagrant
```
vagrant ssh
```

#### Start simple HTTP tunnel directly

```
ngrok http 80
```  

#### Start simple HTTP tunnel from config

```
ngrok start test-basic
```  

#### Start HTTPS-only tunnel  

```
ngrok start test-ssl-only
```  

#### Start HTTP tunnel with authentication

When accesing the ngrok URL, a basic authentication dialog i shown.   
Login: `demo`/`secret`

```
ngrok start test-auth
```

#### Start HTTP tunnel with fixed subdomain

You can define a custom fixed subdomain for your tunnel instead of getting a generic URL with a hash.  
**This feature requires a paid plan.**

```
ngrok start test-subdomain
```  

#### Start HTTP tunnel with reserved domain

You can register a custom domain in the ngrok customer backend, e.g. my-tunnel.com.  
After registering the domain, you have to create a CNAME entry for this domain at your provider/in your domain registry service with a ngrok nameserver entry.  
On starting the tunnel, your endpoint will always be your own domain instead of a ngrok URL.       
**This feature requires a paid plan.**

```
ngrok start test-reserved-domain
```  

#### Start HTTP tunnel with reserved wildcard domain

You can also register a custom wildcard domain in the ngrok customer backend, e.g. *.my-tunnel.com.  
After registering the domain, you also have to create a CNAME entry (see example for reserved domain above).  
Then you can define any subdomain based on that wildcard domain for your tunnels and even use those on different servers.       
**This feature requires a paid plan.**

```
ngrok start test-reserved-wildcard-domain
```  

#### Start HTTP tunnel without inspection

```
ngrok start test-no-inspect
```  

#### Start HTTP tunnel with different internal target

Besides the port, you can also define a host (domain or IP) for option `addr`, e.g. `addr: 127.0.0.1:80`

```
ngrok start test-internal-address
```  

#### Start HTTP tunnel with external target

Besides the port, you can also define a host (domain or IP) for option `addr`, e.g. `addr: 192.168.10.1:80` or `addr: www.your-domain.com:80`

```
ngrok start test-external-address
```  

#### Start multiple HTTP tunnels from config

You can start multiple tunnels at once, either pointing to different applications 

```
ngrok start test-basic test-auth test-no-inspect
```  

#### Other options

You can also create tunnels for different ports than 80 (see option `addr`) or even use TCP instead of HTTP (see option `proto`).  

## Web interface

ngrok provides a webinterface to inspect current tunnels:

[http://0.0.0.0:4040](http://0.0.0.0:4040)

## Links

- ngrok website: https://ngrok.com/  
- ngrok configuration: https://ngrok.com/docs#tunnel-definitions
- ngrok service installation: https://ngrok.com/docs/ngrok-link 
