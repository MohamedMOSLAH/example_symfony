<?php

namespace App\EventSubscriber;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Event\LogoutEvent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class LogoutEventSubscriber implements EventSubscriberInterface
{
    private $urlGenerator;
    private $flashBag;

    public function __construct(FlashBagInterface $flashBag, UrlGeneratorInterface $urlGenerator){
        $this->urlGenerator = $urlGenerator;
        $this->flashBag = $flashBag;
    }

    public function onLogoutEvent(LogoutEvent $event)
    {
        $this->flashBag->add(
            'success',
            'Logged out successfully!'
        );
        $event->setResponse(new RedirectResponse($this->urlGenerator->generate('app_home')));
        // message flash
        // app_home
    }

    public static function getSubscribedEvents()
    {
        return [
            LogoutEvent::class => 'onLogoutEvent',
        ];
    }
}
