<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use hnr\sircimBundle\Entity\UsuarioRol;
use hnr\sircimBundle\Form\UsuarioRolType;

/**
 * UsuarioRol controller.
 *
 * @Route("/usuariorol")
 */
class UsuarioRolController extends Controller
{
    /**
     * Lists all UsuarioRol entities.
     *
     * @Route("/", name="usuariorol")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('hnrsircimBundle:UsuarioRol')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new UsuarioRol entity.
     *
     * @Route("/", name="usuariorol_create")
     * @Method("POST")
     * @Template("hnrsircimBundle:UsuarioRol:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new UsuarioRol();
        $form = $this->createForm(new UsuarioRolType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuariorol_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new UsuarioRol entity.
     *
     * @Route("/new", name="usuariorol_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new UsuarioRol();
        $form   = $this->createForm(new UsuarioRolType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a UsuarioRol entity.
     *
     * @Route("/{id}", name="usuariorol_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:UsuarioRol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UsuarioRol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing UsuarioRol entity.
     *
     * @Route("/{id}/edit", name="usuariorol_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:UsuarioRol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UsuarioRol entity.');
        }

        $editForm = $this->createForm(new UsuarioRolType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing UsuarioRol entity.
     *
     * @Route("/{id}", name="usuariorol_update")
     * @Method("PUT")
     * @Template("hnrsircimBundle:UsuarioRol:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:UsuarioRol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UsuarioRol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UsuarioRolType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuariorol_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a UsuarioRol entity.
     *
     * @Route("/{id}", name="usuariorol_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('hnrsircimBundle:UsuarioRol')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UsuarioRol entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usuariorol'));
    }

    /**
     * Creates a form to delete a UsuarioRol entity by id.
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
