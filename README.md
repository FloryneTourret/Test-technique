# Test-technique
Test technique Place2Swap


`composer install`


`docker-compose up`


```
docker-compose exec phpfpm php bin/console d:d:c
docker-compose exec phpfpm php bin/console d:s:c
docker-compose exec phpfpm php bin/console d:s:u --force
docker-compose exec phpfpm php bin/console d:f:l
```

