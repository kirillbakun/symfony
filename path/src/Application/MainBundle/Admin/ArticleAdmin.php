<?php
    namespace Application\MainBundle\Admin;

    use Sonata\AdminBundle\Admin\Admin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;

    class ArticleAdmin extends Admin
    {
        protected function configureFormFields(FormMapper $form_mapper) {
            $form_mapper
                ->add('text', 'text', array('label' => 'Article Title'))
                ->add('user', null, array('label' => 'User id'))
                ->add('isActive', null, array('label' => 'Active'));
        }

        protected function configureDatagridFilters(DatagridMapper $datagrid_mapper) {
            $datagrid_mapper
                ->add('text', null, array('label' => 'Article Title'))
                ->add('user', null, array('label' => 'User Login'))
                ->add('isActive', null, array('label' => 'Active'));;
        }

        protected function configureListFields(ListMapper $list_mapper) {
            $list_mapper
                ->addIdentifier('text', null, array('label' => 'Article Title'))
                ->add('user', null, array('label' => 'User Login'))
                ->add('isActive', null, array('label' => 'Active', 'editable' => true));
        }
    }