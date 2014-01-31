<?php

namespace Zenezorej\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZenezorejDemoBundle:Default:index.html.twig');
    }

    public function mesehosokAction()
    {

    	$figures = array( 
    		"bundles/zenezorejdemo/img/mesehosok/mst_big.jpg" => "Medve Ede, Sihu Huba, Au Tóni (m,s,t)",
    		"bundles/zenezorejdemo/img/mesehosok/v_big.jpg" => "Vau Vali (v)",
    		"bundles/zenezorejdemo/img/mesehosok/p_big.jpg" => "Pipa Pista (p)",
    		"bundles/zenezorejdemo/img/mesehosok/c_big.jpg" => "Cincin Vezér (c)",
    		"bundles/zenezorejdemo/img/mesehosok/k_big.jpg" => "Kakas Lovag (k)",
    		'bundles/zenezorejdemo/img/mesehosok/f_big.jpg' => "Lágy Szellő (f)",
    		"bundles/zenezorejdemo/img/mesehosok/h_big.jpg" => "Meleg Lehelet (h)",
    		"bundles/zenezorejdemo/img/mesehosok/z_big.jpg" => "Zim Züm (z)",
    		"bundles/zenezorejdemo/img/mesehosok/d_big.jpg" => "Dob (d)",
    		"bundles/zenezorejdemo/img/mesehosok/j_big.jpg" => "Pinokkió (j)",
    		"bundles/zenezorejdemo/img/mesehosok/n_big.jpg" => "Nénó Zénó (n)",
    		"bundles/zenezorejdemo/img/mesehosok/sz_big.jpg" => "Kígyó Sziszi (sz)",
    		"bundles/zenezorejdemo/img/mesehosok/g_big.jpg" => "Gág Ági (g)",
    		"bundles/zenezorejdemo/img/mesehosok/r_big.jpg" => "Moto Rozi (r)",
    		"bundles/zenezorejdemo/img/mesehosok/b_big.jpg" => "Bubo Réka (b)",
    		"bundles/zenezorejdemo/img/mesehosok/gy_big.jpg" => "Gy, a hintapaci (gy)",
    		"bundles/zenezorejdemo/img/mesehosok/cs_big.jpg" => "Csibe Csabi (cs)",
    		"bundles/zenezorejdemo/img/mesehosok/ny_big.jpg" => "Nyau Cili (ny)",
    		"blank" => "Zsupszi, a tanuszi (zs)",
    		"blank" => "Tyúk Olga (ty)",
    		"blank" => "Zokni Zoli (ly)"
    	);

        return $this->render('ZenezorejDemoBundle:Default:mesehosok.html.twig', array( "figures" => $figures ) );
    }
}
