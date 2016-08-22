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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$url = "https://dl.dropboxusercontent.com/u/67668950/json.txt";
		$resultado = $this->apiget($url);
		$arreglo = array();
		$arreglo["data"] = $resultado["response"];
		$this->load->view('welcome_message',$arreglo);
	}
	/**
	 * cURL es una herramienta que permite abrir conexiones
	  *en una amplia variedad de protocolos (HTTP, FTP, LDAP…)
		*y que permite hacer prácticamente todo: manejo de cookies,
		*descarga de ficheros binarios, envíos de parámetros GET y POST, etc.
	 * @param  $url para pedir la información requerida
	 * @return devuelve un JSON
	 */
	public function apiget($url)
	{
		# code...
		$respuesta = curl_init();
		curl_setopt($respuesta,CURLOPT_URL,$url);
		curl_setopt($respuesta, CURLOPT_RETURNTRANSFER,true);
		$json_recuperado = curl_exec($respuesta);
		curl_close($respuesta);
		$arreglo = json_decode($json_recuperado,true);
		return $arreglo;
	}
/**
*$operacion pueden ser POST, PUT, DELETE
*/
	public function conexionApi($url,$data,$operacion)
	{
		# establcemos la conexion
		$respuesta = curl_init();
		//establecemos el verbo http
		curl_setopt($respuesta,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($respuesta,CURLOPT_CUSTOMREQUEST,$operacion);
		//enviamos los datos
		curl_opt($respuesta,CURLOPT_POSTFIELDS,http_build_query($data));
		//obtenemos la respuesta
		$response = curl_exec($respuesta);
		return $respuesta;
	}












}
