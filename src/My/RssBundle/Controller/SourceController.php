<?php

namespace My\RssBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use My\RssBundle\Entity\Source;
use My\RssBundle\Form\SourceType;

/**
 * Source controller.
 *
 */
class SourceController extends Controller
{
    /**
     * Lists all Source entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MyRssBundle:Source')->findAll();

        return $this->render('MyRssBundle:Source:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Source entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MyRssBundle:Source')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Source entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MyRssBundle:Source:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Source entity.
     *
     */
    public function newAction()
    {
        $entity = new Source();
        $form   = $this->createForm(new SourceType(), $entity);

        return $this->render('MyRssBundle:Source:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Source entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Source();
        $form = $this->createForm(new SourceType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_show', array('id' => $entity->getId())));
        }

        return $this->render('MyRssBundle:Source:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Source entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MyRssBundle:Source')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Source entity.');
        }

        $editForm = $this->createForm(new SourceType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MyRssBundle:Source:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Source entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MyRssBundle:Source')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Source entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SourceType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_edit', array('id' => $id)));
        }

        return $this->render('MyRssBundle:Source:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Source entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MyRssBundle:Source')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Source entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
