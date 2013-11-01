<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use hnr\sircimBundle\Entity\TamanoPlaca;
use hnr\sircimBundle\Form\TamanoPlacaType;

/**
 * TamanoPlaca controller.
 *
 * @Route("/tamanoplaca")
 */
class TamanoPlacaController extends Controller
{
    /**
     * Lists all TamanoPlaca entities.
     *
     * @Route("/", name="tamanoplaca")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('hnrsircimBundle:TamanoPlaca')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new TamanoPlaca entity.
     *
     * @Route("/", name="tamanoplaca_create")
     * @Method("POST")
     * @Template("hnrsircimBundle:TamanoPlaca:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new TamanoPlaca();
        $form = $this->createForm(new TamanoPlacaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tamanoplaca_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new TamanoPlaca entity.
     *
     * @Route("/new", name="tamanoplaca_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TamanoPlaca();
        $form   = $this->createForm(new TamanoPlacaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TamanoPlaca entity.
     *
     * @Route("/{id}", name="tamanoplaca_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:TamanoPlaca')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TamanoPlaca entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TamanoPlaca entity.
     *
     * @Route("/{id}/edit", name="tamanoplaca_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:TamanoPlaca')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TamanoPlaca entity.');
        }

        $editForm = $this->createForm(new TamanoPlacaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing TamanoPlaca entity.
     *
     * @Route("/{id}", name="tamanoplaca_update")
     * @Method("PUT")
     * @Template("hnrsircimBundle:TamanoPlaca:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:TamanoPlaca')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TamanoPlaca entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TamanoPlacaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tamanoplaca_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a TamanoPlaca entity.
     *
     * @Route("/{id}", name="tamanoplaca_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('hnrsircimBundle:TamanoPlaca')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TamanoPlaca entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tamanoplaca'));
    }

    /**
     * Creates a form to delete a TamanoPlaca entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
