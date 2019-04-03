<?php

/*
 * This file is part of the Kimai CustomCSSBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\CustomCSSBundle\Controller;

use App\Controller\AbstractController;
use KimaiPlugin\CustomCSSBundle\Entity\CustomCss;
use KimaiPlugin\CustomCSSBundle\Form\CustomCssType;
use KimaiPlugin\CustomCSSBundle\Repository\CustomCssRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/admin/custom-css")
 * @Security("is_granted('ROLE_SUPER_ADMIN') or is_granted('edit_custom_css')")
 */
class CustomCssController extends AbstractController
{
    /**
     * @var CustomCssRepository
     */
    protected $repository;

    /**
     * @param CustomCssRepository $repository
     */
    public function __construct(CustomCssRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(path="", name="custom_css", methods={"GET", "POST"})

     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $entity = $this->repository->getCustomCss();

        $form = $this->getEditForm($entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var CustomCss $entity */
            $entity = $form->getData();
            try {
                $this->repository->saveCustomCss($entity);
                $this->flashSuccess('action.update.success');
            } catch (\Exception $ex) {
                $this->flashError($ex->getMessage());
            }
        }

        return $this->render('@CustomCSS/index.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
            'rulesets' => $this->repository->getPredefinedStyles(),
        ]);
    }

    /**
     * @param CustomCss $entity
     * @return \Symfony\Component\Form\FormInterface
     */
    protected function getEditForm(CustomCss $entity)
    {
        return $this->createForm(CustomCssType::class, $entity, [
            'action' => $this->generateUrl('custom_css'),
        ]);
    }
}
