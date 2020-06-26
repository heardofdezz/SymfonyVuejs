# Webimpress Safe Writer

[![Build Status](https://travis-ci.com/webimpress/safe-writer.svg?branch=master)](https://travis-ci.com/webimpress/safe-writer)
[![Coverage Status](https://coveralls.io/repos/github/webimpress/safe-writer/badge.svg?branch=master)](https://coveralls.io/github/webimpress/safe-writer?branch=master)

Write files safely to avoid race conditions when
the same file is written multiple times in a short time period.

## Installation

Using composer:

```console
$ composer require webimpress/safe-writer
```

## Usage

```php
use Webimpress\SafeWriter\FileWriter;

$targetFile = __DIR__ . '/target-file.php';
$content = "<?php\nreturn " . var_export($data, true) . ';';

FileWriter::writeFile($targetFile, $content);
```

If something goes wrong exception (instance of `Webimpress\SafeWriter\Exception\ExceptionInterface`)
will be thrown.
