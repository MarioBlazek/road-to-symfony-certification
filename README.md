# Road to Symfony certification

**Welcome to the repository dedicated to help you with the Symfony certification exam, based on Symfony 6.**

## Table of Contents

* [Introduction](#introduction)
    * [Why this repo?](#why-this-repo)
    * [Features](#features)
* [Exam Topics](#exam-topics)
    * [PHP](#php)
    * [HTTP](#http)
    * [Symfony Architecture](#symfony-architecture)
    * [Controllers](#controllers)
    * [Routing](#routing)
    * [Templating with Twig](#templating-with-twig)
    * [Forms](#forms)
    * [Data Validation](#data-validation)
    * [Dependency Injection](#dependency-injection)
    * [Security](#security)
    * [HTTP Caching](#http-caching)
    * [Console](#console)
    * [Automated Tests](#automated-tests)
    * [Miscellaneous](#miscellaneous)
* [About the Exam](#about-the-exam)
* [Changelog](#changelog)
* [Contributing](#contributing)
* [Thanks](#thanks)
* [About the author](#about-the-author)
* [License](#license)

## Introduction


### Why this repo?


### Features



## Exam Topics


### PHP

* PHP API up to PHP 8.1 version
* Object Oriented Programming
* Namespaces
* Interfaces
* Anonymous functions and closures
* Abstract classes
* Exception and error handling
* Traits
* PHP extensions
* SPL

### HTTP

* Client / Server interaction
* Status codes
* HTTP request
* HTTP response
* HTTP methods
* Cookies
* Caching
* Content negotiation
* Language detection
* Symfony HttpClient component

### Symfony Architecture

* Symfony Flex
* License
* Components
* Bridges
* Code organization
* Request handling
* Exception handling
* Event dispatcher and kernel events
* Official best practices
* Release management
* Backward compatibility promise
* Deprecations best practices
* Framework overloading
* Release management and roadmap schedule
* Framework interoperability and PSRs
* Naming conventions

### Controllers

* Naming conventions
* The base AbstractController class
* The request
* The response
* The cookies
* The session
* The flash messages
* HTTP redirects
* Internal redirects
* Generate 404 pages
* File upload
* Built-in internal controllers

### Routing

* Configuration (YAML, XML, PHP & attributes/annotations)
* Restrict URL parameters
* Set default values to URL parameters
* Generate URL parameters
* Trigger redirects
* Special internal routing attributes
* Domain name matching
* Conditional request matching
* HTTP methods matching
* User's locale guessing
* Router debugging

### Templating with Twig

* Twig syntax up to 3.3 version
* Auto escaping
* Template inheritance
* Global variables
* Filters and functions
* Template includes
* Loops and conditions
* URLs generation
* Controller rendering
* Translations and pluralization
* String interpolation
* Assets management
* Debugging variables

### Forms

* Forms creation
* Forms handling
* Form types
* Forms rendering with Twig
* Forms theming
* CSRF protection
* Handling file upload
* Built-in form types
* Data transformers
* Form events
* Form type extensions

### Data Validation

* PHP object validation
* Built-in validation constraints
* Validation scopes
* Validation groups
* Group sequence
* Custom callback validators
* Violations builder

### Dependency Injection

* Service container - [https://symfony.com/doc/current/service_container.html](https://symfony.com/doc/current/service_container.html)
* Built-in services
* Configuration parameters
* Services registration
* Tags - [https://symfony.com/doc/current/service_container/tags.html](https://symfony.com/doc/current/service_container/tags.html)
* Semantic configuration
* Factories - [https://symfony.com/doc/current/service_container/factories.html](https://symfony.com/doc/current/service_container/factories.html)
* Compiler passes - [https://symfony.com/doc/current/service_container/compiler_passes.html](https://symfony.com/doc/current/service_container/compiler_passes.html)
* Services autowiring - [https://symfony.com/doc/current/service_container/autowiring.html](https://symfony.com/doc/current/service_container/autowiring.html)

### Security

* Authentication - [https://symfony.com/doc/current/security.html#authenticating-users](https://symfony.com/doc/current/security.html#authenticating-users)
* Authorization - [https://symfony.com/doc/current/security.html#access-control-authorization](https://symfony.com/doc/current/security.html#access-control-authorization)
* Configuration - [https://symfony.com/doc/current/reference/configuration/security.html](https://symfony.com/doc/current/reference/configuration/security.html)
* Providers - [https://symfony.com/doc/current/security.html#loading-the-user-the-user-provider](https://symfony.com/doc/current/security.html#loading-the-user-the-user-provider)
* Firewalls - [https://symfony.com/doc/current/security.html#the-firewall](https://symfony.com/doc/current/security.html#the-firewall)
* Users - [https://symfony.com/doc/current/security.html#the-user](https://symfony.com/doc/current/security.html#the-user)
* Password hashers - [https://symfony.com/doc/current/security.html#registering-the-user-hashing-passwords](https://symfony.com/doc/current/security.html#registering-the-user-hashing-passwords)
* Roles - [https://symfony.com/doc/current/security.html#roles](https://symfony.com/doc/current/security.html#roles)
* Access Control Rules - [https://symfony.com/doc/current/security/access_control.html](https://symfony.com/doc/current/security/access_control.html)
* Authenticators - [https://symfony.com/doc/current/security/custom_authenticator.html](https://symfony.com/doc/current/security/custom_authenticator.html)
* Voters and voting strategies - [https://symfony.com/doc/current/security/voters.html](https://symfony.com/doc/current/security/voters.html)

### HTTP Caching

#### General read about HTTP caching
* [https://www.mnot.net/cache_docs/](https://www.mnot.net/cache_docs/)
* [https://csswizardry.com/2019/03/cache-control-for-civilians/](https://csswizardry.com/2019/03/cache-control-for-civilians/)
* [https://developer.mozilla.org/en-US/docs/Web/HTTP/Caching](https://developer.mozilla.org/en-US/docs/Web/HTTP/Caching)
* [https://tomayko.com/blog/2008/things-caches-do](https://tomayko.com/blog/2008/things-caches-do)
* [https://web.dev/http-cache/](https://web.dev/http-cache/)


#### Symfony related links

* Cache types (browser, proxies and reverse-proxies) - [https://symfony.com/doc/current/http_cache.html](https://symfony.com/doc/current/http_cache.html)
* Expiration (Expires, Cache-Control) - [https://symfony.com/doc/current/http_cache/expiration.html](https://symfony.com/doc/current/http_cache/expiration.html)
* Validation (ETag, Last-Modified) - [https://symfony.com/doc/current/http_cache/validation.html](https://symfony.com/doc/current/http_cache/validation.html)
* Client side caching - [https://developer.mozilla.org/en-US/docs/Web/HTTP/Caching#private_browser_caches](https://developer.mozilla.org/en-US/docs/Web/HTTP/Caching#private_browser_caches)
* Server side caching - [https://symfony.com/doc/current/http_cache.html#caching-with-a-gateway-cache](https://symfony.com/doc/current/http_cache.html#caching-with-a-gateway-cache)
* Edge Side Includes - [https://symfony.com/doc/current/http_cache/esi.html](https://symfony.com/doc/current/http_cache/esi.html)

### Console

* Built-in commands
* Custom commands
* Configuration
* Options and arguments
* Input and Output objects
* Built-in helpers
* Console events
* Verbosity levels

### Automated Tests

* Unit tests with PHPUnit
* Functional tests with PHPUnit
* Client object
* Crawler object
* Profiler object
* Framework objects access
* Client configuration
* Request and response objects introspection
* PHPUnit bridge
* Handling legacy deprecated code

### Miscellaneous

* Configuration (including DotEnv and ExpressionLanguage components)
* Error handling
* Code debugging
* Deployment best practices
* Cache, Process and Serializer components
* Messenger component
* Mime and Mailer components
* Filesystem and Finder components
* Lock component
* Web Profiler, Web Debug Toolbar and Data collectors
* Internationalization and localization (and Intl component)
* Runtime component

## About the exam

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on recent changes.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Thanks

Special thanks to [Thomas Berends](https://github.com/ThomasBerends) for compiling the list of Symfony certification exam preparation resources, which author of this repository used in order to prepare for Symfony certification exams. This repository covers missing parts, as the original repo did not provide any code examples to tinker with.

Also, thanks to [webmozart](https://github.com/webmozart) for open-sourcing the Symfony Forms workshop repository, which was used as the initial code base for this repository.

## About the author

[Mario](https://connect.symfony.com/profile/marioblazek) is working as a software developer more than ten years now. He is Symfony and Twig certified developer.

## License

The MIT License (MIT). Please see the [License File](LICENSE) for more information.
