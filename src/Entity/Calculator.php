<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Calculator
{
    /**
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    public $firstElement;

    /**
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    public $secondElement;

    /**
     * @Assert\NotBlank
     */
    public $operator;


    /**
     * @return mixed
     */
    public function getFirstElement()
    {
        return $this->firstElement;
    }

    /**
     * @param mixed $firstElement
     */
    public function setFirstElement($firstElement): void
    {
        $this->firstElement = $firstElement;
    }

    /**
     * @return mixed
     */
    public function getSecondElement()
    {
        return $this->secondElement;
    }

    /**
     * @param mixed $secondElement
     */
    public function setSecondElement($secondElement): void
    {
        $this->secondElement = $secondElement;
    }

    /**
     * @return mixed
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param mixed $operator
     */
    public function setOperator($operator): void
    {
        $this->operator = $operator;
    }
}