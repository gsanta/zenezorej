<?php

namespace Zenezorej\UserPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DemoController extends Controller
{
   public function indexAction()
    {
    	
        return $this->render('ZenezorejUserPagesBundle:Demo:index.html.twig');
    }

    public function mesehosokAction()
    {
    	$figures = array( 
    		"bundles/zenezorejuserpages/img/mesehosok/mst_big.jpg" => "Medve Ede, Sihu Huba, Au Tóni (m,s,t)",
    		"bundles/zenezorejuserpages/img/mesehosok/v_big.jpg" => "Vau Vali (v)",
    		"bundles/zenezorejuserpages/img/mesehosok/p_big.jpg" => "Pipa Pista (p)",
    		"bundles/zenezorejuserpages/img/mesehosok/c_big.jpg" => "Cincin Vezér (c)",
    		"bundles/zenezorejuserpages/img/mesehosok/k_big.jpg" => "Kakas Lovag (k)",
    		'bundles/zenezorejuserpages/img/mesehosok/f_big.jpg' => "Lágy Szellő (f)",
    		"bundles/zenezorejuserpages/img/mesehosok/h_big.jpg" => "Meleg Lehelet (h)",
    		"bundles/zenezorejuserpages/img/mesehosok/z_big.jpg" => "Zim Züm (z)",
    		"bundles/zenezorejuserpages/img/mesehosok/d_big.jpg" => "Dob (d)",
    		"bundles/zenezorejuserpages/img/mesehosok/j_big.jpg" => "Pinokkió (j)",
    		"bundles/zenezorejuserpages/img/mesehosok/n_big.jpg" => "Nénó Zénó (n)",
    		"bundles/zenezorejuserpages/img/mesehosok/sz_big.jpg" => "Kígyó Sziszi (sz)",
    		"bundles/zenezorejuserpages/img/mesehosok/g_big.jpg" => "Gág Ági (g)",
    		"bundles/zenezorejuserpages/img/mesehosok/r_big.jpg" => "Moto Rozi (r)",
    		"bundles/zenezorejuserpages/img/mesehosok/b_big.jpg" => "Bubo Réka (b)",
    		"bundles/zenezorejuserpages/img/mesehosok/gy_big.jpg" => "Gy, a hintapaci (gy)",
    		"bundles/zenezorejuserpages/img/mesehosok/cs_big.jpg" => "Csibe Csabi (cs)",
    		"bundles/zenezorejuserpages/img/mesehosok/ny_big.jpg" => "Nyau Cili (ny)",
    		"blank" => "Zsupszi, a tanuszi (zs)",
    		"blank" => "Tyúk Olga (ty)",
    		"blank" => "Zokni Zoli (ly)"
    	);

        return $this->render('ZenezorejUserPagesBundle:Demo:mesehosok.html.twig', array( "figures" => $figures ) );
    }
}