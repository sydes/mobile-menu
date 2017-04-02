<?php
namespace Module\MobileMenu;

use App\Document;
use App\Event;

class Handlers
{
    public function __construct(Event $events)
    {
        $events->on(
            'render.started',
            'front/*',
            function (Document $doc) {
                $assets = assetsDir('mobile-menu');
                $doc->addPackage('mobile-menu', $assets.'/js/mobile-menu.min.js', $assets.'/css/mobile-menu.min.css');

                $doc->addScript('mobile-menu-init', '$(\'.to-mobile\').toMobileMenu();');
            }
        );
    }
}
