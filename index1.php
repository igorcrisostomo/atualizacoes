<?php
$arquivoDetran = 'textos/detran.txt';
		$urlDetran = 'https://www.detran.mg.gov.br/veiculos/leiloes/calendario-de-leiloes-'.date('Y');

		$url = file_get_contents($urlDetran);

		$inicioLista = strpos($url, 'Calendário de leilões em ordem decrescente de data');
		$fimLista = strpos($url, 'social-share-buttons-share');

		$url = substr($url, $inicioLista, ($fimLista-$inicioLista));

		if(file_exists($arquivoDetran)){// echo 'existe';
			$fp = file($arquivoDetran);

			$texto = '';
			foreach ($fp as $key => $value) {
				$texto .= $value;
			}

			if($url == $texto){
				echo 'Não há modificações no site do Detran.';
			}else{
				echo 'Há uma modificação na página de leilões do Detran. Clique <a href="'.$urlDetran.'">aqui</a> para conferir.';
				$fp = fopen($arquivoDetran, 'w+');
				fwrite($fp, $url);
				fclose($fp);
			}
			
		}else{// echo 'o arquivo não existe';
			$fp = fopen($arquivoDetran, 'w+');
			fwrite($fp, $url);
			fclose($fp);
		}
?>