<?php
namespace Module\MobileMenu;

use App\Cmf;
use App\Document;
use App\Event;

class Controller
{
    public function install()
    {
         Cmf::installModule('mobile-menu', [
            'handlers' => ['Module\\MobileMenu\\Controller::handler'],
         ]);
    }

    public function uninstall()
    {
        Cmf::uninstallModule('mobile-menu');
    }

    public static function handler(Event $events)
    {
        $events->on(
            'render.before',
            'front/*',
            function (Document &$doc) {
                $assets = assetsDir('mobile-menu');
                $doc->addPackage('mobile-menu', $assets.'/js/mobile-menu.min.js', $assets.'/css/mobile-menu.min.css');

                $doc->addJs('mobile-menu-init', '$(\'.to-mobile\').toMobileMenu();');
            }
        );
    }
}
