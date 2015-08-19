<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // lessons_blog_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'lessons_blog_default_index')), array (  '_controller' => 'Lessons\\BlogBundle\\Controller\\DefaultController::indexAction',));
        }

        // 
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '');
            }

            return array (  '_controller' => 'Lessons\\BlogBundle\\Controller\\PostController::indexAction',  '_route' => '',);
        }
        not_:

        // _create
        if ($pathinfo === '/') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not__create;
            }

            return array (  '_controller' => 'Lessons\\BlogBundle\\Controller\\PostController::createAction',  '_route' => '_create',);
        }
        not__create:

        // _new
        if ($pathinfo === '/new') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not__new;
            }

            return array (  '_controller' => 'Lessons\\BlogBundle\\Controller\\PostController::newAction',  '_route' => '_new',);
        }
        not__new:

        // _show
        if (preg_match('#^/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not__show;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => '_show')), array (  '_controller' => 'Lessons\\BlogBundle\\Controller\\PostController::showAction',));
        }
        not__show:

        // _edit
        if (preg_match('#^/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not__edit;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => '_edit')), array (  '_controller' => 'Lessons\\BlogBundle\\Controller\\PostController::editAction',));
        }
        not__edit:

        // _update
        if (preg_match('#^/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'PUT') {
                $allow[] = 'PUT';
                goto not__update;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => '_update')), array (  '_controller' => 'Lessons\\BlogBundle\\Controller\\PostController::updateAction',));
        }
        not__update:

        // _delete
        if (preg_match('#^/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'DELETE') {
                $allow[] = 'DELETE';
                goto not__delete;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => '_delete')), array (  '_controller' => 'Lessons\\BlogBundle\\Controller\\PostController::deleteAction',));
        }
        not__delete:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
