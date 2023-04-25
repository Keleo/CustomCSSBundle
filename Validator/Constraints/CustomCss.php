<?php

/*
 * This file is part of the "Custom CSS Bundle" for Kimai.
 * All rights reserved by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\CustomCSSBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class CustomCss extends Constraint
{
    public const TAGS_DISALLOWED = 'kimai-custom-css-01';

    /**
     * @var array<string, string>
     */
    protected const ERROR_NAMES = [
        self::TAGS_DISALLOWED => 'HTML_TAGS',
    ];

    public string $message = 'Your custom css settings are invalid.';

    public function getTargets(): string|array
    {
        return self::PROPERTY_CONSTRAINT;
    }
}
