<?php


	$con = mysql_connect( 'mysql.v8brasil.com.br', 'v8brasil04', '0224d08' );
	mysql_select_db( 'v8brasil04', $con );

	$cod_estados = mysql_real_escape_string( $_REQUEST['cod_estados'] );

	$cidades = array();

	$sql = "SELECT cod_cidades, nome
			FROM cidades
			WHERE estados_cod_estados=$cod_estados
			ORDER BY nome";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$cidades[] = array(
			'cod_cidades'	=> $row['cod_cidades'],
			'nome'			=> utf8_encode($row['nome']),
		);
	}

	echo( json_encode( $cidades ) );
?>