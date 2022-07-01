<?php

namespace App\Controllers;

use App\Models\ChooseData;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\User;
use Exception;

class Smart extends BaseController
{
    public $chooseData;
    public $db;
    public $kategori;
    public $user;
    public $subkategori;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->chooseData = new ChooseData();
        $this->subkategori = new SubKategori();
        $this->kategori = new Kategori();
        $this->user = session()->get('user');
    }
    public function index()
    {
        $data = $this->getSubCategory();


        return view('SPK/chooseData', ['data' => $data]);
    }
    public function chooseDataAction()
    {
        $data = $this->getSubCategory();
        if ($this->chooseData->where('id_user', $this->user['id'])->orderBy('num_choose', 'desc')->first() != null) {

            $numChoose = (int) $this->chooseData->where('id_user', $this->user['id'])->orderBy('num_choose', 'desc')->first()['num_choose']   + 1;
        } else {
            $numChoose = 1;
        }



        foreach ($data as $item) {
            if (!$this->validate([
                str_replace(" ", "_", $item['kategori']) => 'required'
            ])) {
                session()->setFlashdata('error', $this->validator->getErrors());
                return redirect()->back()->withInput();
            } else {
                $subkategori = $this->subkategori->Where('subkategori', $this->request->getGetPost(str_replace(" ", "_", $item['kategori'])))->first();


                $this->chooseData->insert([
                    'num_choose' => $numChoose,
                    'id_user' => $this->user['id'],
                    'id_subkategori' => $subkategori['id']
                ]);
            }
        }

        return redirect()->to('/spk/data');
    }
    public function dataChoosen()
    {
        $query = $this->db->query("SELECT choose_data.id, subkategori.subkategori, kategori.kategori,choose_data.num_choose FROM subkategori JOIN choose_data ON subkategori.id = choose_data.id_subkategori JOIN kategori ON subkategori.id_kategori = kategori.id WHERE choose_data.id_user = " . $this->user['id'] . " ORDER BY choose_data.num_choose ASC, kategori.kategori DESC ;")->getResult();

        $temp = null;
        $data = [];
        $i = 0;
        $j = 0;

        foreach ($query as $item) {
            if ($temp) {
                if ($temp == $item->num_choose) {
                    $data[$i]['choose_id'] = $item->id;
                    $data[$i]['num_choose'] = $item->num_choose;
                    $data[$i]['kategori'][$j] = $item->kategori;
                    $data[$i]['subkategori'][$j] = $item->subkategori;
                    $j++;
                } else {
                    $temp = $item->num_choose;
                    $i++;
                    $j = 0;
                    $data[$i]['choose_id'] = $item->id;
                    $data[$i]['num_choose'] = $item->num_choose;
                    $data[$i]['kategori'][$j] = $item->kategori;
                    $data[$i]['subkategori'][$j] = $item->subkategori;
                    $j++;
                }
            } else {
                $temp = $item->num_choose;
                $data[$i]['choose_id'] = $item->id;
                $data[$i]['num_choose'] = $item->num_choose;
                $data[$i]['kategori'][$j] = $item->kategori;
                $data[$i]['subkategori'][$j] = $item->subkategori;
                $j++;
            }
        }


        return view('/SPK/dataChoosen', ['data' => $data]);
    }

    public function spkCount()
    {
        $query = $this->db->query("SELECT subkategori.subkategori,subkategori.id_kategori,subkategori.nilai_utility, kategori.kategori,choose_data.num_choose FROM subkategori JOIN choose_data ON subkategori.id = choose_data.id_subkategori JOIN kategori ON subkategori.id_kategori = kategori.id WHERE choose_data.id_user = " . $this->user['id'] . " ORDER BY choose_data.num_choose ASC, kategori.kategori DESC ;")->getResult();

      
        if ($query) {
            $temp = null;
            $data = [];
            $i = 0;
            $j = 0;

            foreach ($query as $item) {
                $nilai_min_subkategori = $this->db->query('SELECT MIN(nilai_utility) as min FROM subkategori WHERE id_kategori= ' . $item->id_kategori)->getResult()[0]->min;
                $nilai_max_subkategori = $this->db->query('SELECT MAX(nilai_utility) as max FROM subkategori WHERE id_kategori= ' . $item->id_kategori)->getResult()[0]->max;
                $penyebut =  ($nilai_max_subkategori - $nilai_min_subkategori);
                $pembilang = $item->nilai_utility - $nilai_min_subkategori;
                if($penyebut == 0 && $pembilang == 0){
                    $bobot_utility = 0;
                }else{

                    $bobot_utility = ($item->nilai_utility - $nilai_min_subkategori) / $penyebut;
                }
                
               
                    
                   
               
                  
                

                if ($temp) {
                    if ($temp == $item->num_choose) {
                        $data[$i]['num_choose'] = $item->num_choose;
                        $data[$i]['kategori'][$j] = $item->kategori;
                        $data[$i]['subkategori'][$j] = $item->subkategori;
                        $data[$i]['nilai_utility'][$j] = $item->nilai_utility;
                        $data[$i]['bobot_utility'][$j] = $bobot_utility;
                        $j++;
                    } else {
                        $temp = $item->num_choose;
                        $i++;
                        $j = 0;
                        $data[$i]['num_choose'] = $item->num_choose;
                        $data[$i]['kategori'][$j] = $item->kategori;
                        $data[$i]['subkategori'][$j] = $item->subkategori;
                        $data[$i]['nilai_utility'][$j] = $item->nilai_utility;
                        $data[$i]['bobot_utility'][$j] = $bobot_utility;
                        $j++;
                    }
                } else {
                    $temp = $item->num_choose;
                    $data[$i]['num_choose'] = $item->num_choose;
                    $data[$i]['kategori'][$j] = $item->kategori;
                    $data[$i]['subkategori'][$j] = $item->subkategori;
                    $data[$i]['nilai_utility'][$j] = $item->nilai_utility;
                    $data[$i]['bobot_utility'][$j] = $bobot_utility;
                    $j++;
                }
            }
            // hitung nilai normalisasi
            $total_bobot =  $this->db->query("SELECT SUM(nilai_bobot) as total_bobot FROM kategori ")->getResult()[0]->total_bobot;

            $nilai_normalisasi = [];
            $i = 0;
            foreach ($data[0]['kategori'] as $item) {
                $kategori =   $this->kategori->where('kategori', $item)->first();

                $nilai_normalisasi[$i]['kategori'] = $kategori['kategori'];

                if($total_bobot == null){
                    $nilai_normalisasi[$i]['nilai_normalisasi'] = 0;
                }else{

                    $nilai_normalisasi[$i]['nilai_normalisasi'] = $kategori['nilai_bobot'] / $total_bobot;
                }
             
                $i++;
            }

            // hitung nilai spk
            $nilai_spk = [];
            $b = 0;

            foreach ($data as $item) {
                $temp_spk = 0;
                for ($k = 0; $k < count($item['kategori']); $k++) {

                    foreach ($nilai_normalisasi as $nnormal) {
                        if ($item['kategori'][$k] == $nnormal['kategori']) {

                            $temp_spk += $item['bobot_utility'][$k] * $nnormal['nilai_normalisasi'];
                        }
                    }
                }

                $nilai_spk['num_choose'][$b] = $item['num_choose'];
                $nilai_spk['nilai_spk'][$b] = $temp_spk;
                if ($temp_spk >= 0 && $temp_spk <= 0.35) {
                    $nilai_spk['status'][$b] = 'Tidak Direkomendasikan';
                }
                if ($temp_spk >= 0.36 && $temp_spk <= 0.75) {
                    $nilai_spk['status'][$b] = 'Cukup Direkomendasikan';
                }
                if ($temp_spk >= 0.76 && $temp_spk <= 1) {
                    $nilai_spk['status'][$b] = 'Sangat Direkomendasikan';
                }
                $b++;
            }
           
         
            echo view('SPK/spkCount', ['nilai_normalisasi' => $nilai_normalisasi, 'data' => $data, 'nilai_spk' => $nilai_spk]);
        }else{
            return redirect()->to('/cempty');
        }
    }

    private function getSubCategory()
    {

        $query = $this->db->query("SELECT kategori.kategori,kategori.nilai_bobot,subkategori.subkategori,subkategori.nilai_utility FROM `subkategori` JOIN kategori ON kategori.id = subkategori.id_kategori ;")->getResult();

        $data = []; 
        $i = 0;
        $j = 0;
        $temp = null;
        foreach ($query as $item) {

            if ($temp) {

                if ($temp == $item->kategori) {
                    $data[$i]['kategori'] = $temp;
                    $data[$i]['subkategori'][$j] = $item->subkategori;
                    $j++;
                } else {
                    $j = 0;
                    $temp = $item->kategori;
                    $i++;
                    $data[$i]['kategori'] = $temp;
                    $data[$i]['subkategori'][$j] = $item->subkategori;
                    $j++;
                }
            } else {
                $temp = $item->kategori;
                $data[$i]['kategori'] = $temp;
                $data[$i]['subkategori'][$j] = $item->subkategori;
                $j++;
            }
        }
        return $data;
    }

    public function deleteDataChoosen(){
        $data = $this->chooseData->where('id_user',$this->user['id'])->findAll();
        foreach ($data as $key) {
            $this->chooseData->delete($key['id']);
        }
        return redirect()->back();
    }

    public function cempty(){
        echo view('errors/cempty');
    }
}
