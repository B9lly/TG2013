<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use hnr\sircimBundle\Entity\Horario;
use hnr\sircimBundle\Form\HorarioType;

/**
 * Horario controller.
 *
 * @Route("/horario")
 */
class HorarioController extends Controller
{
    /**
     * Lists all Horario entities.
     *
     * @Route("/", name="horario")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('hnrsircimBundle:Horario')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Horario entity.
     *
     * @Route("/", name="horario_create")
     * @Method("POST")
     * @Template("hnrsircimBundle:Horario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Horario();
        $form = $this->createForm(new HorarioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('horario_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Horario entity.
     *
     * @Route("/new", name="horario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Horario();
        $form   = $this->createForm(new HorarioType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Horario entity.
     *
     * @Route("/{id}", name="horario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Horario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Horario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Horario entity.
     *
     * @Route("/{id}/edit", name="horario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Horario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Horario entity.');
        }

        $editForm = $this->createForm(new HorarioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Horario entity.
     *
     * @Route("/{id}", name="horario_update")
     * @Method("PUT")
     * @Template("hnrsircimBundle:Horario:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Horario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Horario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new HorarioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('horario_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Horario entity.
     *
     * @Route("/{id}", name="horario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('hnrsircimBundle:Horario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Horario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('horario'));
    }

    /**
     * Creates a form to delete a Horario entity by id.
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
