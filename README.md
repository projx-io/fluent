
# Fluent

## Installation

composer require projx-io/fluent

## Creating A Stream

There are several ways to start a fluent stream, any of which
will return an object implementing Stream.

1. F()
2. F( $with )
3. F::
4. F::with( $with )
5. Fluent()
6. Fluent( $with )
7. Fluent::
8. Fluent::with( $with )

## Examples

### EqualTo; Fluent Stream; Bound $expect; With $actual
```php
    $stream = Fluent( $actual )->equalTo( $expect );

    $result = call_user_func( $stream );
```

### EqualTo; Fluent Stream; Bound $expect; Without $actual
```php
    $stream = Fluent::equalTo( $expect );

    $result = call_user_func( $stream, $actual );
```

### EqualTo; Fluent Stream; Unbound $expect; Without $actual
```php
    $stream = Fluent::equalTo();

    $result = call_user_func( $stream, $expect, $actual );
```

### EqualTo; Callback Method; Unbound $expect; Unbound $actual

```php
    $callback = EqualTo::bind();
    $result = call_user_func( $callback, $expect, $actual );
```

### EqualTo; Callback Method; Bound $expect; Unbound $actual

```php
    $callback = EqualTo::bind( $expect );
    $result = call_user_func( $callback, $actual );
```

### EqualTo; Callback Method; Bound $expect; Bound $actual

```php
    $callback = EqualTo::bind( $expect, $actual );
    $result = call_user_func( $callback );
```

### EqualTo; Exec Method

```php
    $result = EqualTo::exec( $expect, $actual );
```

### EqualTo; Invoke Method

```php
    $callback = new EqualTo();
    $result = $callback( $expect, $actual );
```
