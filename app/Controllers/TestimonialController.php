<?php
//require_once(APP."Config/helper.php");
class TestimonialController
{

    public function __construct()
    {
    }
    public function index()
    {
        $db = new Testimonial();
        $data['testimonials'] = $db->getAllTestimonials();
        View::load("testimonial/index", $data);
    }

    public function add()
    {
        $db = new Testimonial();
        $data['testimonials'] = $db->selectExemples();        
        View::load("testimonial/add",$data);
    }


    public function store()
    {

        if (isset($_POST['submit'])) {
            $titre = $_POST['titre'];
            $message = $_POST['message'];
            $photo = isset($_FILES['photo']) ? basename($_FILES['photo']['name']) : "incognito.png";


            $data = array(
                "titre" => $titre,
                "message" => $message,
                "photo" => $photo
            );
            if (imageConvenable()) {
                $db = new Testimonial();
                if ($db->insertTestimonial($data)) {

                    View::load("testimonial/add", ["success" => "Data Created successfully"]);
                } else {
                    View::load("testimonial/add");
                }
            }
        }
    }

    public function lire($id)
    {
        $db = new Testimonial();
        $data['testimonial'] = $db->getTestimonial($id);
        View::load("testimonial/info", $data);
    }

    public function approuver($id)
    {
        $db = new Testimonial();
        $db->approuver($id);
        $data['testimonials'] = $db->getAllTestimonials();
        View::load("testimonial/index", $data);
    }

    public function delete($id)
    {
        $db = new Testimonial();
        $db->delete($id);
        View::load("testimonial/deleted");
    }
    
}
