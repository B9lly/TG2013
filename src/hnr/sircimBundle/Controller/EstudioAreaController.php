<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use hnr\sircimBundle\Entity\EstudioArea;
use hnr\sircimBundle\Entity\Estudio;
use hnr\sircimBundle\Form\EstudioAreaType;

/**
 * EstudioArea controller.
 *
 * @Route("/estudioarea")
 */
class EstudioAreaController extends Controller
{
    /**
     * Lists all EstudioArea entities.
     *
     * @Route("/", name="estudioarea")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('hnrsircimBundle:EstudioArea')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new EstudioArea entity.
     *
     * @Route("/", name="estudioarea_create")
     * @Method("POST")
     * @Template("hnrsircimBundle:EstudioArea:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new EstudioArea();
        //$entity->setuscreacion($entity2);
        //$entity->setuscreacion(new \hnr\sircimBundle\Entity\Estudio);
        //$entity->uscreacion="mario";
        $form = $this->createForm(new EstudioAreaType(), $entity);
        
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudioarea_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new EstudioArea entity.
     *
     * @Route("/new", name="estudioarea_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EstudioArea();
        $form   = $this->createForm(new EstudioAreaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EstudioArea entity.
     *
     * @Route("/{id}", name="estudioarea_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioArea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioArea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EstudioArea entity.
     *
     * @Route("/{id}/edit", name="estudioarea_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioArea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioArea entity.');
        }

        $editForm = $this->createForm(new EstudioAreaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing EstudioArea entity.
     *
     * @Route("/{id}", name="estudioarea_update")
     * @Method("PUT")
     * @Template("hnrsircimBundle:EstudioArea:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioArea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioArea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EstudioAreaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudioarea_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a EstudioArea entity.
     *
     * @Route("/{id}", name="estudioarea_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('hnrsircimBundle:EstudioArea')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstudioArea entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estudioarea'));
    }

    /**
     * Creates a form to delete a EstudioArea entity by id.
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
