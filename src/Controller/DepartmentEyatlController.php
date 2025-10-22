<?php
namespace App\Controller;

use App\Entity\DepartementEyatl;
use App\Form\DepartmentEyatlType; // adjust if your form class name differs
use App\Repository\DepartementEyatlRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DepartmentEyatlController extends AbstractController
{
    // LIST all departments (authors-style "show" page)
    #[Route('/showdepartmenteyatl', name: 'app_showdepartmenteyatl')]
    public function showDepartmentEyatl(DepartementEyatlRepository $repo): Response
    {
        return $this->render('department_eyatl/showdepartmenteyatl.html.twig', [
            'listdepartmenteyatl' => $repo->findAll(),
        ]);
    }

    // ADD a department (authors-style add form)
    #[Route('/adddepartmenteyatl', name: 'app_adddepartmenteyatl')]
    public function addDepartmentEyatl(ManagerRegistry $m, Request $req): Response
    {
        $em = $m->getManager();
        $d  = new DepartementEyatl();

        $form = $this->createForm(DepartmentEyatlType::class, $d);
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($d);
            $em->flush();
            return $this->redirectToRoute('app_showdepartmenteyatl');
        }

        return $this->render('department_eyatl/addformdepartmenteyatl.html.twig', [
            'f' => $form,
        ]);
    }

    // DETAILS page for one department (authors-style "details")
    #[Route('/detailsdepartmenteyatl/{id}', name: 'app_detailsdepartmenteyatl')]
    public function detailsDepartmentEyatl(DepartementEyatlRepository $repo, int $id): Response
    {
        $d = $repo->find($id);
        if (!$d) {
            return $this->redirectToRoute('app_showdepartmenteyatl');
        }

        return $this->render('department_eyatl/detailsdepartmenteyatl.html.twig', [
            'department' => $d,
        ]);
    }
}
