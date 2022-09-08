<?php

/*
 * This file is part of the CustomCSSBundle.
 * All rights reserved by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\CustomCSSBundle\Validator\Constraints;

use Doctrine\Common\Annotations\Annotation\Target;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY"})
 */
class CustomCss extends Constraint
{
    public const TAGS_DISALLOWED = 'kimai-custom-css-01';

    /**
     * @var array<string, string>
     */
    protected static $errorNames = [
        self::TAGS_DISALLOWED => 'HTML_TAGS',
    ];

    /**
     * @var string
     */
    public $message = 'Your custom css settings are invalid.';

    public function getTargets()
    {
        return self::PROPERTY_CONSTRAINT;
    }
}
