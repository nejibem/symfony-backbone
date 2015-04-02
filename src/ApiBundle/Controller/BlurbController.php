<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;

use ApiBundle\Entity\Blurb;
use ApiBundle\Form\BlurbType;

class BlurbController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Collection get action
     * @var Request $request
     * @return array
     *
     * @Rest\View()
     */
    public function cgetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ApiBundle:Blurb')->findAll();

        return $entities;

        return array(
            'blurbs' => $entities,
        );
    }

    /**
     * Get action
     * @var integer $id Id of the entity
     * @return array
     *
     * @Rest\View()
     */
    public function getAction($id)
    {
        $entity = $this->getEntity($id);

        return array(
            'blurb' => $entity,
        );
    }

    /**
     * Collection post action
     * @var Request $request
     * @return View|array
     */
    public function cpostAction(Request $request)
    {
        //return $request->request->get('text');
        $validator = $this->get('validator');

        $entity = new Blurb();
        $entity->setText($request->request->get('text'));

        $errors = $validator->validate($entity);
        if (count($errors) === 0)
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->view($entity, Codes::HTTP_CREATED);
        }

        return $this->view(array('errors' => $errors), Codes::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Put action
     * @var Request $request
     * @var integer $id Id of the entity
     * @return View|array
     */
    public function putAction(Request $request, $id)
    {
        $validator = $this->get('validator');

        $entity = $this->getEntity($id);
        $entity->setText($request->request->get('text'));

        $errors = $validator->validate($entity);
        if (count($errors) === 0)
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->view(null, Codes::HTTP_NO_CONTENT);
        }

        return array(
            'errors' => $errors,
        );
    }

    /**
     * Delete action
     * @var integer $id Id of the entity
     * @return View
     */
    public function deleteAction($id)
    {
        $entity = $this->getEntity($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        return $this->view(null, Codes::HTTP_NO_CONTENT);
    }

    /**
     * Get entity instance
     * @var integer $id Id of the entity
     * @return Blurb
     */
    protected function getEntity($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ApiBundle:Blurb')->find($id);

        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Blurb entity');
        }

        return $entity;
    }

}
