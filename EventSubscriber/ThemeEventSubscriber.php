<?php

/*
 * This file is part of the "Custom CSS Bundle" for Kimai.
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
    public function __construct(private CustomCssRepository $repository)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ThemeEvent::STYLESHEET => ['renderStylesheet', 100],
        ];
    }

    public function renderStylesheet(ThemeEvent $event): void
    {
        $css = $this->repository->getCustomCss()->getCustomCss();
        if (empty($css)) {
            return;
        }

        // the first two make sure that injected HTML will not be interpreted by the browser, the others are only
        // there to format/shrink the output size
        $css = str_replace(['</', '<s', PHP_EOL, "\n", "\r"], ['&lt;/', '&lt;s', ' ', ' ', ' '], $css);
        $css = '<style type="text/css">' . trim($css) . '</style>';

        $event->addContent($css);
    }
}
