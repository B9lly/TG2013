<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use hnr\sircimBundle\Entity\Cita;
use hnr\sircimBundle\Form\CitaType;

/**
 * Cita controller.
 *
 * @Route("/cita")
 */
class CitaController extends Controller
{
    /**
     * Lists all Cita entities.
     *
     * @Route("/", name="cita")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('hnrsircimBundle:Cita')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Cita entity.
     *
     * @Route("/", name="cita_create")
     * @Method("POST")
     * @Template("hnrsircimBundle:Cita:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Cita();
        
        $form = $this->createForm(new CitaType($this->getRegionesCh(), $this->getPosicionesCh()) , $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setCiEstado('Pendiente');
            $entity->getIdSolicitud()->setSoTipo(1);            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cita_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Cita entity.
     *
     * @Route("/new", name="cita_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cita();
        $form   = $this->createForm(new CitaType($this->getRegionesCh(), $this->getPosicionesCh()), $entity);
        
        /*$form = $this->createFormBuilder($entity)
                ->add('idMntExpediente', null, array('label' => 'Registro'))
                ->getForm();*/
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Cita entity.
     *
     * @Route("/{id}", name="cita_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Cita')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Cita entity.
     *
     * @Route("/{id}/edit", name="cita_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Cita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cita entity.');
        }

        $editForm = $this->createForm(new CitaType($this->getRegionesCh(), $this->getPosicionesCh()), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Cita entity.
     *
     * @Route("/{id}", name="cita_update")
     * @Method("PUT")
     * @Template("hnrsircimBundle:Cita:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:Cita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CitaType($this->getRegionesCh(), $this->getPosicionesCh()), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cita_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Cita entity.
     *
     * @Route("/{id}", name="cita_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('hnrsircimBundle:Cita')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cita entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cita'));
    }

    /**
     * Creates a form to delete a Cita entity by id.
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
    
        
    /**
     * @Route("/regiones/get", name="get_regiones", options={"expose"=true})
     * @Method("GET")
     */
    public function getRegionesAction() {
        
        $request = $this->getRequest();
        $nomEstudio = $request->get('nomEstudio');
        $em = $this->getDoctrine()->getEntityManager();
        
        $dql = "SELECT reg.reNombre FROM hnrsircimBundle:EstudioRegion es_reg 
                JOIN es_reg.idRegion reg                    
                JOIN es_reg.idEstudio es
                    WHERE reg.id = es_reg.idRegion
                    AND es.id = es_reg.idEstudio
                    AND es.esNombre = :nomEstudio";
        
        $regiones['regs'] = $em->createQuery($dql)
                ->setParameter('nomEstudio', $nomEstudio)
                ->getArrayResult();
        
        return new Response(json_encode($regiones));
    }
    
    /**
     * @Route("/posiciones/get", name="get_posiciones", options={"expose"=true})
     * @Method("GET")
     */
    public function getPosicionesAction() {
        
        $request = $this->getRequest();
        $nomEstudio = $request->get('nomEstudio');
        $em = $this->getDoctrine()->getEntityManager();
        
        $dql = "SELECT po.poNombre FROM hnrsircimBundle:EstudioPosicion es_po 
                JOIN es_po.idPosicion po                    
                JOIN es_po.idEstudio es
                    WHERE po.id = es_po.idPosicion
                    AND es.id = es_po.idEstudio
                    AND es.esNombre = :nomEstudio";
        
        $regiones['regs'] = $em->createQuery($dql)
                ->setParameter('nomEstudio', $nomEstudio)
                ->getArrayResult();
        
        return new Response(json_encode($regiones));
    }
    
    public function getRegionesCh(){
        
        $regiones = array();
        
        $em = $this->getDoctrine()->getEntityManager();

        $result = $em->getRepository('hnrsircimBundle:Region')->findAll();
        
        foreach ($result as $reg){
            $regiones[ $reg->getReNombre() ] = $reg->getReNombre();
        }
        
        return $regiones;
        
    }
    
    public function getPosicionesCh(){
        
        $posiciones = array();
        
        $em = $this->getDoctrine()->getEntityManager();

        $result = $em->getRepository('hnrsircimBundle:Posicion')->findAll();
        
        foreach ($result as $pos){
            $posiciones[ $pos->getPoNombre() ] = $pos->getPoNombre();
        }
        
        return $posiciones;
        
    }
 
    /**
     * @Route("/paciente/get", name="get_infopaciente", options={"expose"=true})
     * @Method("GET")
     */
    public function getInfoPacienteAction() {
        
        $request = $this->getRequest();
        $numExpediente = $request->get('numExpediente');
        
        $conn = $this->get('doctrine.dbal.siap_connection');
        $info_pac['regs'] = $conn->fetchAll( "SELECT * FROM vw_paciente_info WHERE \"NumExpediente\" = '".$numExpediente."'" );
        
        return new Response(json_encode($info_pac));
    }
}
