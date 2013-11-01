<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use hnr\sircimBundle\Entity\Solicitud;
use hnr\sircimBundle\Form\SolicitudType;

/**
 * Solicitud controller.
 *
 * @Route("/solicitud")
 */
class SolicitudController extends Controller
{
    private $idArea = 1;
    private $regiones = array('Cabeza'=>'Cabeza', 'Brazo'=>'Brazo', 'Mano'=>'Mano');
    
    /**
     * Lists all Solicitud entities.
     *
     * @Route("/", name="solicitud")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('hnrsircimBundle:Solicitud')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Solicitud entity.
     *
     * @Route("/", name="solicitud_create")
     * @Method("POST")
     * @Template("hnrsircimBundle:Solicitud:new.html.twig")
     */
    public function createAction(Request $request)
    {
               
        $entity  = new Solicitud();
        $form = $this->createForm(new SolicitudType($this->idArea, $this->regiones), $entity);
        $form->bind($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('solicitud_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Solicitud entity.
     *
     * @Route("/new", name="solicitud_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        
        $entity = new Solicitud();
        $form   = $this->createForm(new SolicitudType($this->idArea, $this->regiones), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Solicitud entity.
     *
     * @Route("/{id}", name="solicitud_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Solicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Solicitud entity.
     *
     * @Route("/{id}/edit", name="solicitud_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Solicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitud entity.');
        }

        $editForm = $this->createForm(new SolicitudType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Solicitud entity.
     *
     * @Route("/{id}", name="solicitud_update")
     * @Method("PUT")
     * @Template("hnrsircimBundle:Solicitud:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Solicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SolicitudType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('solicitud_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Solicitud entity.
     *
     * @Route("/{id}", name="solicitud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('hnrsircimBundle:Solicitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Solicitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('solicitud'));
    }

    /**
     * Creates a form to delete a Solicitud entity by id.
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
