# Proxy Manager

This library aims to provide abstraction for generating various kinds of 
  [proxy classes](http://ocramius.github.io/presentations/proxy-pattern-in-php/).

![ProxyManager](https://raw.githubusercontent.com/Ocramius/ProxyManager/917bf1698243a1079aaa27ed8ea08c2aef09f4cb/proxy-manager.png)

[![Build Status](https://travis-ci.org/Ocramius/ProxyManager.png?branch=master)](https://travis-ci.org/Ocramius/ProxyManager)
[![Code Coverage](https://scrutinizer-ci.com/g/Ocramius/ProxyManager/badges/coverage.png?s=ca3b9ceb9e36aeec0e57569cc8983394b7d2a59e)](https://scrutinizer-ci.com/g/Ocramius/ProxyManager/)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/Ocramius/ProxyManager/badges/quality-score.png?s=eaa858f876137ed281141b1d1e98acfa739729ed)](https://scrutinizer-ci.com/g/Ocramius/ProxyManager/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/69fe5f97-b1c8-4ddd-93ce-900b8b788cf2/mini.png)](https://insight.sensiolabs.com/projects/69fe5f97-b1c8-4ddd-93ce-900b8b788cf2)

[![Total Downloads](https://poser.pugx.org/ocramius/proxy-manager/downloads.png)](https://packagist.org/packages/ocramius/proxy-manager)
[![Latest Stable Version](https://poser.pugx.org/ocramius/proxy-manager/v/stable.png)](https://packagist.org/packages/ocramius/proxy-manager)
[![Latest Unstable Version](https://poser.pugx.org/ocramius/proxy-manager/v/unstable.png)](https://packagist.org/packages/ocramius/proxy-manager)


## Documentation

You can learn about the proxy pattern and how to use the **ProxyManager** in the [docs](docs).

## ocramius/proxy-manager for enterprise

Available as part of the Tidelift Subscription.

The maintainer of ocramius/proxy-manager and thousands of other packages are working with Tidelift to deliver commercial support and maintenance for the open source dependencies you use to build your applications. Save time, reduce risk, and improve code health, while paying the maintainers of the exact dependencies you use. [Learn more.](https://tidelift.com/subscription/pkg/packagist-ocramius-proxy-manager?utm_source=packagist-ocramius-proxy-manager&utm_medium=referral&utm_campaign=enterprise&utm_term=repo).

You can also contact the maintainer at ocramius@gmail.com for looking into issues related to this package
in your private projects.

## Installation

The suggested installation method is via [composer](https://getcomposer.org/):

```sh
php composer.phar require ocramius/proxy-manager
```

## Proxy example

Here's how you build a lazy loadable object with ProxyManager using a *Virtual Proxy*

```php
$factory = new \ProxyManager\Factory\LazyLoadingValueHolderFactory();

$proxy = $factory->createProxy(
    \MyApp\HeavyComplexObject::class,
    function (& $wrappedObject, $proxy, $method, $parameters, & $initializer) {
        $wrappedObject = new \MyApp\HeavyComplexObject(); // instantiation logic here
        $initializer   = null; // turning off further lazy initialization
    }
);

$proxy->doFoo();
```

See the [documentation](docs) for more supported proxy types and examples. 
