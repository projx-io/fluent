[![Build Status](https://travis-ci.org/projx-io/fluent.svg?branch=master)](https://travis-ci.org/projx-io/fluent?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/projx-io/fluent/badge.svg?branch=master)](https://coveralls.io/github/projx-io/fluent?branch=master)

# Fluent

### Installation

`composer require projx-io/fluent`

### Hello World

```php
// Requires two parameters.
function greet($greeting, $name) {
    return sprintf("%s, %s!\n", $greeting, $name);
}

// Creates a stream with 'World'.
// $stream is a stream node, which is a callable value.
// This particular node is a 'with' node, and will return
// the value 'World' when the stream is executed.
// If call() is called directly on this node, then 'World'
// will be the result. Otherwise, 'World' will be passed as
// a parameter to the next node.
$stream = Fluent('World');

// Creates a stream node whose callback is 'greet',
// and has a bound parameter of 'Hello'.
// 'Hello' will be provided as the first parameter to `greet`.
// In this particular stream, the value of 'World' returned
// from the previous node will be provided as the second
// parameter to this node.
$stream = $stream->then('greet', 'Hello');

// Executes the stream then prints the returned value of
// "Hello, World!"
echo $stream->call();
```

### Array Map Example
```
// adds two to a second parameter.
$offset = F::plus(2);
// results in 17
$offset->call(15);

// results in [3, 4, 5, 6, 7]
$items = F([1, 2, 3, 4, 5])
    ->map($offset)
    ->toArray();
```

### Array Filter Example
```
// adds two to a parameter
$filter = F::plus(2)->moreThan(4);
// results in true, since 3+2 > 4 -> true
$filter->call(3);
// results in false, since 2+2 > 4 -> false
$filter->call(2);

// results in [3, 4, 5]
$items = F([1, 2, 3, 4, 5])
    ->filter($filter)
    ->toArray();
```

### Object Example
```
$stream = F::object([
    'name' => F()->name,            // get object's name
    'generation' => F::if(          // if/then/else
        F()->age->moreThan(21),     // condition of object's age being more than 21
        F('Old Geezer!'),           // when true
        F('Just a baby!')           // when false
    ),
]);

// Results in {"name":"Steve","generation":"Old Geezer!"}
$stream->call((object)['name'=>'Steve', 'age'=>32]);

// Results in {"name":"Stacey","generation":"Just a baby!"}
$stream->call((object)['name'=>'Stacey', 'age'=>20]);
```

### Array Example
```
$stream = F::map(
        F::plus(2)->times(-1)
    )[1]
    ->equalTo(-5);

// Results in true, since (3+2)*(-1) -> -5
$stream->call([2, 3, 4]);

// Results in false, since (-3+2)*(-1) -> 1
$stream->call([2, -3, 4]);
```

If you don't want to use a fluent stream, that's fine too.

### Callback example
```
// Results in [4, 5, 6]
array_map(Plus::bind(2), [2, 3, 4]);
```

## Registering Methods

### Unbound
```
Fluent::registerMethods([
    'someMethod' => new ConstantCallbackFactory(function () {
        return ...
    }),
]);

Fluent::then(...)->someMethod();
```

### Bound
```
Fluent::registerMethods([
    'someMethod' => new BindCallbackFactory(new ConstantCallbackFactory(function ($a, $b) {
        return ...
    })),
]);

Fluent::then(...)->someMethod($a, $b);
```

## List of methods

A list of methods can be found in the [Fluent](https://github.com/projx-io/fluent/blob/master/src/Fluent.php) class.
