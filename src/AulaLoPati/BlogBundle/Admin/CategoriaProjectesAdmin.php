<?php

namespace AulaLoPati\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class CategoriaProjectesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('nom')
            ->end();
    }

    protected function configureListFields(ListMapper $mapper)
    {
        unset($this->listModes['mosaic']);
        $mapper
            ->addIdentifier('nom', null, array('label' => 'Títol'));
    }

    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC', // sort direction
        '_sort_by' => 'nom' // field name
    );
}
