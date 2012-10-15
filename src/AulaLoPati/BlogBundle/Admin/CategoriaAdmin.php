<?php

namespace AulaLoPati\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\PageBundle\Model\PageInterface;


use Knp\Menu\ItemInterface as MenuItemInterface;
use AulaLoPati\BlogBundle\Entity\Jornada;

class CategoriaAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('nom');

	}

	protected function configureListFields(ListMapper $mapper)
	{
		$mapper

		->addIdentifier('nom', null, array('label' => 'Títol'))

		
		
		;
	}
	

	protected $datagridValues = array(
			'_page' => 1,
			'_sort_order' => 'ASC', // sort direction
			'_sort_by' => 'titol' // field name
	);
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titol')
            ->add('actiu')
            ->add('portada')
            ->add('data_publicacio')

        ;
    }
}