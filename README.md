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

More info coming soon.

### Why this repo?


### Features


## Exam Topics

This is an official topics list that has been published by Symfony. You can find them also on their [website](https://certification.symfony.com/).

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

* Built-in commands - [https://symfony.com/doc/current/components/console/usage.html#built-in-commands](https://symfony.com/doc/current/components/console/usage.html#built-in-commands)
* Custom commands - [https://symfony.com/doc/current/console.html#creating-a-command](https://symfony.com/doc/current/console.html#creating-a-command)
* Configuration - [https://symfony.com/doc/current/console.html#configuring-the-command](https://symfony.com/doc/current/console.html#configuring-the-command)
* Options and arguments - [https://symfony.com/doc/current/console/input.html](https://symfony.com/doc/current/console/input.html)
* Input and Output objects
  * Input - [https://symfony.com/doc/current/console.html#console-input](https://symfony.com/doc/current/console.html#console-input)
  * Output - [https://symfony.com/doc/current/console.html#console-output](https://symfony.com/doc/current/console.html#console-output)
* Built-in helpers
  * Question Helper - [https://symfony.com/doc/current/components/console/helpers/questionhelper.html](https://symfony.com/doc/current/components/console/helpers/questionhelper.html)
  * Formatter Helper - [https://symfony.com/doc/current/components/console/helpers/formatterhelper.html](https://symfony.com/doc/current/components/console/helpers/formatterhelper.html)
  * Progress Bar - [https://symfony.com/doc/current/components/console/helpers/progressbar.html](https://symfony.com/doc/current/components/console/helpers/progressbar.html)
  * Table - [https://symfony.com/doc/current/components/console/helpers/table.html](https://symfony.com/doc/current/components/console/helpers/table.html)
  * Debug Formatter Helper - [https://symfony.com/doc/current/components/console/helpers/debug_formatter.html](https://symfony.com/doc/current/components/console/helpers/debug_formatter.html)
  * Cursor Helper - [https://symfony.com/doc/current/components/console/helpers/cursor.html](https://symfony.com/doc/current/components/console/helpers/cursor.html)
* Console events - [https://symfony.com/doc/current/components/console/events.html](https://symfony.com/doc/current/components/console/events.html)
* Verbosity levels - [https://symfony.com/doc/current/console/verbosity.html](https://symfony.com/doc/current/console/verbosity.html)

### Automated Tests

* Unit tests with PHPUnit - [https://symfony.com/doc/current/testing.html#unit-tests](https://symfony.com/doc/current/testing.html#unit-tests)
* Functional tests with PHPUnit - [https://symfony.com/doc/current/testing.html#integration-tests](https://symfony.com/doc/current/testing.html#integration-tests)
* Client object - [https://symfony.com/doc/current/testing.html#write-your-first-application-test](https://symfony.com/doc/current/testing.html#write-your-first-application-test)
* Crawler object - [https://symfony.com/doc/current/testing/dom_crawler.html](https://symfony.com/doc/current/testing/dom_crawler.html)
* Profiler object - [https://symfony.com/doc/current/testing/profiling.html](https://symfony.com/doc/current/testing/profiling.html)
* Framework objects access - [https://symfony.com/doc/current/testing.html#retrieving-services-in-the-test](https://symfony.com/doc/current/testing.html#retrieving-services-in-the-test)
* Client configuration - [https://symfony.com/doc/current/components/browser_kit.html#creating-a-client](https://symfony.com/doc/current/components/browser_kit.html#creating-a-client)
* Request and response objects introspection - [https://symfony.com/doc/current/testing.html#making-requests](https://symfony.com/doc/current/testing.html#making-requests)
* PHPUnit bridge - [https://symfony.com/doc/current/components/phpunit_bridge.html](https://symfony.com/doc/current/components/phpunit_bridge.html)
* Handling legacy deprecated code - [https://symfony.com/doc/current/components/phpunit_bridge.html#write-assertions-about-deprecations](https://symfony.com/doc/current/components/phpunit_bridge.html#write-assertions-about-deprecations)

### Miscellaneous

* Configuration (including DotEnv and ExpressionLanguage components)
  * Configuration - [https://symfony.com/doc/current/configuration.html](https://symfony.com/doc/current/configuration.html)
  * DotEnv - [https://symfony.com/doc/current/configuration.html#configuration-based-on-environment-variables](https://symfony.com/doc/current/configuration.html#configuration-based-on-environment-variables)
  * ExpressionLanguage - [https://symfony.com/doc/current/components/expression_language.html](https://symfony.com/doc/current/components/expression_language.html)
* Error handling - [https://symfony.com/doc/current/controller/error_pages.html](https://symfony.com/doc/current/controller/error_pages.html)
* Code debugging
* Deployment best practices - [https://symfony.com/doc/current/deployment.html](https://symfony.com/doc/current/deployment.html)
* Cache, Process and Serializer components
  * Cache - [https://symfony.com/doc/current/cache.html](https://symfony.com/doc/current/cache.html)
  * Process - [https://symfony.com/doc/current/components/process.html](https://symfony.com/doc/current/components/process.html)
  * Serializer - [https://symfony.com/doc/current/serializer.html](https://symfony.com/doc/current/serializer.html)
* Messenger component - [https://symfony.com/doc/current/components/messenger.html](https://symfony.com/doc/current/components/messenger.html)
* Mime and Mailer components
  * Mime - [https://symfony.com/doc/current/components/mime.html](https://symfony.com/doc/current/components/mime.html) 
  * Mailer - [https://symfony.com/doc/current/mailer.html](https://symfony.com/doc/current/mailer.html) 
* Filesystem and Finder components
  * Filesystem - [https://symfony.com/doc/current/components/filesystem.html](https://symfony.com/doc/current/components/filesystem.html)
  * Finder - [https://symfony.com/doc/current/components/finder.html](https://symfony.com/doc/current/components/finder.html)
* Lock component - [https://symfony.com/doc/current/components/lock.html](https://symfony.com/doc/current/components/lock.html)
* Web Profiler, Web Debug Toolbar and Data collectors - [https://symfony.com/doc/current/profiler.html](https://symfony.com/doc/current/profiler.html)
* Internationalization and localization (and Intl component) - [https://symfony.com/doc/current/translation.html](https://symfony.com/doc/current/translation.html)
* Runtime component - [https://symfony.com/doc/current/components/runtime.html](https://symfony.com/doc/current/components/runtime.html)

## About the exam

To take the exam, you should buy the exam voucher. The usual price is 250 euros. However, Symfony offers some discounts about two times a year. Usually, it is on Black Friday, and sometimes mid-June or whenever the Symfony exam version is announced. Deals go up to 40%, so I recommend that you aim to buy a voucher at that time. 

### Buying a voucher

After successful checkout, you should see an email with "Order Confirmation and Vouchers for the Symfony Certification Exam" subject in your inbox. The contents of the email body should be something like this:

![Successful voucher order](assets/voucher_order.png)

If you are already a member of SymfonyConnect, just navigate [https://certification.symfony.com/manager/voucher](https://certification.symfony.com/manager/voucher)(step 3), select the relevant Symfony version from the dropdown and paste the voucher code inside the input. That's it, you are ready to schedule the exam date. 

### Scheduling exam date

Once you are prepared and feel comfortable taking the exam, go to the "My Vouchers" section and select the date and time of your exam. I suggest that you schedule the exam in the morning rather than afternoon or evening because you will be fresh and full of energy after the night's sleep. This is how the scheduled exam for looks like:

![Schedule exam form](assets/schedule_exam_form.png)

Shortly after your date and time confirmation, Symfony should email you the confirmation notice and a check requirements link. I recommend testing your exam environment on that link to eliminate any late surprises before the exam. Also, be advised that only the Google Chrome browser is supported.

![Scheduled exam email](assets/scheduled_exam_email.jpg)

In the "My Vouchers" section, there should be a piece of information about the scheduled exam, with the additional link, which you will access at the exam time.

![Scheduled exam](assets/scheduled_exam.jpg)

### General overview

More info coming soon.

### Successful exam delivery

After the successful exam delivery, you should receive an official email from Symfony about your exam result in a few business days. Here is an example of that email:

![Successfully certified](assets/certified.jpg)

Also, in the "My Exams History" you should be able to see the results:

![Exam history](assets/exam_history.png)

That's about it. Congratulations on getting certified :).

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
