<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use hnr\sircimBundle\Entity\EstudioRadTamPlaca;
use hnr\sircimBundle\Form\EstudioRadTamPlacaType;

/**
 * EstudioRadTamPlaca controller.
 *
 * @Route("/estudioradtamplaca")
 */
class EstudioRadTamPlacaController extends Controller
{
    /**
     * Lists all EstudioRadTamPlaca entities.
     *
     * @Route("/", name="estudioradtamplaca")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('hnrsircimBundle:EstudioRadTamPlaca')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new EstudioRadTamPlaca entity.
     *
     * @Route("/", name="estudioradtamplaca_create")
     * @Method("POST")
     * @Template("hnrsircimBundle:EstudioRadTamPlaca:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new EstudioRadTamPlaca();
        $form = $this->createForm(new EstudioRadTamPlacaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudioradtamplaca_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new EstudioRadTamPlaca entity.
     *
     * @Route("/new", name="estudioradtamplaca_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EstudioRadTamPlaca();
        $form   = $this->createForm(new EstudioRadTamPlacaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EstudioRadTamPlaca entity.
     *
     * @Route("/{id}", name="estudioradtamplaca_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioRadTamPlaca')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioRadTamPlaca entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EstudioRadTamPlaca entity.
     *
     * @Route("/{id}/edit", name="estudioradtamplaca_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioRadTamPlaca')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioRadTamPlaca entity.');
        }

        $editForm = $this->createForm(new EstudioRadTamPlacaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing EstudioRadTamPlaca entity.
     *
     * @Route("/{id}", name="estudioradtamplaca_update")
     * @Method("PUT")
     * @Template("hnrsircimBundle:EstudioRadTamPlaca:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioRadTamPlaca')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioRadTamPlaca entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EstudioRadTamPlacaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudioradtamplaca_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a EstudioRadTamPlaca entity.
     *
     * @Route("/{id}", name="estudioradtamplaca_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('hnrsircimBundle:EstudioRadTamPlaca')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstudioRadTamPlaca entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estudioradtamplaca'));
    }

    /**
     * Creates a form to delete a EstudioRadTamPlaca entity by id.
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
