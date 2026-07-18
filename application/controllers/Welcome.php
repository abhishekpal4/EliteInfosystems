<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
public function home()
{
    $place_id = 'ChIJSahz5EpGnDkR8w49Ulbvd2Q';
    $api_key = $this->config->item('google_places_api_key');

    $url = 'https://places.googleapis.com/v1/places/' . $place_id;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Goog-Api-Key: ' . $api_key,
        'X-Goog-FieldMask: displayName,rating,userRatingCount,reviews'
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    $data['google_place'] = json_decode($response, true);

    $this->load->view('home', $data);
}
	public function aboutus()
	{
		$this->load->view('aboutus');
	}
	public function courses()
{
    $place_id = 'ChIJSahz5EpGnDkR8w49Ulbvd2Q';
    $api_key = $this->config->item('google_places_api_key');

    $url = 'https://places.googleapis.com/v1/places/' . $place_id;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Goog-Api-Key: ' . $api_key,
        'X-Goog-FieldMask: displayName,rating,userRatingCount,reviews'
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    $data['google_place'] = json_decode($response, true);

    $this->load->view('courses', $data);
}
	public function pages()
{
    $place_id = 'ChIJSahz5EpGnDkR8w49Ulbvd2Q';
    $api_key = $this->config->item('google_places_api_key');

    $url = 'https://places.googleapis.com/v1/places/' . $place_id;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Goog-Api-Key: ' . $api_key,
        'X-Goog-FieldMask: displayName,rating,userRatingCount,reviews.authorAttribution.displayName,reviews.authorAttribution.photoUri,reviews.rating,reviews.relativePublishTimeDescription,reviews.text'
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    $data['google_place'] = json_decode($response, true);

    $this->load->view('pages', $data);
}
	public function franchisee()
	{
		$this->load->view('franchisee');
	}
	public function verifyCertificate()
	{
		$this->load->view('verifyCertificate');
	}
	public function career()
	{
		$this->load->view('career');
	}
	public function contact()
	{
		$this->load->view('contactpage');
	}
	public function fourhundredfour()
	{
		$this->load->view('placement');
	}
}
