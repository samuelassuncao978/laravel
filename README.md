## Running localing in development

** NOTE: Before beging you will need to obtain an envault command from DEVOPS to successfully install **

1. Install lando from lando.dev
2. run `composer install`
3. run envault command.
4. run `lando start`
5. run `lando install`
6. Goto platform.lndo.site

Username: bradley.r.martin@me.com Password: password

## Running on external domain to test a calendar syncing

6. Run `lando artisan tenants:create --domain=` with specified domain name
7. Set the variable `APP_URL` in `.env` as `https://...` with the domain name
8. Do not forget to provide info at Google APIs Console
9. Update creds in `.env`
10. Go to the domain
