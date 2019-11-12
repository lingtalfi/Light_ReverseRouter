<?php


namespace Ling\Light_ReverseRouter;


use Ling\Bat\HttpTool;
use Ling\Bat\UriTool;
use Ling\Light\Core\Light;
use Ling\Light\Events\LightEvent;
use Ling\Light\Exception\LightException;
use Ling\Light\Exception\LightRedirectException;
use Ling\Light\Http\HttpRedirectResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ReverseRouter\LightReverseRouterInterface;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;

/**
 * The ReverseRouter class.
 */
class ReverseRouter implements LightInitializerInterface, LightReverseRouterInterface
{


    /**
     * This property holds the routes for this instance.
     * @var array
     */
    protected $routes;


    /**
     * Builds the ReverseRouter instance.
     */
    public function __construct()
    {
        $this->routes = [];
    }


    /**
     * @implementation
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
        $this->routes = $light->getRoutes();
    }


    /**
     * @implementation
     */
    public function getUrl(string $routeName, array $urlParameters = [], $useAbsolute = false): string
    {

        /**
         * As for now, I've not used route with tags yet, but when this will come (and it will come),
         * then the url parameters shall split in two,
         * those not used by the routes are appended to the url with a question mark (traditional get)
         */
        $routeVars = [];
        $getVars = $urlParameters; // todo: distribute this better when route tags are implemented


        if (array_key_exists($routeName, $this->routes)) {
            $route = $this->routes[$routeName];

            if (false === $useAbsolute) {
                $url = $route['pattern'];
                if ($getVars) {
                    $url .= '?' . UriTool::httpBuildQuery($getVars);
                }
                return $url;
            }


            //--------------------------------------------
            // absolute version
            //--------------------------------------------
            $isSecure = $route['is_secure_protocol'];
            if (null === $isSecure) {
                $isSecure = HttpTool::isHttps();
            }

            if (true === $isSecure) {
                $protocol = 'https';
            } else {
                $protocol = 'http';
            }
            $host = $route['host'];
            if (null === $host) {
                $host = $_SERVER['HTTP_HOST'];
            }
            $url = $protocol . "://" . $host . $route['pattern'];
            if ($getVars) {
                $url .= '?' . UriTool::httpBuildQuery($getVars);
            }
            return $url;
        }
        throw new LightException("ReverseRouter: Route not found: $routeName.");
    }


    /**
     * This method is the callable triggered on the @page(Light.on_exception_caught event).
     * If the caught exception is an instance of LightRedirectException, this method sets the httpResponse
     *  variable (in the given LightEvent instance), to effectively redirect the user.
     *
     * @param LightEvent $event
     * @param string $eventName
     * @param bool $stopPropagation
     * @throws LightException
     */
    public function onCoreExceptionCaught(LightEvent $event, string $eventName, bool &$stopPropagation = false)
    {
        $exception = $event->getVar('exception', null, true);
        if ($exception instanceof LightRedirectException) {
            $urlParams = $_GET;
            $url = $this->getUrl($exception->getRedirectRoute(), $urlParams, true);
            $event->setVar('httpResponse', HttpRedirectResponse::create($url));
            $stopPropagation = true;
        }
    }


}