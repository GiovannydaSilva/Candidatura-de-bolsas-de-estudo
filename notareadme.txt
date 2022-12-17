#»»»»»»»»»»»»»»»»»»»»»»»»»»»»»»»»»» | Lista de Tarefas do Projecto | «««««««««««««««««««««««««««««««««««#
# note: tarefas e pra se orientar no desenvolvimento - de onde parou e de Onde Partir! 

	usuarios {//Relebrar login do usuario text ou (fazer um dd($_SESSIN['estorylogin']))...

	
	 [id = 1]  => { email = adilson.francisco.august@gmail.com , senha = adilson },
	 [id = 2]  => { email = eliseu.samuel@gmail.com , senha = 123456 },
	 [id = 13] => { email = isutic@gmail.com.br , senha = 123 },
	 [id = 17] => { email = uan@gmail.com.br , senha = 123}
	 [id = 6]  => { email = pedro.oliveira@gmail.com , senha = espedro }

	 [id = 7]  => { email = fredd.carlos@gmail.com , senha = espedro }
	 [id = 8]  => { email = drica.taylor@gmail.com , senha = espedro }
	 [id = 9]  => { email = jorge.simao@gmail.com , senha = espedro }
	 [id = 6]  => { email = pedro.oliveira@gmail.com , senha = espedro }
	 [id = 4]  => { usuario = manucho@adi.com , senha = manucho },
	 [id = 5]  => { usuario = Francis , senha = boneco },
	 [id = 6]  => { usuario = Francis , senha = boneco },

	}
	
#=============================================================================#
 * Fazer Login e Editar perfel. [50%][45%]
 * Fazer Cadastro e Verificar Se já Existe. [10%][50%] -23/02/2021
 * Fazer a criação de conta de usuarios. [5.5%][5.5%]
 * Exibir os dados do Banco na Views. [2.2%][1.3%]
 * Fazer Para a Universidade e Administrador as view[1.2%][%]
 * Fazer Para a Universidade, faculdade, curso, localização Exibir na views[][]
 * Fazer Pesquisa por categorias (universidade, faculdade, cursos, localização, tópicos)[][] 
 * Fazer Verificar Pesquisa e exibir os dados da pesquisa[][]
 * Fazer as classes que representam o Model - [10%][]
 * Recuperação da senha do usuario. [50%][50%]
 * Criar o script de Envio de Sms ou email pra recuperar conta.[0%][]
 * Testar o Uso de class Models e Controllers e exibir na Views. [35%][%]
 * Verificar e alterar as Telas para não perderem o estilo. [20%][]
 * Criar classes Para manipular os dados do Banco de Dados. [60%][]
 * Testar códigos OOP - do CRUD. [25%][25%]
 * Fazer Classe que representa o servidor Mysql. [50%][30%] - 25a26/02/2021 -
 * Copiar e alterar telas para para criar a do Admin. [0%][]
#=============================================================================#
 * Tester upload file ontém 20/02/2021. [V]
 	Nota: adicionar a tag 'form' a propriedade enctype="multpart/form-data"
	Estrutura do arquivo para o upload ->
	Array (
			[name] 		=> img_car.jpg 
			[type] 		=> image/jpeg 
			[tmp_name]  => C:\xampp\tmp\php1380.tmp 
			[error] 	=> 0 
			[size] 		=> 95663 
	)
 * Testar as classes de manipulação do banco de dados 
 * Fazer as Classes do Modelo de Negócio...
 ##############################################################
 <?php
    {echo $_SERVER['PHP_SELF'];
        echo "<br>";
        echo $_SERVER['QUERY_STRING'];
        echo "<br>";
        echo $_SERVER['SERVER_NAME'];
        echo "<br>";
        echo $_SERVER['HTTP_HOST'];
        echo "<br>";
        echo $_SERVER['HTTP_REFERER'];
        echo "<br>";
        echo $_SERVER['HTTP_USER_AGENT'];
        echo "<br>";
        echo $_SERVER['SCRIPT_NAME'];}
 ?>
*********************************************************************

Notice: Trying to access array offset on value of type bool in C:\xampp\htdocs\appAdites\App\Models\UsuarioModel.class.php on line 41
bool(false)
Notice: Trying to access array offset on value of type bool in C:\xampp\htdocs\appAdites\App\Models\UsuarioModel.class.php on line 41

private $ref_usuario;
$certificado;
private $nome_universidade;
private $data_inscricao;
private $data_exame;
private $fotografia;
private $publicacao;
private $logotipo;
private $site;



50bf8a565aa7d318d06b3b2dc7a27604 - md5(md5('adilson'));

595b4a110420ab473260a6b6b488e437 - md5('adilson');
------------------------------------------------------------------------------------------

   <script type="text/javascript" src="../../Assets/js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript">
      var base_url =  'http://localhost:81/sistema-universidades/Controllers/ajax/';
        $(function(){
            $('#id_provincia').change(function(){
                var id_provincia = $('#id_provincia').val();
                alert(id_provincia);
                 var provi = id_provincia;
                $.post(base_url+'cidade.php?id_provincia={ id_provincia : id_provincia}',{
                    id_provincia : id_provincia
                }, function(){
                    
                });

            });
        });
    </script>

     <script type="text/javascript">
      var base_url =  'http://localhost:81/sistema-universidades/Controllers/ajax/';
        $(function(){
            $('#id_provincia').change(function(){
                var id_provincia = $('#id_provincia').val();
                alert(id_provincia);
                 var provi = id_provincia;
                $.post(base_url+'cidade.php?id_provincia={ id_provincia : id_provincia}',{
                    id_provincia : id_provincia
                }, function(){
                    
                });

            });
        });
    </script>

    <!-- -->
    <script type="text/javascript">
      var base_url =  'http://localhost:81/sistema-universidades/Controllers/ajax/';
        $(function(){
            $('#id_provincia').change(function(){
                var id_provincia = $('#id_provincia').val();
                alert(id_provincia);
                 var provi = id_provincia;
                $.post(base_url+'cidade.php?id_provincia={ id_provincia : id_provincia}',{
                    id_provincia : id_provincia
                }, function(){
                    
                });

            });
        });
    </script>