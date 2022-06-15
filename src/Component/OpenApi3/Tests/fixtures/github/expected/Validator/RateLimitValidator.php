<?php

namespace Github\Validator;

class RateLimitValidator implements \Github\Validator\ValidatorInterface
{
    public function validate($data) : void
    {
        $constraints = array(new \Symfony\Component\Validator\Constraints\Count(array('min' => 0, 'minMessage' => 'This array has not enough properties. It should have {{ limit }} properties or more.')), new \Symfony\Component\Validator\Constraints\Collection(array('fields' => array('limit' => new \Symfony\Component\Validator\Constraints\Required(array(new \Symfony\Component\Validator\Constraints\Type(array('0' => 'integer')))), 'remaining' => new \Symfony\Component\Validator\Constraints\Required(array(new \Symfony\Component\Validator\Constraints\Type(array('0' => 'integer')))), 'reset' => new \Symfony\Component\Validator\Constraints\Required(array(new \Symfony\Component\Validator\Constraints\Type(array('0' => 'integer'))))), 'allowExtraFields' => false)));
        $validator = \Symfony\Component\Validator\Validation::createValidator();
        $violations = $validator->validate($data, $constraints);
        if ($violations->count() > 0) {
            throw new \Github\Validator\ValidationException($violations);
        }
    }
}