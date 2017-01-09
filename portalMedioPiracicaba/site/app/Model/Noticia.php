<?php
App::uses('AppModel', 'Model');
/**
 * Noticia Model
 *
 */
class Noticia extends AppModel {
	public function beforeSave($options = array())
	{
	    if(!empty($this->data['Noticia']['foto']['name'])) {
	        $this->data['Noticia']['foto'] = $this->upload($this->data['Noticia']['foto']);
	    } else {
	        unset($this->data['Noticia']['foto']);
	    }

	    if(!empty($this->data['Noticia']['foto1']['name'])) {
	        $this->data['Noticia']['foto1'] = $this->upload($this->data['Noticia']['foto1']);
	    } else {
	        unset($this->data['Noticia']['foto1']);
	    }

	    if(!empty($this->data['Noticia']['foto2']['name'])) {
	        $this->data['Noticia']['foto2'] = $this->upload($this->data['Noticia']['foto2']);
	    } else {
	        unset($this->data['Noticia']['foto2']);
	    }

	    if(!empty($this->data['Noticia']['foto3']['name'])) {
	        $this->data['Noticia']['foto3'] = $this->upload($this->data['Noticia']['foto3']);
	    } else {
	        unset($this->data['Noticia']['foto3']);
	    }
	}

	/**
	 * Organiza o upload.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function upload($imagem = array(), $dir = 'img')
	{
	    $dir = WWW_ROOT.$dir.DS;

	    if(($imagem['error']!=0) and ($imagem['size']==0)) {
	        throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);
	    }

	    $this->checa_dir($dir);

	    $imagem = $this->checa_nome($imagem, $dir);

	    $this->move_arquivos($imagem, $dir);

	    return $imagem['name'];
	}

	/**
	 * Verifica se o diretório existe, se não ele cria.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function checa_dir($dir)
	{
	    App::uses('Folder', 'Utility');
	    $folder = new Folder();
	    if (!is_dir($dir)){
	        $folder->create($dir);
	    }
	}

	/**
	 * Verifica se o nome do arquivo já existe, se existir adiciona um numero ao nome e verifica novamente
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	 * @return nome da imagem
	*/ 
	public function checa_nome($imagem, $dir)
	{
	    $imagem_info = pathinfo($dir.$imagem['name']);
	    $imagem_nome = $this->trata_nome($imagem_info['filename']).'.'.$imagem_info['extension'];
	    debug($imagem_nome);
	    $conta = 2;
	    while (file_exists($dir.$imagem_nome)) {
	        $imagem_nome  = $this->trata_nome($imagem_info['filename']).'-'.$conta;
	        $imagem_nome .= '.'.$imagem_info['extension'];
	        $conta++;
	        debug($imagem_nome);
	    }
	    $imagem['name'] = $imagem_nome;
	    return $imagem;
	}

	/**
	 * Trata o nome removendo espaços, acentos e caracteres em maiúsculo.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function trata_nome($imagem_nome)
	{
	    $imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));
	    return $imagem_nome;
	}

	/**
	 * Move o arquivo para a pasta de destino.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function move_arquivos($imagem, $dir)
	{
	    App::uses('File', 'Utility');
	    $arquivo = new File($imagem['tmp_name']);
	    $arquivo->copy($dir.$imagem['name']);
	    $arquivo->close();
	}
}
