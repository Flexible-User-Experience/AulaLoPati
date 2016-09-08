<?php

namespace AulaLoPati\BlogBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PonenciaAdmin extends AbstractBaseAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('delete')//->remove('create')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General', array('class' => 'col-md-6', 'box_class' => 'box box-success'))
            ->add('jornada')
            ->add('titol', null, array('label' => 'Títol'))
            ->add('categoria', 'sonata_type_model', array())
            //->add('resum', 'textarea', array('label' => 'Resum','required'  => false, 'attr'=>(array('style'=>'height:90px;'))))
            ->add(
                'descripcio',
                'textarea',
                array(
                    'attr' => array(
                        'class' => 'tinymce',
                        'data-theme' => 'simple',
                        'style' => 'width: 600px; height: 400px;',
                    ),
                    'label' => 'Resum',
                )
            )

            //->add('imgPetitaGris',null,array('required'  => false))
            //->add('imgPetitaMagenta',null,array('required'  => false))
            ->end()
            ->with('Controls', array('class' => 'col-md-6', 'box_class' => 'box box-success'))
            ->add('actiu', null, array('label' => 'Actiu', 'required' => false))
            ->add('autor')
            ->add(
                'data_publicacio',
                'sonata_type_date_picker',
                array(
                    'label'  => 'Data publicació',
                    'format' => 'd/M/y',
                )
            )
            //->add('data_visible', null, array('label' => 'Data visible ?', 'required'  => false))
            //->add('data_caducitat','date', array('label' => 'Data caducitat', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy','required'  => false))
            ->add('data_realitzacio', null, array('label' => 'Data realització'))
            //->add('lloc', null, array('label' => 'Lloc'))
            //->add('video',null, array('required'=> FALSE))
            ->end()
            ->with('Imatge en miniatura', array('class' => 'col-md-6', 'box_class' => 'box box-success'))
            ->add('imagePetita', 'file', array('label' => 'Imatge en miniatura', 'required' => false, 'help' => $this->getImageHelperFormMapperWithThumbnailSmall()))
            ->add('imagePetitaName', null, array('label' => 'Nom', 'required' => false, 'read_only' => true,))
            ->end()
            ->with('Documents adjunts', array('class' => 'col-md-6', 'box_class' => 'box box-success'))
            ->add('document1', 'file', array('label' => 'Arxiu 1', 'required' => false))
            ->add('document1Name', null, array('label' => 'Nom 1', 'required' => false, 'read_only' => true,))
            ->add('titolDocument1', null, array('label' => 'Títol 1', 'required' => false))
            ->end()
            ->setHelps(array('titol' => 'Camp únic, no es pot repetir.'))
            ->setHelps(array('data_realitzacio' => 'Ex: "dia: 19 octubre _ hora: 15:00h _ lloc: Lo Pati"'))
            //->setHelps(array('tipus'=>'tria el tipus'))
            //->setHelps(array('compartir'=>'Mostrar botos per compartir xarxes socials'))
            //->setHelps(array('urlVimeo'=>'Ex: https://vimeo.com/38489316'))
            //->setHelps(array('urlFlickr'=>'Ex: http://www.flickr.com/photos/lopati/..'))
            ->setHelps(array('resum' => 'Max: 300 caràcters'))
            ->setHelps(
                array('data_caducitat' => 'Data fins quan sera visible la pàgina -> Automaticament serà Arxiu. Deixar en blanc per no caducar. Format: dd-MM-yyyy ')
            )
            ->setHelps(array('data_realitzacio' => 'Ex: "dia: 19 octubre _ hora: 15:00h _ lloc: Lo Pati"'));
    }

    protected function configureListFields(ListMapper $mapper)
    {
        unset($this->listModes['mosaic']);
        $mapper
            //->add('id')
            ->addIdentifier('titol', null, array('label' => 'Títol'))
            ->add('jornada')
            ->add('categoria')
            ->add('actiu', null, array('editable' => true))
            //->add('data_publicacio', null, array('label'=>'Data publicació', 'template' => 'BlogBundle:Default:list_custom_date_field.html.twig'))
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

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titol', null, array('label' => 'Títol'))
            ->add('actiu')
            ->add('jornada')
            ->add('categoria')//->add('data_publicacio')
        ;
    }
}
