<?php
//Configuração da API
    $chaveApi = 'AIzaSyAEKUqprIj59XMyHl_VyEkC2c3MyfGGzd8';
    $busca = $_POST['busca'];
    $apiURL = 'https://www.googleapis.com/youtube/v3/search?part=id,snippet&q='.$busca.'&key='.$chaveApi.'&part=snippet';
   //Pegando os Vídeos
   $dadosApi = file_get_contents($apiURL);
   if ($dadosApi) {
        $listaVideos = json_decode($dadosApi);
   }

   else{
     echo 'Chave ou ID Inválida';
   }

   //Exibindo os Vídeos
   if (!empty($listaVideos->items)) {
     foreach($listaVideos->items as $item){
        echo ' 
            <div class="yvideo-box"> 
                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe> 
                <h4>'. $item->snippet->title .'</h4> 
            </div>'; 
     }
   }

   else {
    echo '<p class="error">Erro !!!</p>'; 
   }

?>