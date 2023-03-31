<?php

namespace App\Form;

use App\Entity\Ville;
use App\Entity\Departement;
use App\Entity\Etudiant;
use App\Repository\VilleRepository;
use App\Repository\DepartementRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantFormType extends AbstractType
{
    public function __construct(private VilleRepository $villeRepository){}

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('message', null, [
                'attr' => ['rows' => 5]
            ])
            ->add('departement', EntityType::class, [
                'class' => Departement::class,
                'choice_label' => 'name',
                'placeholder' => 'Choose a departement',
                'query_builder' => fn (DepartementRepository $departementRepository) =>
                $departementRepository->findAllOrderedByAscNameQueryBuilder()
            ]);

        $formModifier = function (FormInterface $form, Departement $departement = null) {
            $cities = $departement === null ? [] : $this->villeRepository->findByDepartementOrderedByAscName($departement);

            $form->add('ville', EntityType::class, [
                'class' => Ville::class,
                'choice_label' => 'name',
                'disabled' => $departement === null,
                'placeholder' => 'Choose a ville',
                'choices' => $cities
            ]);
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getDepartement());
            }
        );

        $builder->get('departement')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $departement = $event->getForm()->getData();

                $formModifier($event->getForm()->getParent(), $departement);
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
