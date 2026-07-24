<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    private function get_google_reviews() {
        $place_id = 'ChIJSahz5EpGnDkR8w49Ulbvd2Q';
        
        // Config se ya direct key le raha hai
        $api_key = $this->config->item('google_places_api_key'); 

        if (empty($api_key)) {
            return array();
        }

        $url = 'https://places.googleapis.com/v1/places/' . $place_id;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Goog-Api-Key: ' . trim($api_key),
            'X-Goog-FieldMask: displayName,rating,userRatingCount,reviews.authorAttribution.displayName,reviews.authorAttribution.photoUri,reviews.rating,reviews.relativePublishTimeDescription,reviews.text'
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        return isset($data['reviews']) ? $data : array();
    }

    public function home() {
        $data['google_place'] = $this->get_google_reviews();
        $this->load->view('home', $data);
    }

    public function index() {
        $this->home();
    }

    public function aboutus() {
        $this->load->view('aboutus');
    }

    public function courses() {
        $data['google_place'] = $this->get_google_reviews();
        $this->load->view('courses', $data);
    }

    public function pages() {
        $data['google_place'] = $this->get_google_reviews();
        $this->load->view('pages', $data);
    }

    public function franchisee() {
        $this->load->view('franchisee');
    }

    public function verifyCertificate() {
        $this->load->view('verifyCertificate');
    }

    public function career() {
        $this->load->view('career');
    }

    public function contact() {
        $this->load->view('contactpage');
    }

    public function fourhundredfour() {
        $this->load->view('placement');
    }
}