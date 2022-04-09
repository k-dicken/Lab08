<?php
/*
 * Author: Kylee Dicken
 * Date: 3/31/2022
 * Name: guest_controller.class.php
 * Description: guest controller
 */

class GuestController {
    private $guest_model;

    public function __construct()
    {
        //create an object of the ToyModel class
        $this->guest_model = new GuestModel();
    }

    //list all toys
    public function index()
    {
        //create an object of the GuestView class
        $view = new Index();
        $view->display();
    }

    public function show() {
        //retrieve all toys and store them in an array
        $guests = $this->guest_model->getGuests();

        //if there is no toy to display, display an error message
        if (!guests) {
            header("Location: index.php?action=error&message=No guests were found.");
            exit();
        }

        //create an object of the GuestView class
        $view = new GuestShow();

        //display all toys
        $view->display($guests);
    }

    public function sign() {
        $view = new GuestSign();
        $view->display();
    }

    //display an error message
    public function error($message)
    {
        //create an object of the Error class
        $error = new GuestError();

        //display the error page
        $error->display($message);
    }
}