<?php

namespace AulaLoPati\BlogBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class PresentacioAdmin extends AbstractBaseAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('create')
            ->remove('delete');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General', array('class' => 'col-md-6', 'box_class' => 'box box-success'))
            ->add('titol', null, array('label' => 'Títol', 'required' => false))
            //->add('resum', 'textarea', array('label' => 'Resum','required'  => true, 'attr'=>(array('style'=>'height:160px; width:600px;'))))
            ->add(
                'descripcio',
                'textarea',
                array(
                    'attr' => array(
                        'class' => 'tinymce',
                        'data-theme' => 'simple',
                        'style' => 'width:100%;height:400px;',
                    ),
                    'label' => 'Descripció',
                )
            )
            ->end()
            ->with('Imatge principal', array('class' => 'col-md-6', 'box_class' => 'box box-success'))
            ->add('imageGran1', 'file', array('label' => 'Arxiu', 'required' => false, 'help' => $this->getImageHelperFormMapperWithThumbnail()))
            ->add('imageGran1Name', null, array('label' => 'Nom', 'required' => false, 'read_only' => true,))
            ->add('peuImageGran1', null, array('label' => 'Peu imatge', 'required' => false))
            ->end()
            ->with('Documents adjunts', array('class' => 'col-md-6', 'box_class' => 'box box-success'))
            ->add('document1', 'file', array('label' => 'Arxiu 1', 'required' => false))
            ->add('document1Name', null, array('label' => 'Nom 1', 'required' => false, 'read_only' => true,))
            ->add('titolDocument1', null, array('label' => 'Títol 1', 'required' => false))
            ->end()
            ->setHelps(array('data_realitzacio' => 'Ex: "dia: 19 octubre _ hora: 15:00h _ lloc: Lo Pati"'))
            ->setHelps(array('resum' => 'Max: 300 caràcters'))
            ->setHelps(array('data_publicacio' => 'Format: dd-MM-yyyy'))
            ->setHelps(
                array('data_caducitat' => 'Data fins quan sera visible la pàgina -> Automaticament serà Arxiu. Deixar en blanc per no caducar. Format: dd-MM-yyyy ')
            );
    }

    protected function configureListFields(ListMapper $mapper)
    {
        unset($this->listModes['mosaic']);
        $mapper
            //->add('id')
            ->addIdentifier('titol', null, array('label' => 'Títol'))
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        //'view' => array(),
                        'edit' => array(),
                    ),
                    'label' => 'Acció',
                )
            );
    }

    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC', // sort direction
        '_sort_by' => 'titol' // field name
    );
}
