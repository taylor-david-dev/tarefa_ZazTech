<?php
Class pessoa_model extends CI_Model
{
	
	function cadastrar($dados){
		$data = array(
		   'nome' => $dados['nome']); 

		return $this->db->insert('pessoa', $data);
	}

	function listar(){
		$this->db->select('*');
		$this->db->from('pessoa');
		return $this->db->get()->result();
	}
	
	function excluir($id){
		$this->db->where('id', $id);
		return $this->db->delete('pessoa');
	}
	
	function alterar($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('pessoa');
		return $this->db->get()->result();
	}
	
	function doAlterar($dados){
		return $this->db->query("UPDATE pessoa SET  nome='$dados[nome]' WHERE id=$dados[id]");
	}
	
	function pesquisaPessoaAjax($dados){
		$html = '';
		$result = $this->db->query("SELECT * FROM pessoa WHERE nome like '%$dados[cod]%'");
		foreach ($result->result() as $row){
                    
			$html .= '<tr onClick="pegaValorTRPessoaAjax(this)" style="cursor:pointer;">';
			$html .= '<td>'.$row->id.'</td>';
			$html .= '<td>'.$row->nome.'</td>';
			$html .= '</tr>';
		}
		
		return $html;
		
	}
	
}
?>