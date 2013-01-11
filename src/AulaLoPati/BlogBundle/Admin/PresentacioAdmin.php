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

class PresentacioAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('create')
            ->remove('delete')
        ;
    }
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper

		->add('titol', null, array('label' => 'Títol','required'=>false))
		//->add('resum', 'textarea', array('label' => 'Resum','required'  => true, 'attr'=>(array('style'=>'height:160px; width:600px;'))))
		->add('descripcio', 'textarea', array('attr' => array('class' => 'tinymce',
				 'data-theme'=>'simple',
				'style' => 'width: 600px; height: 400px;'),'label' => 'Descripció'))
				
				//->add('actiu', null, array('label' => 'Actiu ?','required'  => false))
		//->add('imgPetitaGris',null,array('required'  => false))
		//->add('imgPetitaMagenta',null,array('required'  => false))
		//->add('data_publicacio', 'date', array('label' => 'Data publicació', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy'))
		//->add('data_visible', null, array('label' => 'Data visible ?', 'required'  => false))
		//->add('data_caducitat','date', array('label' => 'Data caducitat', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy','required'  => false))
		//->add('data_realitzacio', null, array('label' => 'Data realització'))
		//->add('lloc', null, array('label' => 'Lloc'))
		//->add('video',null, array('required'=> FALSE))

		//->add('actiu', null, array('label' => 'Actiu ?','required'  => false))
		//->add('compartir',null,array('label' => 'Compartir ?','required'  => false))

		/*->add('images', 'collection', array(
				'type' => 'lo_pati_image',
				'allow_add' => true,
				'allow_delete' => true,
				'by_reference' => false
		))*/
		/*->add('imagePetita', 'file', array('data_class' => 'Symfony\Component\HttpFoundation\File\File',
					'property_path' => 'imagePetita','required' => false))
		->add('imagePetitaName',null,array('required' => false))*/
//		->with('Imatge en miniatura')
//		->add('imagePetita', 'file', array('label' => 'Imatge en miniatura', 'required'=>false))
//		->add('imagePetitaName', null, array('label' => 'Nom', 'required' => false, 'read_only'=>true,))
		
		->with('Imatge principal')
		->add('imageGran1', 'file', array('label' => 'Arxiu', 'required'=>false))
		->add('imageGran1Name', null, array('label' => 'Nom', 'required'=>false, 'read_only'=>true,))
		->add('peuImageGran1', null, array('label' => 'Peu imatge', 'required'=>false))

		
		
		/*->with('Portada')
		->add('portada', null, array('label' => 'És portada ?', 'required' => false))
		->add('imagePetita', 'file', array('label' => 'Imatge petita gris', 'required'=>false))
		->add('imagePetitaName', null, array('label' => 'Nom', 'required' => false, 'read_only'=>true,))
		->add('imagePetita2', 'file', array('label' => 'Imatge petita vermell', 'required'=>false))
		->add('imagePetita2Name', null, array('label' => 'Nom', 'required' => false, 'read_only'=>true,))*/
		
		/*->with('Documents adjunts')
		->add('document1', 'file', array('label' => 'Arxiu 1', 'required'=>false))
		->add('document1Name', null, array('label' => 'Nom 1', 'required'=>false, 'read_only'=>true,))
		->add('titolDocument1', null, array('label' => 'Títol 1', 'required'=>false))
		//->end()
		
		->add('document2', 'file', array('label' => 'Arxiu 2', 'required'=>false))
		->add('document2Name', null, array('label' => 'Nom 2', 'required'=>false, 'read_only'=>true,))
		->add('titolDocument2', null, array('label' => 'Títol 2', 'required'=>false))
		
		->with('Enllaços')
		->add('links', 'textarea', array('required'=>false,'attr' => array('class' => 'tinymce',
				'data-theme'=>'simple',
				'style' => 'width: 600px; height: 400px;'),'label' => 'Enllaços'))
		*/
		//->add('urlVimeo',null, array('required'=> FALSE, 'label'=> 'URL video Vimeo'))
		//->add('urlFlickr',null, array('required'=> FALSE,'label'=> 'URL galeria Flickr'))
		
				//->setHelps(array('titol'=>'Camp únic, no es pot repetir.'))
				->setHelps(array('data_realitzacio'=>'Ex: "dia: 19 octubre _ hora: 15:00h _ lloc: Lo Pati"'))
				//->setHelps(array('tipus'=>'tria el tipus'))
				//->setHelps(array('compartir'=>'Mostrar botos per compartir xarxes socials'))
				//->setHelps(array('urlVimeo'=>'Ex: https://vimeo.com/38489316'))
				//->setHelps(array('urlFlickr'=>'Ex: http://www.flickr.com/photos/lopati/..'))
				->setHelps(array('resum'=>'Max: 300 caràcters'))
		
		->setHelps(array('data_publicacio'=>'Format: dd-MM-yyyy'))
		->setHelps(array('data_caducitat'=>'Data fins quan sera visible la pàgina -> Automaticament serà Arxiu. Deixar en blanc per no caducar. Format: dd-MM-yyyy '))
		;
	}

	protected function configureListFields(ListMapper $mapper)
	{
		$mapper
		->add('id')
		->addIdentifier('titol', null, array('label' => 'Títol'))
		//->add('actiu')

		//->add('data_publicacio', null, array('label'=>'Data publicació', 'template' => 'BlogBundle:Default:list_custom_date_field.html.twig'))
		
		
		
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
            ->add('data_publicacio')

        ;
    }
}