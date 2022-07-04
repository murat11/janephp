<?php

namespace Docker\Api\Validator;

class SwarmSpecValidator implements \Docker\Api\Validator\ValidatorInterface
{
    public function validate($data) : void
    {
        $constraints = array(new \Symfony\Component\Validator\Constraints\Collection(array('fields' => array('Name' => new \Symfony\Component\Validator\Constraints\Optional(array(new \Symfony\Component\Validator\Constraints\Type(array('0' => 'string')))), 'Labels' => new \Symfony\Component\Validator\Constraints\Optional(array()), 'Orchestration' => new \Symfony\Component\Validator\Constraints\Optional(array()), 'Raft' => new \Symfony\Component\Validator\Constraints\Optional(array()), 'Dispatcher' => new \Symfony\Component\Validator\Constraints\Optional(array()), 'CAConfig' => new \Symfony\Component\Validator\Constraints\Optional(array()), 'EncryptionConfig' => new \Symfony\Component\Validator\Constraints\Optional(array()), 'TaskDefaults' => new \Symfony\Component\Validator\Constraints\Optional(array())), 'allowExtraFields' => true)));
        $validator = \Symfony\Component\Validator\Validation::createValidator();
        $violations = $validator->validate($data, $constraints);
        if ($violations->count() > 0) {
            throw new \Docker\Api\Validator\ValidationException($violations);
        }
    }
}