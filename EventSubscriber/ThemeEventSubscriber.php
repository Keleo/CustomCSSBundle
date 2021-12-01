<?php

/*
 * This file is part of the CustomCSSBundle.
 * All rights reserved by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\CustomCSSBundle\EventSubscriber;

use App\Event\ThemeEvent;
use KimaiPlugin\CustomCSSBundle\Repository\CustomCssRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ThemeEventSubscriber implements EventSubscriberInterface
{
    private $repository;

    public function __construct(CustomCssRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            ThemeEvent::STYLESHEET => ['renderStylesheet', 100],
        ];
    }

    /**
     * @param ThemeEvent $event
     */
    public function renderStylesheet(ThemeEvent $event)
    {
        $css = $this->repository->getCustomCss()->getCustomCss();
        if (empty($css)) {
            return;
        }

        $css = str_replace('</', '&lt;/', $css);
        $css = '<style type="text/css">' . $css . '</style>';
        $css = str_replace(PHP_EOL, ' ', $css);
        $css = str_replace("\n", ' ', $css);
        $css = str_replace("\r", ' ', $css);

        $event->addContent($css);
    }
}
