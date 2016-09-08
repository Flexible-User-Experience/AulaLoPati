<?php

namespace AulaLoPati\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseGroup as BaseGroup;

/**
 * Class Group
 *
 * @category Entity
 * @package  AulaLoPati\UserBundle\Entity
 * @author   David Romaní <david@flux.cat>
 */
class Group extends BaseGroup
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}
