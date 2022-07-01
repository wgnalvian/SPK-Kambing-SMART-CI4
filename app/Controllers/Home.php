<?php

namespace App\Controllers;

use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\User;

class Home extends BaseController
{
    public $db;
    public $kategori;
    public $user;
    public $subkategori;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();

        $this->subkategori = new SubKategori();
        $this->kategori = new Kategori();
        $this->user = session()->get('user');
    }
    public function index()
    {

        echo view('home/home');
    }
    public function addCategoryView()
    {


        echo view('home/addCategory');
    }
    public function addCategory()
    {

        if (!$this->validate([
            'kategori' => [
                'rules' => 'required', "errors" => [
                    'required' => "field ketegori harus diisi"
                ]
            ],

            "nilai_bobot" => ["rules" => 'required|numeric', "errors" => [
                "required" => "field nilai bobot harus diisi"
            ]]
        ])) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        } else {
            $idUser = session()->get('user')['id'];
            $this->kategori->insert([
                'id_user' => $idUser,
                'kategori' => $this->request->getGetPost('kategori'),
                'nilai_bobot' => $this->request->getGetPost('nilai_bobot'),

            ]);


            return redirect()->back();
        }
    }
    public function addSubCategoryView()
    {
        
        $kategori = $this->kategori->where('id_user', $this->user['id'])->findAll();
        if($kategori){

            echo view('home/addSubCategory', ['kategori' => $kategori]);
        }else{
            return view('errors/kempty');
        }
    }
    public function addSubCategory()
    {

        if (!$this->validate([
            'kategori' => [
                'rules' => 'required', "errors" => [
                    'required' => "field ketegori harus diisi"
                ]
            ],
            "subkategori" => ["rules" => 'required', "errors" => [
                "required" => "field subkategori harus diisi"
            ]],

            "nilai_utility" => ["rules" => 'required|numeric', "errors" => [
                "required" => "field nilai utility harus diisi"
            ]]
        ])) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        } else {

            $this->subkategori->insert([
                'id_kategori' => $this->request->getGetPost('kategori'),
                'subkategori' => $this->request->getGetPost('subkategori'),
                'nilai_utility' => $this->request->getGetPost('nilai_utility'),

            ]);


            return redirect()->back();
        }
    }
    public function subcategory()
    {

    $query = $this->db->query("SELECT kategori.kategori,kategori.nilai_bobot,subkategori.subkategori,subkategori.nilai_utility FROM `subkategori` JOIN kategori ON kategori.id = subkategori.id_kategori ");
    if($query){

        echo view('home/category',["query" => $query->getResult()]);
    }else{
        echo view('errors/kempty');
    }
  
    }
    public function category(){

        $kategory = $this->kategori->findAll();
        if(!$kategory){
            return view('errors/kempty');
        }else{
            return view('home/categoryreal',['kategori'=> $kategory]);
        }

    }
    public function deleteCategory(){
        $this->db->query('DELETE FROM subkategori');
        $this->db->query("DELETE FROM kategori");
        return redirect()->back();
    }
}
