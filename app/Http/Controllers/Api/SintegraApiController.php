<?php

namespace App\Http\Controllers\Api;

use App\Model\Sintegra;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 
use App\Http\Requests;

class SintegraApiController extends Controller {
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    private function parsearData($data) 
    {

        $tituloArr = [];
        $valorArr = []; 


        //retirar tags de comentarios. retirar &nbsp;, retirar :
        $data = preg_replace('/<!--(.*)-->/Uis', '', $data);
        $data = preg_replace('/&nbsp;/Uis', '', $data);
        $data = preg_replace('/:/Uis', '', $data);

        //capturar todas as tabelas
        $regexp = "<td\s[^>]*class=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/td>";
        

        //lista e pega titulos e valores
        if(preg_match_all("/$regexp/siU", $data, $matches, PREG_SET_ORDER)) {
        
            foreach ($matches as $key => $value) {
                if ( $value[2] == 'titulo') {
                    array_push($tituloArr, $value[3]);
                }
                elseif ( $value[2] == 'valor' ) {
                    array_push($valorArr, $value[3]);
                }
            }
        }           

        //retira o ultimo array valor sem titulo
        array_pop($valorArr); 


        if ( sizeof($valorArr) > 0 ) {
            
            $json_value["status"] = "200";
            $json_value["response"] = "";
            // Junta arrays em title e valor transformar em JSON
            foreach ($tituloArr as $key => $value) {
                $json_value[utf8_encode($value)] = trim($valorArr[$key]);
            }

        }
        else {
            $json_value["status"] = "400";
            $json_value["response"] = "Cnpj invalido";
        }


        return json_encode($json_value);

    }

    private function capturarDadosWeb($url, $data) 
    {
        //Cria arquivo de cookie temporario 
        $fp = fopen("/tmp/cookie.txt", "w");
        fclose($fp);

        //Faz conexão curl
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");
        curl_setopt($curl, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
        curl_setopt($curl, CURLOPT_TIMEOUT, 40000);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        ob_start();


        $dados = curl_exec ($curl);   

        return $this->parsearData($dados);
    }   


    private function requisicaoSintegraES($cnpj) 
    {
        return $this->capturarDadosWeb("http://www.sintegra.es.gov.br/resultado.php","num_cnpj=$cnpj&num_ie=&botao=Consultar");
    }

    //API SALVAR E LISTAR JSON
    public function postSintegraCNPJ(Request $request) 
    {
        $data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); 
        
        $cnpj = trim($data["cnpj"]);

        $resultado_json = $this->requisicaoSintegraES( $cnpj );
        $sintegra = new Sintegra;
        $verificaCnpj = count($sintegra->where('cnpj', $cnpj)->get());

        if ( $verificaCnpj == 0 ) {

            $sintegra->idusuario = Auth::user()->id;
            $sintegra->cnpj = $cnpj;
            $sintegra->resultado_json = $resultado_json;

            $sintegra->save();
        }

        return $resultado_json;
    }

    //DELETE SINTEGRA
    public function deleteSintegra($id) 
    {
        $sintegra = new Sintegra;

        $res = $sintegra->where('id', $id)->delete();

        if ( !$res ) {
            return ['response' => 'Sintegra nao encontrado', 'status' => '400'];
        }
        
        return ['response' => 'Sintegra deletado com sucesso', 'status' => '200'];
        
    }

}
