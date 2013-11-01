<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use hnr\sircimBundle\Entity\EstudioRegion;
use hnr\sircimBundle\Form\EstudioRegionType;

/**
 * EstudioRegion controller.
 *
 * @Route("/estudioregion")
 */
class EstudioRegionController extends Controller
{
    /**
     * Lists all EstudioRegion entities.
     *
     * @Route("/", name="estudioregion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('hnrsircimBundle:EstudioRegion')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new EstudioRegion entity.
     *
     * @Route("/", name="estudioregion_create")
     * @Method("POST")
     * @Template("hnrsircimBundle:EstudioRegion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new EstudioRegion();
        $form = $this->createForm(new EstudioRegionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudioregion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new EstudioRegion entity.
     *
     * @Route("/new", name="estudioregion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EstudioRegion();
        $form   = $this->createForm(new EstudioRegionType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EstudioRegion entity.
     *
     * @Route("/{id}", name="estudioregion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioRegion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioRegion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EstudioRegion entity.
     *
     * @Route("/{id}/edit", name="estudioregion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioRegion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioRegion entity.');
        }

        $editForm = $this->createForm(new EstudioRegionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing EstudioRegion entity.
     *
     * @Route("/{id}", name="estudioregion_update")
     * @Method("PUT")
     * @Template("hnrsircimBundle:EstudioRegion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioRegion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioRegion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EstudioRegionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudioregion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a EstudioRegion entity.
     *
     * @Route("/{id}", name="estudioregion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('hnrsircimBundle:EstudioRegion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstudioRegion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estudioregion'));
    }

    /**
     * Creates a form to delete a EstudioRegion entity by id.
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
