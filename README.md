
# Fluent

### Installation

`composer require projx-io/fluent`

### Hello World

```php
$greet = function ($greeting, $name) {
    return sprintf("%s, %s!\n", $greeting, $name);
};

// prints "Hello, World!"
echo Fluent('World')->then($greet, 'Hello')         ->call();
echo Fluent::         then($greet, 'Hello', 'World')->call();
echo Fluent::         then($greet, 'Hello')         ->call('World');
echo Fluent::         then($greet)                  ->call('Hello', 'World');

```

