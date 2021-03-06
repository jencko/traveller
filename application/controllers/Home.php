<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $this->home();
        $this->load->model('foreignExchange');
    }

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('package');
        $this->load->model('users');
        $this->load->model('page');
        $this->load->model('flight');
        $this->load->model('moneyTransfer');
        $this->load->model('foreignExchange');
    }

    public function home() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $data['result'] = $this->package->showHomePackage();
        $data['flights'] = $this->flight->showAllFlights();
        $this->load->view('front/header', $data);
        $this->load->view('front/home', $data);
        $this->load->view('front/footer');
    }
    
    public function about() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $this->load->view('front/header', $data);
        $this->load->view('front/about');
        $this->load->view('front/footer');
    }
    
    public function transfers() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $this->load->view('front/header', $data);
        $this->load->view('front/transfers');
        $this->load->view('front/footer');
    }
    
    public function terms() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $this->load->view('front/header', $data);
        $this->load->view('front/terms');
        $this->load->view('front/footer');
    }
    
    public function career() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $this->load->view('front/header', $data);
        $this->load->view('front/career');
        $this->load->view('front/footer');
    }
    
    public function contact() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $this->load->view('front/header', $data);
        $this->load->view('front/contact');
        $this->load->view('front/footer');
    }
    
    public function embassies() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $this->load->view('front/header', $data);
        $this->load->view('front/embassies');
        $this->load->view('front/footer');
    }
    
    public function money_transfer() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $this->load->view('front/header', $data);
        $this->load->view('front/money_transfer');
        $this->load->view('front/footer');
    }
    
    public function send_money() {
        $result = $this->moneyTransfer->send_money();
        if ($result == TRUE) {
            $msg['success'] = TRUE;
        }else {
            $msg['success'] = FALSE;
        }
        echo json_encode($msg);
    }

        public function mileage() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $this->load->view('front/header', $data);
        $this->load->view('front/mileage');
        $this->load->view('front/footer');
    }
    
    public function airlines() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $this->load->view('front/header', $data);
        $this->load->view('front/airlines');
        $this->load->view('front/footer');
    }

    public function languageSelector() {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $this->load->view('front/header', $data);
        $this->load->view('front/home');
        $this->load->view('front/footer');
    }

    public function package($package_name) {
        $data['title'] = 'Traveller | Book Flights, Holiday Packages, Money Exchange';
        $data['result'] = $this->package->packages($package_name);
        $data['msg'] = '';
        $this->load->view('front/header', $data);
        $this->load->view('front/package', $data);
        $this->load->view('front/footer');
    }

    public function customer_detail() {
        $result = $this->users->customer_detail();
        $this->load->library('email');
        if ($result == TRUE) {
            $this->email->from($this->input->post('c_email'), $this->input->post('c_f_name'));
            $this->email->to('ashishsinghvardhan@gmail.com');
            $this->email->subject('Booking Query');
            $this->email->message('Testing the email class.');
            if ($this->email->send()) {
                $msg['success'] = true;
            } else {
                $msg['success'] = false;
            }
        } else {
            $msg['success'] = false;
        }
        echo json_encode($msg);
    }

    public function destinations() {
        $data['title'] = 'Traveller | Holiday Packages';
        $data['result'] = $this->package->getAllContinents();
        $data['msg'] = '';
        $this->load->view('front/header', $data);
        $this->load->view('front/destinations', $data);
        $this->load->view('front/footer');
    }
    
    public function cheapflights() {
        $data['title'] = 'Traveller | Holiday Packages';
        $data['result'] = $this->flight->showAllFlights();
        $data['msg'] = '';
        $this->load->view('front/header', $data);
        $this->load->view('front/flights', $data);
        $this->load->view('front/footer');
    }

    public function packages($countrycode) {
        $data['title'] = 'Traveller | Holiday Packages';
        $result = $this->package->getpackages($countrycode);
        if ($result == FALSE) {
            $this->load->view('front/header', $data);
            $this->load->view('front/no_page_found', $data);
            $this->load->view('front/footer');
        } else {
            $data['result'] = $result;
            $data['msg'] = '';
            $this->load->view('front/header', $data);
            $this->load->view('front/packages', $data);
            $this->load->view('front/footer');
        }
    }
    
    public function searchpackage() {
        $data['title'] = 'Traveller | Holiday Packages';
        $result = $this->package->searchpackage();
        if ($result == FALSE) {
            $this->load->view('front/header', $data);
            $this->load->view('front/no_page_found', $data);
            $this->load->view('front/footer');
        } else {
            $data['result'] = $result;
            $data['msg'] = '';
            $this->load->view('front/header', $data);
            $this->load->view('front/packages', $data);
            $this->load->view('front/footer');
        }
    }
    
    public function searchflights() {
        $data['title'] = 'Traveller | Holiday Packages';
        $result = $this->flight->searchflights();
        if ($result == FALSE) {
            $this->load->view('front/header', $data);
            $this->load->view('front/no_page_found', $data);
            $this->load->view('front/footer');
        } else {
            $data['result'] = $result;
            $data['msg'] = '';
            $this->load->view('front/header', $data);
            $this->load->view('front/flights', $data);
            $this->load->view('front/footer');
        }
    }

    public function places($continent_code) {
        $data['title'] = 'Traveller | Holiday Packages';
        $data['result'] = $this->package->places($continent_code);
        $data['msg'] = '';
        $this->load->view('front/header', $data);
        $this->load->view('front/country_package', $data);
        $this->load->view('front/footer');
    }

    public function foreignExchangeOrder() {
        if (isset($_POST['submit'])) {
            
        } else {
            $data['title'] = 'Foreign Currecy Exchange | Traveller';
            $this->load->view('front/header', $data);
            $this->load->view('front/foreignExchange');
            $this->load->view('front/footer');
        }
    }
    public function foreignExchange(){
         if (isset($_POST['submit'])) {
            $result = $this->users->forex_users();   
            if ($result == TRUE) {
            $msg['success'] = TRUE;
            }else {
                $msg['success'] = FALSE;
            }
            echo json_encode($msg);     
        } else {
            $data['title'] = 'Foreign Currecy Exchange | Traveller';
            $this->load->view('front/header', $data);
            $this->load->view('front/foreignExchange');
            $this->load->view('front/footer');
        } 
    }
    // public function foreignExchange() {
    //     $this->load->library('Simple_html_dom');
    //     $html = new Simple_html_dom();
    //     $html->load_file('http://www.x-rates.com/table/?from=JPY&amount=1');
    //     $info = $html->find('table.ratesTable td a');
    //     $currency_names = $html->find('table.ratesTable tr td');
    //     $noc = array();  
    //     foreach ($currency_names as $row) {
    //         $noc[] = $row->plaintext;
    //     }
    //     echo json_encode($noc);
    // }

    public function getProfit() {
        echo json_encode($this->foreignExchange->get_profit());
    }
    
    public function flight_booking() {
        $result = $this->users->flight_booking();
        if ($result == TRUE) {
            $msg['success'] = TRUE;
        }else {
            $msg['success'] = FALSE;
        }
        echo json_encode($msg);
    }

}
