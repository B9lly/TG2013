<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use hnr\sircimBundle\Entity\Bitacora;
use hnr\sircimBundle\Form\BitacoraType;

/**
 * Bitacora controller.
 *
 * @Route("/bitacora")
 */
class BitacoraController extends Controller
{
    /**
     * Lists all Bitacora entities.
     *
     * @Route("/", name="bitacora")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('hnrsircimBundle:Bitacora')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Bitacora entity.
     *
     * @Route("/", name="bitacora_create")
     * @Method("POST")
     * @Template("hnrsircimBundle:Bitacora:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Bitacora();
        $form = $this->createForm(new BitacoraType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bitacora_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Bitacora entity.
     *
     * @Route("/new", name="bitacora_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Bitacora();
        $form   = $this->createForm(new BitacoraType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Bitacora entity.
     *
     * @Route("/{id}", name="bitacora_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Bitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bitacora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Bitacora entity.
     *
     * @Route("/{id}/edit", name="bitacora_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Bitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bitacora entity.');
        }

        $editForm = $this->createForm(new BitacoraType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Bitacora entity.
     *
     * @Route("/{id}", name="bitacora_update")
     * @Method("PUT")
     * @Template("hnrsircimBundle:Bitacora:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Bitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bitacora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BitacoraType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bitacora_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Bitacora entity.
     *
     * @Route("/{id}", name="bitacora_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('hnrsircimBundle:Bitacora')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bitacora entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bitacora'));
    }

    /**
     * Creates a form to delete a Bitacora entity by id.
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
