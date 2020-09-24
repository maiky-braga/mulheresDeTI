<?php
    /////////////////////////////////////////////////////// VERIFICA E GET INFOS CHAVES
    function verificaUsuario( $conn, $email, $senha ){
        $sql = "select email, senha from pessoa where email = '$email' and senha='$senha';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function pegaIdEmail( $conn, $email ){
        $sql = "select id_pessoa from pessoa where email = '$email';";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_assoc( $result );
            return $rs['id_pessoa'];
        }
    }

    function pegaNome( $conn, $email ){
        $sql = "select nome from pessoa where email = '$email';";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_assoc( $result );
            return $rs['nome'];
        }
    }
    ////////////////////////////////////////////////////////////////////////////


    /////////////////////////////////////////////////////// CADASTRA INFOS USUÁRIO
    function cadastroUsuario($conn, $nome, $email, $senha, $sobrenome, $data ){
        $sql = "insert into pessoa( email, nome, sobrenome, senha, data_nascimento ) values ( '$email', '$nome', '$sobrenome', md5('$senha'), '$data' );";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function cadastroSobreUsuario( $conn, $id, $cpf, $cidade, $uf, $pcd ){
        $sql = "insert into sobre_pessoa( fk_id_pessoa, cidade, uf, pcd, cpf ) values ( '$id', '$cidade', '$uf', $pcd, '$cpf' );";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function cadastroAcademicoUsuario( $conn, $id, $formacao, $grau, $status, $curso, $instituicao, $ead, $inicio, $fim ){
        if( $inicio == 0 & $fim == 0 ){
            $sql = "insert into academico( fk_id_pessoa, formacao, grau, status, curso, instituicao, ead ) values ( '$id', '$formacao', '$grau', '$status', '$curso', '$instituicao', $ead );";
        }else{
            $sql = "insert into academico( fk_id_pessoa, formacao, grau, status, curso, instituicao, ead, inicio, fim ) values ( '$id', '$formacao', '$grau', '$status', '$curso', '$instituicao', $ead, '$inicio', '$fim' );";
        }
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function cadastroExperienciaUsuario( $conn, $id, $empresa, $cargo, $descricao, $atual, $inicio_e, $fim_e){
        if( $inicio_e == 0 & $fim_e == 0 ){
            /* quando realiza o cadastro no site*/
            $sql = "insert into experiencia( fk_id_pessoa, empresa, cargo, descricao, atual) values ( '$id', '$empresa', '$cargo', '$descricao', $atual);";
        }else if( $fim_e ){
            /* quando não é atual */
            $sql = "insert into experiencia( fk_id_pessoa, empresa, cargo, descricao, atual, inicio, fim) values ( '$id', '$empresa', '$cargo', '$descricao', $atual, '$inicio_e', '$fim_e');";
        }else{
            /* quando é atual */
            $sql = "insert into experiencia( fk_id_pessoa, empresa, cargo, descricao, atual, inicio) values ( '$id', '$empresa', '$cargo', '$descricao', $atual, '$inicio_e');";
        }
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function cadastroPostUsuario( $conn, $id, $descricao ){
        if( $descricao != '' ){
            $sql = "insert into post(fk_id_pessoa, descricao) values ( '$id', '$descricao');";
            $result = pg_query( $conn, $sql );
            $rows   = pg_affected_rows( $result );
            return $rows;
        }
    }

    // function cadastroExperienciaUsuario( $conn, $id, $empresa, $cargo, $descricao, $atual){
    //     $sql = "insert into experiencia( fk_id_pessoa, empresa, cargo, descricao, atual) values ( '$id', '$empresa', '$cargo', '$descricao', $atual);";
    //     $result = pg_query( $conn, $sql );
    //     $rows   = pg_affected_rows($result);
    //     return $rows;
    // }
    ////////////////////////////////////////////////////////////////////////////


    /////////////////////////////////////////////////////// GET DADOS PERFIL
    function pegaEmails ( $conn ){
        $sql = "select email from pessoa;";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_all( $result );
            return $rs;
        }
    }

    function pegaInfosPessoa ( $conn, $id ){
        $sql = "select nome, sobrenome, email, senha, foto_pessoa, destino_foto_pessoa from pessoa where id_pessoa = $id;";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_assoc( $result );
            return $rs;
        }
    }

    function pegaSobrePessoa( $conn, $id ){
        $sql = "select cpf, cidade, uf, pcd from sobre_pessoa where fk_id_pessoa = $id;";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_assoc( $result );
            return $rs;
        }
    }

	function pegaAcademicoPessoa( $conn, $id ){
        $sql = "select formacao, grau, status, curso, instituicao, ead, inicio, fim, id_academico_pessoa from academico where fk_id_pessoa = $id;";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_all( $result );
            return $rs;
        }
    }

    function pegaExperienciaPessoa( $conn, $id ){
        $sql = "select empresa, cargo, descricao, atual, xp, inicio, fim, id_experiencia_pessoa from experiencia where fk_id_pessoa = $id;";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_all( $result );
            return $rs;
        }
    }

    function pegaPosts( $conn ){
        $sql = "select id_pessoa, concat(nome,' ',sobrenome) as nome, descricao as desc, TO_CHAR(data, 'DD/MM/YYYY HH24:MI') as data from post inner join pessoa as p on post.fk_id_pessoa = p.id_pessoa order by data desc";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_all( $result );
            return $rs;
        }
    }
    ////////////////////////////////////////////////////////////////////////////


    /////////////////////////////////////////////////////// UPDATE DADOS PERFIL
    function updateFotoPessoa( $conn, $id, $foto, $destino ){
        $sql = "update pessoa set foto_pessoa='$foto', destino_foto_pessoa='$destino' where id_pessoa='$id';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function updateInfosPessoa( $conn, $id, $nome, $sobrenome ){
        $sql = "update pessoa set nome='$nome', sobrenome='$sobrenome' where id_pessoa='$id';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function updateInfosEmailPessoa ( $conn, $id, $email ){
        $sql = "update pessoa set email='$email' where id_pessoa = '$id' and '$email' not in (select email from pessoa);";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function updateSenhaPessoa ( $conn, $id, $senha, $novasenha ){
        $sql = "update pessoa set senha='$novasenha' where id_pessoa = '$id' and senha = '$senha';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function updateSobrePessoa( $conn, $id, $cpf, $cidade, $uf, $pcd ){
        $sql = "update sobre_pessoa set cidade='$cidade', uf='$uf', pcd='$pcd', cpf='$cpf' where fk_id_pessoa='$id';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function updateAcademicoPessoa( $conn, $id_acad, $formacao, $grau, $status, $curso, $instituicao, $ead, $inicio, $fim ){
        $sql = "update academico set formacao='$formacao', grau='$grau', status='$status', curso='$curso', instituicao='$instituicao', ead='$ead', inicio='$inicio', fim='$fim' where id_academico_pessoa='$id_acad';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function updateExperienciaPessoa( $conn, $id_xp, $empresa, $cargo, $descricao, $atual, $inicio_e, $fim_e ){
        if ( $fim_e ){
            $sql = "update experiencia set empresa='$empresa', cargo='$cargo', descricao='$descricao', atual='$atual', inicio='$inicio_e', fim='$fim_e' where id_experiencia_pessoa='$id_xp';";
        }else{
            $sql = "update experiencia set empresa='$empresa', cargo='$cargo', descricao='$descricao', atual='$atual', inicio='$inicio_e' where id_experiencia_pessoa='$id_xp';";
        }
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }
    ////////////////////////////////////////////////////////////////////////////


    /////////////////////////////////////////////////////// DELETE DADOS PERFIL
    function deleteSobrePessoa( $conn, $id ){
        $sql = "delete from sobre_pessoa where fk_id_pessoa='$id';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function deleteAcademicoPessoa( $conn, $id_acad ){
        $sql = "delete from academico where id_academico_pessoa='$id_acad';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }

    function deleteExperienciaPessoa( $conn, $id_xp ){
        $sql = "delete from experiencia where id_experiencia_pessoa='$id_xp';";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows( $result );
        return $rows;
    }
    ////////////////////////////////////////////////////////////////////////////

    // FÓRUM
    function criarPergunta($conn, $titulo, $corpo, $tags){
        $sql = "insert into perguntaForum(titulo, corpo, tags) values ( '$titulo', '$corpo', '$tags');";
        $result = pg_query( $conn, $sql );
        $rows   = pg_affected_rows($result);
        return $rows;
    }

    function pegaPerguntas( $conn ){
        $sql = "select id_pergunta as id, titulo, corpo, tags from perguntaForum";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_all($result);
            return $rs;
        }
    }

    // BUSCA PERFIL DE USUÁRIO
    function buscaPessoa_on( $conn, $id_user ){
        $sql = "select concat(nome,sobrenome) as nome, email, empresa, cargo, descricao, atual, e.inicio as inicio_emprego, e.fim as fim_emprego, formacao, grau, status, curso, instituicao, ead, a.inicio as inicio_curso, a.fim as fim_curso from pessoa as p inner join experiencia as e on (p.id_pessoa = e.fk_id_pessoa) inner join academico as a on (p.id_pessoa = a.fk_id_pessoa) where id_pessoa = $id_user;";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_all($result);
            return $rs;
        }
    }

    // function buscaPessoas( $conn ){
    //     $sql = "select concat(nome,' ',sobrenome) as nometodo from pessoa;";
    //     $result = pg_query( $conn, $sql );
    //     if( $result ){
    //         $rs = pg_fetch_all($result);
    //         return $rs;
    //     }
    // }


    function buscaPessoas_off( $conn ){
        $sql = "select nome_todo from pessoas;";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_all($result);
            return $rs;
        }
    }

    function pegaPessoas_off( $conn, $pessoa ){
        $sql = "select id_pessoa from pessoas where nome_todo = '$pessoa';";
        $result = pg_query( $conn, $sql );
        if( $result ){
            $rs = pg_fetch_assoc($result);
            return $rs;
        }
    }

        // function createPerguntaForum( $conn){
    //     $sql = "create table perguntaForum(
    //         id_pergunta serial,
    //         titulo     varchar(255),
    //         corpo      varchar(255),
    //         tags      varchar(255),
    //         primary key(id_pergunta)
    //     );";
    //     $result = pg_query( $conn, $sql );
    //     $rows   = pg_affected_rows($result);
    //     return $rows;
    // }

    // function createRespostaForum( $conn){
    //     $sql = "create table respostaForum(
    //         id_resposta serial,
    //         fk_id_pergunta int,
    //         resposta      varchar(255),
    //         primary key(id_resposta),
    //         FOREIGN KEY(fk_id_pergunta) 
    //            REFERENCES perguntaForum(id_pergunta)
    //     );";
    //     $result = pg_query( $conn, $sql );
    //     $rows   = pg_affected_rows($result);
    //     return $rows;
    // }

?>
