<h1 align="center">
    <img src="http://cdn.florian.ec/plum-logo.svg" alt="Plum" width="300">
</h1>

> PlumDate provides date and time converters for Plum. Plum is a data processing pipeline for PHP.

[![Build Status](https://travis-ci.org/plumphp/plum-date.svg)](https://travis-ci.org/plumphp/plum-date)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/plumphp/plum-date/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/plumphp/plum-date/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/plumphp/plum-date/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/plumphp/plum-date/?branch=master)

Developed by [Florian Eckerstorfer](https://florian.ec) in Vienna, Europe.


Installation
------------

You can install PlumDate using [Composer](http://getcomposer.org).

```shell
$ composer require plumphp/plum-date
```


Usage
-----

Please refer to the [Plum documentation](https://github.com/plumphp/plum/blob/master/docs/index.md) for more
information.

Currently PlumDate contains converters to convert strings and timestamps into `DateTime` objects and to convert
`DateTime` objects into strings and timestamps and filters to detect whether a date is before or after a certain point
in time.

### Overview

**Converters**

- [`DateTimeToStringConverter`](#DateTimeToStringConverter)
- [`DateTimeToTimestampConverter`](#DateTimeToTimestampConverter)
- [`StringToDateTimeConverter`](#StringToDateTimeConverter)
- [`TimestampToDateTimeConverter`](#TimestampToDateTimeConverter)

**Filters**

- [`BeforeFilter`](#beforefilter)

### `DateTimeToStringConverter`

`Plum\PlumDate\DateTimeToStringConverter` converts a `DateTime` object into a string. The format of the string has to
be passed to the constructor.

```php
use Plum\PlumDate\DateTimeToStringConverter;

$converter = new DateTimeToStringConverter('y-m-d H:i:s');
$converter->convert(new DateTime()); // -> e.g., "2015-10-21 19:28:00"
```

### `DateTimeToTimestampConverter`

`Plum\PlumDate\DateTimeToTimestampConverter` converts a `DateTime` object into a timestamp.

```php
use Plum\PlumDate\DateTimeToTimestampConverter;

$converter = new DateTimeToTimestampConverter();
$converter->convert(new DateTime()); // -> e.g., 1445448480
```

### `StringToDateTimeConverter`

`Plum\PlumDate\StringToDateTimeConverter` takes a string and returns a `DateTime` object. The constructor takes an
optional `DateTimeZone` object that is passed to the `DateTime` constructor.

```php
use Plum\PlumDate\StringToDateTimeConverter;

$converter = new StringToDateTimeConverter();
$converter->convert('2015-10-21 19:28:00'); // -> DateTime

$converter = new StringToDateTimeConverter(new DateTimeZone('Europe/Vienna'));
$converter->convert('2015-10-21 19:28:00'); // -> DateTime
```

### `TimestampToDateTimeConverter`

`Plum\PlumDate\TimestampToDateTimeConverter` takes a timestamp and returns a `DateTime` object. An instance of
`DateTimeZone` can be passed to the constructor, which will be used to instantiate the `DateTime` object.

```php
use Plum\PlumDate\TimestampToDateTimeConverter;

$converter = new TimestampToDateTimeConverter();
$converter->convert(1445448480); // -> DateTime

$converter = new TimestampToDateTimeConverter(new DateTimeZone('Europe/Vienna'));
$converter->convert(1445448480); // -> DateTime
```

### `BeforeFilter`

`Plum\PlumDate\BeforeFilter` returns `true` for all dates that are before a given date.

```php
use Plum\PlumDate\BeforeFilter;

$filter = new BeforeFilter(new DateTime('2015-10-21 19:28'));
$filter->filter(new DateTime('1955-11-12 18:38')); // -> true
$filter->filter(new DateTime('2015-10-26 21:00')); // -> false

// Same date as in constructor:
$filter->filter(new DateTime('2015-10-21 19:28')); // -> false
```


Change Log
----------

*No version released yet.*


License
-------

The MIT license applies to plumphp/plum-date. For the full copyright and license information,
please view the LICENSE file distributed with this source code.
