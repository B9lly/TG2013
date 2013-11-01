<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use hnr\sircimBundle\Entity\EstudioRadiologico;
use hnr\sircimBundle\Form\EstudioRadiologicoType;
use hnr\sircimBundle\Entity\EstudioRadTamPlaca;
/**
 * EstudioRadiologico controller.
 *
 * @Route("/estudioradiologico")
 */
class EstudioRadiologicoController extends Controller
{
    /**
     * Lists all EstudioRadiologico entities.
     *
     * @Route("/", name="estudioradiologico")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('hnrsircimBundle:EstudioRadiologico')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new EstudioRadiologico entity.
     *
     * @Route("/", name="estudioradiologico_create")
     * @Method("POST")
     * @Template("hnrsircimBundle:EstudioRadiologico:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new EstudioRadiologico();
        
        /*$placa = new EstudioRadTamPlaca();
        $placa2 = new EstudioRadTamPlaca();
        $placa3 = new EstudioRadTamPlaca();
        $entity->getPlacas()->add($placa);
        $entity->getPlacas()->add($placa2);
        $entity->getPlacas()->add($placa3);
        $entity->setPlacas($entity->getPlacas());*/
        
        $form = $this->createForm(new EstudioRadiologicoType($this->getRegionesCh(), $this->getPosicionesCh()), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->getIdSolicitud()->setSoTipo(2);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudioradiologico_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new EstudioRadiologico entity.
     *
     * @Route("/new", name="estudioradiologico_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EstudioRadiologico();
        
        /*$placa = new EstudioRadTamPlaca();
        $placa2 = new EstudioRadTamPlaca();
        $placa3 = new EstudioRadTamPlaca();
        $entity->getPlacas()->add($placa);
        $entity->getPlacas()->add($placa2);
        $entity->getPlacas()->add($placa3);*/
        
        $form   = $this->createForm(new EstudioRadiologicoType($this->getRegionesCh(), $this->getPosicionesCh()), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EstudioRadiologico entity.
     *
     * @Route("/{id}", name="estudioradiologico_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioRadiologico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioRadiologico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EstudioRadiologico entity.
     *
     * @Route("/{id}/edit", name="estudioradiologico_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('hnrsircimBundle:EstudioRadiologico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioRadiologico entity.');
        }
        
        $originalPlacas = array();

        // Create an array of the current Tag objects in the database 
        foreach ($entity->getPlacas() as $placa) { $originalPlacas[] = $placa; }

        $editForm = $this->createForm(new EstudioRadiologicoType($this->getRegionesCh(), $this->getPosicionesCh()), $entity); 
        $deleteForm = $this->createDeleteForm($id);

        // filter $originalTags to contain tags no longer present 
        foreach ($entity->getPlacas() as $placa) { 
            foreach ($originalPlacas as $key => $toDel) { 
                if ($toDel->getId() === $placa->getId()) {
                    unset($originalPlacas[$key]); 
                    
                } } }
        
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing EstudioRadiologico entity.
     *
     * @Route("/{id}", name="estudioradiologico_update")
     * @Method("PUT")
     * @Template("hnrsircimBundle:EstudioRadiologico:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager(); 
        $task = $em->getRepository('hnrsircimBundle:EstudioRadiologico')->find($id);

        if (!$task) { 
            throw $this->createNotFoundException('No task found for is '.$id); 
        }

        $originalTags = array();

        // Create an array of the current Tag objects in the database 
        foreach ($task->getPlacas() as $tag) { 
            $originalTags[] = $tag; 
        }

        $editForm = $this->createForm(new EstudioRadiologicoType($this->getRegionesCh(), $this->getPosicionesCh()), $task);

        $editForm->bind($this->getRequest());

        if ($editForm->isValid()) {

        // filter $originalTags to contain tags no longer present 
            foreach ($task->getPlacas() as $tag) { 
                foreach ($originalTags as $key => $toDel) { 
                    if ($toDel->getId() === $tag->getId()) { 
                        unset($originalTags[$key]); 
                        
                    } } }
        

        // remove the relationship between the tag and the Task 
            foreach ($originalTags as $tag) { 
            // remove the Task from the Tag // 
            //$tag->getPlacas()->removeElement($task);
        

// if it were a ManyToOne relationship, remove the relationship like this // 
            //$tag->setTask(null);
        

                $em->persist($tag);

// if you wanted to delete the Tag entirely, you can also do that 
                $em->remove($tag); 
            
            }

            $em->persist($task); 
            $em->flush();

// redirect back to some edit page 
            return $this->redirect($this->generateUrl('estudioradiologico_edit', array('id' => $id))); 
            
        } 
        return array( 'entity' => $entity, 'edit_form' => $editForm->createView(), 'delete_form' => $deleteForm->createView(), );
    }

    /**
     * Deletes a EstudioRadiologico entity.
     *
     * @Route("/{id}", name="estudioradiologico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('hnrsircimBundle:EstudioRadiologico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstudioRadiologico entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estudioradiologico'));
    }

    /**
     * Creates a form to delete a EstudioRadiologico entity by id.
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
