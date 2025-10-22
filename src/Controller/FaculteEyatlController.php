<?php
namespace App\Controller;

use App\Entity\FaculteEyatl;
use App\Form\FaculteEyatlType;
use App\Repository\FaculteEyatlRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FaculteEyatlController extends AbstractController
{
    // ✅ Show all Facultes
    #[Route('/showfaculteeyatl', name: 'app_showfaculteeyatl')]
    public function showFaculteEyatl(FaculteEyatlRepository $repo): Response
    {
        return $this->render('faculte_eyatl/showfaculteeyatl.html.twig', [
            'listfaculteeyatl' => $repo->findAll(),
        ]);
    }

    // ✅ Add new Faculte
    #[Route('/addfaculteeyatl', name: 'app_addfaculteeyatl')]
    public function addFaculteEyatl(ManagerRegistry $m, Request $req): Response
    {
        $em = $m->getManager();
        $f  = new FaculteEyatl();

        $form = $this->createForm(FaculteEyatlType::class, $f);
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($f);
            $em->flush();
            return $this->redirectToRoute('app_showfaculteeyatl');
        }

        return $this->render('faculte_eyatl/addformfaculteeyatl.html.twig', [
            'f' => $form,
        ]);
    }

    // ✅ Delete Faculte
    #[Route('/deletefaculteeyatl/{id}', name: 'app_deletefaculteeyatl')]
    public function deleteFaculteEyatl(ManagerRegistry $m, FaculteEyatlRepository $repo, int $id): Response
    {
        $em = $m->getManager();
        $faculte = $repo->find($id);

        if ($faculte) {
            $em->remove($faculte);
            $em->flush();
        }

        return $this->redirectToRoute('app_showfaculteeyatl');
    }
}
