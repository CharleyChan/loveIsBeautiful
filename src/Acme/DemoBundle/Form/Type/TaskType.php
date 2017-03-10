<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/6/17
 * Time: 下午6:37
 */
// src/Acme/DemoBundle/Form/Type/TaskType.php
namespace Acme\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task', TextType::class, array(
                'label' => '任务',
            ))
            ->add('dueDate', DateType::class, array(
                'widget' => 'single_text',
                'required' => false,
                'label' => '日期',
            ))
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->add('saveAndAdd', SubmitType::class, array('label' => 'Save and Add'))
            ->add('nextStep', SubmitType::class)
            ->add('previousStep', SubmitType::class, array(
                'validation_groups' => true,
            ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\DemoBundle\Entity\Task',
//            'validation' => array('registration'),
        ));
    }
}
