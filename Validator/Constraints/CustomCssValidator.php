<?php

/*
 * This file is part of the "Custom CSS Bundle" for Kimai.
 * All rights reserved by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\CustomCSSBundle\Validator\Constraints;

use KimaiPlugin\CustomCSSBundle\Validator\Constraints\CustomCss as CustomCssConstraint;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class CustomCssValidator extends ConstraintValidator
{
    /**
     * @param string $value
     * @param Constraint $constraint
     * @return void
     */
    public function validate($value, Constraint $constraint): void
    {
        if (!($constraint instanceof CustomCssConstraint)) {
            throw new UnexpectedTypeException($constraint, CustomCssConstraint::class);
        }

        if (!\is_string($value)) {
            return;
        }

        $values = [$value, strtolower($value)];

        foreach ($values as $value) {
            if (stripos($value, '</style>') !== false || stripos($value, '<script') !== false || strip_tags($value) !== $value) {
                $this->context->buildViolation(CustomCssConstraint::getErrorName(CustomCssConstraint::TAGS_DISALLOWED))
                    ->atPath('customCss')
                    ->setTranslationDomain('validators')
                    ->setCode(CustomCssConstraint::TAGS_DISALLOWED)
                    ->addViolation();
                break;
            }
        }
    }
}
