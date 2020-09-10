<?php
    
    function pegaIdEmail( $conn, $email ){
        $sql = "select id_pessoa from pessoa where email = '$email';";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_assoc($result);
            return $rs['id_pessoa'];
        }
    }

    /** CADASTRO PERFIL**/
    function cadastroUsuario($conn, $nome, $email, $senha, $sobrenome, $data){
        $sql = "insert into pessoa( email, nome, sobrenome, senha, data_nascimento ) values ( '$email', '$nome', '$sobrenome', md5('$senha'), '$data' );";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }

    function cadastroSobreUsuario( $conn, $id, $cpf, $cidade, $uf, $pcd ){
        $sql = "insert into sobre_pessoa( fk_id_pessoa, cidade, uf, pcd, cpf ) values ( '$id', '$cidade', '$uf', $pcd, '$cpf' );";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }

    function cadastroAcademicoUsuario( $conn, $id, $formacao, $grau, $status, $curso, $instituicao, $ead, $inicio, $fim ){
        $sql = "insert into academico( fk_id_pessoa, formacao, grau, status, curso, instituica, ead, inicio, fim ) values ( '$id', '$formacao', '$grau', '$status', '$curso', '$instituicao', $ead, '$inicio', '$fim');";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }

    function cadastroExperienciaUsuario( $conn, $id, $empresa, $cargo, $descricao, $atual, $xp, $inicio_e, $fim_e ){
        $sql = "insert into experiencia( fk_id_pessoa, empresa, cargo, descricao, atual, xp, inicio, fim ) values ( '$id', '$empresa', '$cargo', '$descricao', $atual, $xp, '$inicio_e', '$fim_e' );";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }

    /** GET DADOS PERFIL **/
    function pegaSobrePessoa( $conn, $id ){
        $sql = "select cpf, cidade, uf, pcd from sobre_pessoa where fk_id_pessoa = $id;";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_assoc($result);
            return $rs;
        }
    }

	function pegaAcademicoPessoa( $conn, $id ){
        $sql = "select formacao, grau, status, curso, instituicao, ead, inicio, fim from academico where fk_id_pessoa = $id;";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_assoc($result);
            return $rs;
        }
    }

    function pegaExperienciaPessoa( $conn, $id ){
        $sql = "select empresa, cargo, descricao, atual, xp, inicio, fim from experiencia where fk_id_pessoa = $id;";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_assoc($result);
            return $rs;
        }
    }

    /** UPDATE DADOS PERFIL **/
    function updateSobrePessoa( $conn, $id, $cpf, $cidade, $uf, $pcd ){
        $sql = "update sobre_pessoa set cidade='$cidade', uf='$uf', pcd='$pcd', cpf='$cpf' where fk_id_pessoa='$id';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }

    function updateAcademicoPessoa( $conn, $id, $formacao, $grau, $status, $curso, $instituicao, $ead, $inicio, $fim ){
        $sql = "update academico set formacao='$formacao', grau='$grau', status='$status', curso='$curso', instituicao='$instituicao', ead='$ead', inicio='$inicio', fim='$fim' where fk_id_pessoa='$id';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }

    function updateExperienciaPessoa( $conn, $id, $empresa, $cargo, $descricao, $atual, $inicio_e, $fim_e ){
        $sql = "update experiencia set empresa='$empresa', cargo='$cargo', descricao='$descricao', atual='$atual', inicio='$inicio_e', fim='$fim_e' where fk_id_pessoa='$id';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }

    /** DELETE DADOS PERFIL **/
    function deleteSobrePessoa( $conn, $id ){
        $sql = "delete from sobre_pessoa where fk_id_pessoa='$id';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }

    function deleteAcademicoPessoa( $conn, $id ){
        $sql = "delete from academico where fk_id_pessoa='$id';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }

    function deleteExperienciaPessoa( $conn, $id ){
        $sql = "delete from experiencia where fk_id_pessoa='$id';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }


?>
