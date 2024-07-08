## About 

This is a Laravel application with Jetstream and Inertia. It is named public, as the public folder is needed in the vps.


# Installing

git clone

composer install

npm i

php artisan key:generate

php artisan migrate --seed (if db exists, delete tables first), otherwise php artisan migrate:refresh --seed

## i18n
npm install vue-i18n@9
npm i @intlify/unplugin-vue-i18n

### Configuration in vite.config.js
import VueI18nPlugin from '@intlify/unplugin-vue-i18n/vite';

```
VueI18nPlugin({
    include: path.resolve(__dirname, 'resources/js/locales/**')
}),
````

## More Information




## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [arnoa69@gmail.com](mailto:arnoa69@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# azm-monolite
