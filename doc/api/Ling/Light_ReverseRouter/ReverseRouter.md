[Back to the Ling/Light_ReverseRouter api](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter.md)



The ReverseRouter class
================
2019-04-10 --> 2019-11-12






Introduction
============

The ReverseRouter class.



Class synopsis
==============


class <span class="pl-k">ReverseRouter</span> implements [LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md), [LightReverseRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ReverseRouter/LightReverseRouterInterface.md) {

- Properties
    - protected array [$routes](#property-routes) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/__construct.md)() : void
    - public [initialize](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/initialize.md)(Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : mixed
    - public [getUrl](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/getUrl.md)(string $routeName, ?array $urlParameters = [], ?$useAbsolute = false) : string
    - public [onCoreExceptionCaught](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/onCoreExceptionCaught.md)(Ling\Light\Events\LightEvent $event, string $eventName, ?bool &$stopPropagation = false) : void

}




Properties
=============

- <span id="property-routes"><b>routes</b></span>

    This property holds the routes for this instance.
    
    



Methods
==============

- [ReverseRouter::__construct](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/__construct.md) &ndash; Builds the ReverseRouter instance.
- [ReverseRouter::initialize](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/initialize.md) &ndash; Initializes a service with the given Light instance and HttpRequestInterface instance.
- [ReverseRouter::getUrl](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/getUrl.md) &ndash; Returns the url corresponding to the given route name and url parameters.
- [ReverseRouter::onCoreExceptionCaught](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/onCoreExceptionCaught.md) &ndash; This method is the callable triggered on the [Light.on_exception_caught event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).





Location
=============
Ling\Light_ReverseRouter\ReverseRouter<br>
See the source code of [Ling\Light_ReverseRouter\ReverseRouter](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/ReverseRouter.php)



