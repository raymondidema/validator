<?php namespace Raymondidema\Validator;

use Illuminate\Validation\Factory as Validator;

abstract class FormValidator {

    /**
     * @var
     */
    protected $validator;
    /**
     * @var
     */
    protected $validation;

    /**
     * @param Validator $validator
     */
    function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param array $formData
     *
     * @throws Raymondidema\Validator\FormValidatorException
     * @return bool
     */
    public function validate(array $formData)
    {
        $this->validation = $this->validator->make($formData, $this->getValidationRules());

        if($this->validation->fails())
            throw new FormValidatorException('Validation failed', $this->getValidationErrors());
        return true;
    }

    /**
     * @return mixed
     */
    protected function getValidationRules()
    {
        return $this->rules;
    }

    /**
     * @return mixed
     */
    protected function getValidationErrors()
    {
        return $this->validation->errors();
    }


}