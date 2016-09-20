<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
            return $app['twig']->render('index.html.twig', array());
        })
        ->bind('homepage')
;

$app->get('/test/', function () use ($app) {
            return $app['twig']->render('test.html.twig', array());
        })
        ->bind('testpage')
;

$app->get('/testparam/{id}', function ($id) use ($app) {
            return $app['twig']->render('testparam.html.twig', array(
                        'param1' => $id
            ));
        })
        ->bind('testparam')
;

$app->get('/listebd/{id}', function ($id) use ($app) {
            require_once 'tempdata/liste_bd_temp.php';
            return $app['twig']->render('listebd.html.twig', array(
                        'param1' => $id,
                        'listebd' => getlisteBD()
            ));
        })
        ->bind('listebd')
;

$app->get('/recherche.{cible}', function (Request $request, Silex\Application $app) {
            // TODO : nous ajouterons le code de génération de formulaire ici
        })
        ->bind('recherche')
;

$app->match('/albumdate-draft/{id}', function(Request $request,
        Silex\application $app) {
    $form = $app['form.factory']->createBuilder(FormType::class)
    ->add('album', TextType::class, array(
        'constraints' => array(new Assert\NotBlank(),
            new Assert\Length(array('min' => 2)),
            new Assert\Length(array('max' => 30))
        ),
        'attr' => array('class' => 'form-control')
    ))
    ->add('auteur', TextType::class, array(
        'constraints' => array(new Assert\NotBlank(),
            new Assert\Length(array('min' => 2)),
            new Assert\Length(array('max' => 30))
        ),
        'attr' => array('class' => 'form-control')
    ))
    ->add('editeur', TextType::class, array(
        'constraints' => array(new Assert\NotBlank(),
            new Assert\Length(array('min' => 2)),
            new Assert\Length(array('max' => 30))
        ),
        'attr' => array('class' => 'form-control')
    ))
    ->add('parution', DateType::class, array(
        'constraints' => array(new Assert\NotBlank()),
        'attr' => array('class' => 'form-control'),
        'widget' => 'single_text',
        // do not render as type="date", to avoid HTML5 date pickers
        'html5' => true,
        // add a class that can be selected in JavaScript
        //        'attr' => ['class' => 'js-datepicker'],
    ))
    ->add('save', SubmitType::class, array(
        'attr' => array('label' => 'Enregistrer', 'class'=>'btn btn-success'),
    ))
    ->add('reset', ResetType::class, array(
        'attr' => array('label' => 'Effacer', 'class'=>'btn btn-default'),
    ))
    ->getForm();
        // TODO : nous ajouterons le code de génération du formulaire ici
})
->bind('albumdraft')
;

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
