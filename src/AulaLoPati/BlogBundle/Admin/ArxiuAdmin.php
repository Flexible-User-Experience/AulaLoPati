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
use AulaLoPati\BlogBundle\Entity\Arxiu;

class ArxiuAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper

		->add('titol', null, array('label' => 'Títol'))
		->add('resum', 'textarea', array('label' => 'Resum','required'  => true, 'attr'=>(array('style'=>'height:160px; width:600px;'))))
		->add('descripcio', 'textarea', array('attr' => array('class' => 'tinymce',
				 'data-theme'=>'simple',
				'style' => 'width: 600px; height: 400px;'),'label' => 'Descripció'))
				
				->add('actiu', null, array('label' => 'Actiu ?','required'  => false))
		//->add('imgPetitaGris',null,array('required'  => false))
		//->add('imgPetitaMagenta',null,array('required'  => false))
		->add('data_publicacio', 'date', array('label' => 'Data publicació', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy'))
		//->add('data_visible', null, array('label' => 'Data visible ?', 'required'  => false))
		//->add('data_caducitat','date', array('label' => 'Data caducitat', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy','required'  => false))
		->add('data_realitzacio', null, array('label' => 'Data realització'))
		//->add('lloc', null, array('label' => 'Lloc'))
		//->add('video',null, array('required'=> FALSE))
		->add('actiu', null, array('label' => 'Actiu ?','required'  => false))

		->with('Imatge en miniatura')
		->add('imagePetita', 'file', array('label' => 'Imatge en miniatura', 'required'=>false))
		->add('imagePetitaName', null, array('label' => 'Nom', 'required' => false, 'read_only'=>true,))
		
		->with('Imatge principal')
		->add('imageGran1', 'file', array('label' => 'Arxiu', 'required'=>false))
		->add('imageGran1Name', null, array('label' => 'Nom', 'required'=>false, 'read_only'=>true,))
		->add('peuImageGran1', null, array('label' => 'Peu imatge', 'required'=>false))
		
		->with('Documents adjunts')
		->add('document1', 'file', array('label' => 'Arxiu 1', 'required'=>false))
		->add('document1Name', null, array('label' => 'Nom 1', 'required'=>false, 'read_only'=>true,))
		->add('titolDocument1', null, array('label' => 'Títol 1', 'required'=>false))
		->end()
		
        ->setHelps(array('titol'=>'Camp únic, no es pot repetir.'))
        ->setHelps(array('data_realitzacio'=>'Ex: "dia: 19 octubre _ hora: 15:00h _ lloc: Lo Pati"'))
        ->setHelps(array('resum'=>'Max: 300 caràcters'))
		->setHelps(array('data_publicacio'=>'Format: dd-MM-yyyy'))
		->setHelps(array('data_caducitat'=>'Data fins quan sera visible la pàgina -> Automaticament serà Arxiu. Deixar en blanc per no caducar. Format: dd-MM-yyyy '))
		;
	}

	protected function configureListFields(ListMapper $mapper)
	{
		$mapper
		//->add('id')
		->addIdentifier('titol', null, array('label' => 'Títol'))
		->add('actiu', null, array('editable' => true))
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
            ->add('titol', null, array('label' => 'Títol'))
            ->add('actiu')
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('delete')
            //->remove('create')
        ;
    }
}