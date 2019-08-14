<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CalculatorType extends AbstractType
{
    const NUMBER_VALUES_INVALID = 'You entered an invalid value, it should include numbers';
    const OPERATOR_VALUES_INVALID = 'You entered an invalid value, it should include  +, -, x, /, & or |';
    const INVALID_MESSAGE = 'invalid_message';

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstElement', IntegerType::class, [
                self::INVALID_MESSAGE => self::NUMBER_VALUES_INVALID,
            ])
            ->add('operator', ChoiceType::class, [
                'choices'  => [
                    '+' => 'sum',
                    '-' => 'difference',
                    'x' => 'multiplication',
                    '/' => 'division',
                    '&' => 'bitwiseAnd',
                    '|' => 'bitwiseOr',
                ],
                self::INVALID_MESSAGE => self::OPERATOR_VALUES_INVALID,
            ])
            ->add('secondElement', IntegerType::class, [
                self::INVALID_MESSAGE => self::NUMBER_VALUES_INVALID,
            ])
            ->add('Calculate', SubmitType::class)
        ;
    }
}