<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security", name="app_security")
     */
    public function index(): Response
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/security/login", name="login")
     */
    public function login(Request $request,EntityManagerInterface $manager): Response
    {   
        $Login = $request -> request -> get("identifiant");
        $password = $request -> request -> get("password");
        $reponse = $manager -> getRepository(Utilisateur :: class) -> findOneBy([ 'login' => $Login]);
        if ($reponse == NULL){
            $repons ="Utilisateur inconnu, veuillez reessayer !";
             } 
        else{
             $code = $reponse -> getPassword();
             if (password_verify($password,$code)){
                 $repons = "Acces autorisé";
             }else {
                $repons = "MOT DE PASSE INVALIDE !";
             }
             
             }
        return $this->render('security/login.html.twig', [
            'login' => $repons,
        ]);
    }

    /**
     * @Route("/security/logout", name="logout")
     */
    public function logout(interfacelogout $logout): Response
    {
        $vs = $logout -> get('nomVar');
        $val=44;
        $logout -> set('nomVar',$val);
        return $this->render ('security/index.html.twig', ['name' => $vs]);
    }



}
