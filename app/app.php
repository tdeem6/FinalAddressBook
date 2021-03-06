<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/AddressBook.php';

    session_start();

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }
//empty array since no contacts are stored
    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array (
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
          return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->post("/create_contact", function() use ($app) {
      if (!empty($_POST['name'])) {
        $new_contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);
        $new_contact->save();
        return $app['twig']->render('createcontacts.html.twig', array('contact' => $new_contact));
      }
        return $app['twig']->render('create_contacts.html.twig');
     });

    $app->post("/deleted_contact", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contact.html.twig');
    });

    return $app;
 ?>
