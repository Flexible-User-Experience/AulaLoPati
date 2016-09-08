<?php

namespace AulaLoPati\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

abstract class AbstractBaseAdmin extends AbstractAdmin
{
    /**
     * @var UploaderHelper
     */
    protected $vus;

    /**
     * @var CacheManager
     */
    protected $lis;

    /**
     *
     *
     * Methods
     *
     *
     */

    /**
     * @param string                     $code
     * @param string                     $class
     * @param string                     $baseControllerName
     * @param UploaderHelper             $vus
     * @param CacheManager               $lis
     */
    public function __construct($code, $class, $baseControllerName, UploaderHelper $vus, CacheManager $lis)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->vus = $vus;
        $this->lis = $lis;
    }

    protected function getImageHelperFormMapperWithThumbnail($minWidth = 1200)
    {
        return ($this->getSubject() ? $this->getSubject()->getImageGran1Name() ? '<img src="' . $this->lis->getBrowserPath(
                $this->vus->asset($this->getSubject(), 'imageGran1'),
                '480xY'
            ) . '" class="admin-preview img-responsive" alt="thumbnail"/>' : '' : '');
    }
}
