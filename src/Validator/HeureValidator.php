<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class HeureValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        /* @var App\Validator\Heure $constraint */

        if (null === $value || '' === $value) {
            return;
        }

        list($heures, $minutes) = explode(':', $value);
        if ($heures < 0 || $heures > 99 || $minutes < 0 || $minutes > 59) 
         {
            // the argument must be a string or an object implementing __toString()
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }


        // TODO: implement the validation here
        /*$this->context->buildViolation($constraint->message)
            ->setParameter('{{ value }}', $value)
            ->addViolation();*/
    }
}
