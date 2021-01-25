# Upgrade feasibility study
## Upgrade

Actual version : Laravel 6.0
Target : Laravel 8.0

### 7.0 from 6.0
#### Impact

You can check the changes here : [Upgrading to 7.0 from 6.0](https://laravel.com/docs/7.x/upgrade)

#### To do

Minimal php version : 7.2.5

We probably need to do some modification on the authentication system and update some methods the estimated time to do the upgrade is **15 minutes** according to the docs

### 8.0 from 7.0

#### Impact

You can check the changes here : [Upgrading to 8.0 from 7.0](https://laravel.com/docs/8.x/upgrade)

#### To do

Minimal php version : 7.3.0

Factory system has changed and is not the same in laravel 8 but we can install a legacy package for factories with composer and like previously the upgrading time is around **15 minutes** according to the docs

### Conclusion

With the estimated time by Laravel it will take 30 minutes to upgrade, the php version is not an issue we tested the project on 7.4 with laravel 6.

I think we will need to take more time to upgrading it because we don't know well the project yet