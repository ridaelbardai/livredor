<?php

class Testimonial extends DB
{
    private $table = "testimonials";
    private $conn;

    public function __construct()
    {
       $this->conn = $this->connect();
    }

    public function getAllTestimonials()
    {
        return $this->conn->get($this->table);
    }

    public function insertTestimonial($data)
    {
        return $this->conn->insert($this->table,$data);
    }

    public function deleteTestimonial($id)
    {
       return $this->conn->where('id', $id)->delete($this->table);
    }

    public function getTestimonial($id)
    {
        return $this->conn->where('id', $id)->get($this->table);
    }

    public function approuver($id)
    {
        $data = Array (
            'etat' => 'a'
        );
        return $this->conn->where('id', $id)->update($this->table,$data);
    }

    public function delete($id)
    {
        return $this->conn->where('id', $id)->delete($this->table);
    }

    public function selectExemples()
    {
        return $this->conn->where('etat','a')->get($this->table,4,null);
    }
}