<?php

/*
 * This file is part of the "Custom CSS Bundle" for Kimai.
 * All rights reserved by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\CustomCSSBundle\Controller;

use App\Controller\AbstractController;
use App\Utils\PageSetup;
use KimaiPlugin\CustomCSSBundle\Entity\CustomCss;
use KimaiPlugin\CustomCSSBundle\Form\CustomCssType;
use KimaiPlugin\CustomCSSBundle\Repository\CustomCssRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route(path: '/custom-css')]
#[IsGranted('edit_custom_css')]
class CustomCssController extends AbstractController
{
    #[Route(path: '', name: 'custom_css', methods: ['GET', 'POST'])]
    public function indexAction(Request $request, CustomCssRepository $repository): Response
    {
        $entity = $repository->getCustomCss();

        $form = $this->createForm(CustomCssType::class, $entity, [
            'action' => $this->generateUrl('custom_css'),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var CustomCss $entity */
            $entity = $form->getData();
            try {
                $repository->saveCustomCss($entity);
                $this->flashSuccess('action.update.success');
            } catch (\Exception $ex) {
                $this->flashUpdateException($ex);
            }
        }

        $rulesets = [];
        if ($this->isGranted('select_custom_css')) {
            $rulesets = $repository->getPredefinedStyles();
        }

        $page = new PageSetup('Custom CSS');
        $page->setHelp('plugin-custom-css.html');

        return $this->render('@CustomCSS/index.html.twig', [
            'page_setup' => $page,
            'entity' => $entity,
            'form' => $form->createView(),
            'rulesets' => $rulesets,
        ]);
    }
}
