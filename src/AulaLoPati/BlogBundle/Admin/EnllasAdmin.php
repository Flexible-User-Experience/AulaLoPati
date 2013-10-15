<?php

namespace AulaLoPati\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\PageBundle\Model\PageInterface;
use Sonata\AdminBundle\Route\RouteCollection;

use Knp\Menu\ItemInterface as MenuItemInterface;
use AulaLoPati\BlogBundle\Entity\Jornada;

class EnllasAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('titol', null, array('label' => 'Títol'))
		//->add('resum', 'textarea', array('label' => 'Resum','required'  => false, 'attr'=>(array('style'=>'height:90px;'))))
		->add('descripcio', 'textarea', array('attr' => array('class' => 'tinymce',
				 'data-theme'=>'simple',
				'style' => 'width: 600px; height: 400px;'),'label' => 'Descripció'))
				
				->add('actiu', null, array('label' => 'Actiu ?','required'  => false))
		//->add('imgPetitaGris',null,array('required'  => false))
		//->add('imgPetitaMagenta',null,array('required'  => false))
		->add('link','url',array('label'=>'Enllaç','required'=>true))
		->add('ordre',null,array('required'=>true))
		->add('actiu', null, array('label' => 'Actiu ?','required'  => false))

		->with('Imatge en miniatura')
		->add('imagePetita', 'file', array('label' => 'Imatge en miniatura', 'required'=>false))
		->add('imagePetitaName', null, array('label' => 'Nom', 'required' => false, 'read_only'=>true,))
		
        ->setHelps(array('titol'=>'Camp únic, no es pot repetir.'))
        ->setHelps(array('data_realitzacio'=>'Ex: "dia: 19 octubre _ hora: 15:00h _ lloc: Lo Pati"'))
        ->setHelps(array('resum'=>'Max: 300 caràcters'))
		->setHelps(array('data_publicacio'=>'Format: dd-MM-yyyy'))
		->setHelps(array('data_caducitat'=>'Data fins quan sera visible la pàgina -> Automaticament serà Arxiu. Deixar en blanc per no caducar. Format: dd-MM-yyyy '))
		->setHelps(array('data_realitzacio'=>'Ex: "dia: 19 octubre _ hora: 15:00h _ lloc: Lo Pati"'))
		->setHelps(array('link'=>'Ex: "http://www.lopati.cat"'))
		->setHelps(array('ordre'=>'Nombre enter, ordena de més gran a més petit'))
		;
	}

	protected function configureListFields(ListMapper $mapper)
	{
		$mapper
		//->add('id')
		->addIdentifier('titol', null, array('label' => 'Títol'))
		->add('actiu', null, array('editable' => true))
		->add('ordre')
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'view' => array(),
                    'edit' => array(),
                ),
                'label' => 'Acció'
            ))
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
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            //->remove('create')
            ->remove('delete')
        ;
    }
}