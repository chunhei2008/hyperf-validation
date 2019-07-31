# Hyperf Validation


## About

chunhei2008/hyperf-validation 是对Laravel Validation的移植（不包含门面部分），具体使用方法可以参考Laravel Validation 的使用。

## Install

```
composer require chunhei2008/hyperf-validation

```

## Config


### publish config
```
php bin/hyperf.php  vendor:publish chunhei2008/hyperf-translation

```

### config path

```
your/config/path/autoload/translation.php

```

### config content

```
<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

return [
    'locale'          => 'en',   
    'fallback_locale' => '',
    'lang'            => BASE_PATH . '/resources/lang', 
];

```

### exception handler

```
<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

return [
    'handler' => [
        'http' => [
            \Chunhei2008\Hyperf\Validation\ValidationExceptionHandler::class,
        ],
    ],
];

```

### validation middleware

```
<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

return [
    'http' => [
        \Chunhei2008\Hyperf\Validation\Middleware\ValidationMiddleware::class,
    ],
];

```


## Usage


### gen request

```
php bin/hyperf.php gen:request FooRequest
```


```
class IndexController extends Controller
{
   

    public function foo(FooRequest $request)
    {
        // todo
    }
}


```


## 未完成

* [ ] Auth  
* [ ] ValidationExistsRuleTest 中的单测