# Welcome to Insta App
This is a simple system for Insta Application microservice architecture

# Architecture design
![architecture-design](inosoft-university-registration-Architecture.drawio.png)

# ERD Schema
![ERD](./inosoft-university-registration-ERD.drawio.png)

# Stack used
- [Laravel 5.8.5](https://laravel.com/)
- [Php 8.2](https://www.php.net/) 
- [MongoDB](https://www.mongodb.com/)
- [Redis](https://redis.io/)
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

# How to contribute
1. Fork the repository
2. Create a new branch for your feature
3. Make your changes
4. Commit your changes
5. Push your changes to your branch
6. Create a pull request
7. Wait for review and merge
8. Deploy to production
9. Test and verify
10. Repeat the process

# How to run locally
## Make sure to install all dependencies stack used especially Docker and Docker compose
1. Clone the repository
```bash
$ git clone https://github.com/dijekarim/sevima-insta-app.git
$ cd sevima-insta-app
```

2. Run `docker-compose up` to start the containers
```bash
$ docker compose up --build
```

3. Run migration from container `user-service`
```bash
$ docker compose exec user-service php artisan migrate
```

4. Then, you can use my simple default seeder from `user-service`
```bash
$ docker compose exec user-service php artisan db:seed
```

5. Happy Coding!!!

### Last but no least you can get my sample postman collection [here!](InoSoft.postman_collection.json)