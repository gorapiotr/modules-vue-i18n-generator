# modules-vue-i18n-generator

## Install the package

In your project:
```composer gorapiotr/modules-vue-i18n-generator```

In ```config/app.php``` providers:

```php
GoraPiotr\ModulesVueI18nGenerator\ModulesVueI18NGeneratorServiceProvider::class,
```

Next, publish the package default config:

```
php artisan vendor:publish --provider="GoraPiotr\ModulesVueI18nGenerator\ModulesVueI18NGeneratorServiceProvider"
```

Then generate the include file with
```

php artisan modules-vue-i18n:generate
```

## Module based on: 
https://github.com/martinlindhe/laravel-vue-i18n-generator
