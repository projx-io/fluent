[![Build Status](https://travis-ci.org/projx-io/fluent.svg?branch=master)](https://travis-ci.org/projx-io/fluent?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/projx-io/fluent/badge.svg?branch=master)](https://coveralls.io/github/projx-io/fluent?branch=master)

# Fluent

### Installation

`composer require projx-io/fluent`

### Hello World

```php
$greet = function ($greeting, $name) {
    return sprintf("%s, %s!\n", $greeting, $name);
};

// prints "Hello, World!"
echo Fluent::with('World')->then($greet, 'Hello')->call();

echo Fluent::then($greet, 'Hello', 'World')->call();

echo Fluent::then($greet, 'Hello')->call('World');

echo Fluent::then($greet)->call('Hello', 'World');

```

