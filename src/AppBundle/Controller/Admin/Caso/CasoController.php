<?php

namespace AppBundle\Controller\Admin\Caso;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\IncidenciaType;
use AppBundle\Form\IncidenciaAdminType;
use AppBundle\Form\ComentarioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CasoController extends Controller {

    /**
     * @Route("admin/caso/lista", name="caso_admin_lista")
     */
    public function listaAction(Request $request) {
        $mensaje = '';
        $arUsuario = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createFormBuilder()
                ->add('BtnEliminar', SubmitType::class, array('label' => 'Eliminar'))
                ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('BtnEliminar')->isClicked()) {
                $arrSeleccionados = $request->request->get('ChkSeleccionar');
                if (count($arrSeleccionados) > 0) {
                    foreach ($arrSeleccionados AS $codigoIncidencia) {
                        $arIncidencia = $em->getRepository("AppBundle:Incidencia")->find($codigoIncidencia);
                        if ($arIncidencia->getEstadoAtendido() == 0) {
                            $arComentario = $em->getRepository("AppBundle:Comentario")->findBy(array('codigoIncidenciaFk' => $codigoIncidencia));
                            if (count($arComentario > 0)) {
                                foreach ($arComentario as $arComentario) {
                                    $em->remove($arComentario);
                                }
                            }
                            $em->remove($arIncidencia);
                        } else {
                            $mensaje = 'No se puede eliminar el caso despues de atendido';
                        }
                    }
                    $em->flush();
                }
            }
        }
        //Validacion tipo de usuario para mostrar el listado de las incidencias reportados
        /*if ($arUsuario->getRolRel()->getNombre() == "ROLE_SUPER_ADMIN") {*/
            $arIncidencia = $em->getRepository('AppBundle:Incidencia')->findAll();
        /*} else {
            $arIncidencia = $em->getRepository('AppBundle:Incidencia')->findBy(array('usuarioAsignado' => $arUsuario->getUsername()));
        }*/
        return $this->render('AppBundle:Admin/Caso:lista.html.twig', array('arIncidencia' => $arIncidencia,
                    'mensaje' => $mensaje,
                    'form' => $form->createView()));
    }

    /**
     * @Route("admin/caso/nuevo/{codigoIncidencia}", name="caso_admin_nuevo")
     */
    public function nuevoAction(Request $request, $codigoIncidencia) {
        //Crear formulario para el registro de caso
        $em = $this->getDoctrine()->getManager();
        if ($codigoIncidencia != 0) {
            $arIncidencia = $em->getRepository('AppBundle:Incidencia')->find($codigoIncidencia);
        } else {
            $arIncidencia = new \AppBundle\Entity\Incidencia();
            $arUsuario = $this->getUser();
            $arIncidencia->setUsuario($arUsuario->getUsername());
            $arIncidencia->setFechaRegistro(new \DateTime("now"));
            $arIncidencia->setClienteRel($arUsuario->getClienteRel());
        }
        $form = $this->createForm(IncidenciaType::class, $arIncidencia);
        $form->handleRequest($request);
        $Form = $request->request->all();
        //Validar el formulario para realizar el envio y almcenamiento de los datos
        if ($form->isSubmitted() && $form->isValid()) {
            $arIncidencia = $form->getData();
            $em->persist($arIncidencia);
            $em->flush();
            if ($codigoIncidencia == 0) {
                //$correoEnviar = array('sogaimplementacion@gmail.com', 'sogasoporte@gmail.com', 'sogasoporte2@gmail.com');
                $correoEnviar = array('felipemesa14@gmail.com');
                $this->enviarCorreo($arIncidencia, $correoEnviar, '');
            }
            return $this->redirectToRoute('caso_admin_lista');
        }
        return $this->render('AppBundle:Admin/Caso:nuevo.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("admin/caso/editarAdmin/{codigoIncidencia}", name="caso_admin_editar")
     */
    public function editarAdminAction(Request $request, $codigoIncidencia) {
        //Crear formulario para el registro de caso
        $em = $this->getDoctrine()->getManager();
        $arIncidencia = $em->getRepository('AppBundle:Incidencia')->find($codigoIncidencia);
        $form = $this->createForm(IncidenciaAdminType::class, $arIncidencia);
        $form->handleRequest($request);
        //Validar el formulario para realizar el envio y almcenamiento de los datos
        if ($form->isSubmitted() && $form->isValid()) {
            $arIncidencia = $form->getData();
            $arIncidencia->setFechaSolucion(new \DateTime("now"));
            $em->persist($arIncidencia);
            $em->flush();
            if ($arIncidencia->getEstadoSolucionado() == 1) {
                $correoEnviar = $arIncidencia->getEmail();
                $this->enviarCorreo($arIncidencia, $correoEnviar, '');
            }
            return $this->redirectToRoute('caso_admin_lista');
        }
        return $this->render('AppBundle:Admin/Caso:editarAdmin.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("admin/caso/detalle/{codigoIncidencia}", name="caso_admin_detalle")
     */
    public function detalleAction(Request $request, $codigoIncidencia) {
        $em = $this->getDoctrine()->getManager();
        $arUsuario = $this->getUser();
        $arIncidencia = $em->getRepository('AppBundle:Incidencia')->find($codigoIncidencia);
        $arDetalleComentario = $em->getRepository('AppBundle:Comentario')->findBy(array('codigoIncidenciaFk' => $codigoIncidencia));
        //Crear formulario de comentarios
        $arComentario = new \AppBundle\Entity\Comentario();
        $form = $this->createForm(ComentarioType::class, $arComentario);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $arComentario = $form->getData();
            $arComentario->setIncidenciaRel($arIncidencia);
            $arComentario->setFechaRegistro(new \DateTime('now'));
            $arComentario->setUsername($arUsuario->getUsername());
            $em->persist($arComentario);
            $em->flush();
            if ($arUsuario->getRolRel()->getNombre() == "ROLE_ADMIN") {
                $correoEnviar = $arIncidencia->getEmail();
                $this->enviarCorreo($arIncidencia, $correoEnviar, $arComentario);
            }
            return $this->redirectToRoute('caso_admin_detalle', array('codigoIncidencia' => $codigoIncidencia));
        }
        //Crear vista detalle del incidente
        return $this->render('AppBundle:Admin/Caso:detalle.html.twig', array(
                    'arIncidencia' => $arIncidencia,
                    'form' => $form->createView(),
                    'arDetalleComentario' => $arDetalleComentario
        ));
    }

    private function enviarCorreo($arIncidencia, $correoEnviar, $arDetalleComentario) {
        $message = \Swift_Message::newInstance()
                ->setSubject('Soga soporte')
                ->setFrom('sogainformacion@gmail.com')
                ->setTo($correoEnviar)
                ->setBody($this->renderView('AppBundle:Email:nuevo.html.twig', array('arIncidencia' => $arIncidencia, 'arDetalleComentario' => $arDetalleComentario)), 'text/html');
        $this->get('mailer')->send($message);
    }

}