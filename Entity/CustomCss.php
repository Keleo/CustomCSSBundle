<?php

/*
 * This file is part of the CustomCSSBundle.
 * All rights reserved by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\CustomCSSBundle\Entity;

class CustomCss
{
    private $customCss = '';

    /**
     * @return string
     */
    public function getCustomCss(): string
    {
        return $this->customCss;
    }

    /**
     * @param string|null $customCss
     * @return CustomCss
     */
    public function setCustomCss(string $customCss = null)
    {
        if (null === $customCss) {
            $customCss = '';
        }

        $this->customCss = $customCss;

        return $this;
    }
}
