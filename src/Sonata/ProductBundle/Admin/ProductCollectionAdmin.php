<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\ProductBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Component\Product\Pool;
use Sonata\FormatterBundle\Formatter\Pool as FormatterPool;
use Sonata\Component\Product\ProductInterface;

class ProductCollectionAdmin extends Admin
{
    protected $parentAssociationMapping = 'product';

    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setTranslationDomain('SonataProductBundle');

        $this->baseRouteName    = 'admin_sonata_product_productcollection';
        $this->baseRoutePattern = '/sonata/product/productcollection';
    }

    /**
     * {@inheritdoc}
     */
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('collection')
            ->add('enabled')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureListFields(ListMapper $list)
    {
        if (!$this->isChild()) {
            $list->addIndentifier('id')->addIdentifier('product');
        }

        $list
            ->addIdentifier('collection')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $filter
     *
     * @return void
     */
    public function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('collection')
        ;
    }
}