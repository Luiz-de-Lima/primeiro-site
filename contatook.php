<!DOCTYPE html>
<meta charset="utf-8">
<head>
    <title>Obrigado</title>
</head>
<body>


<a href="contato.html">Voltar</a>
<?php    


$nome = $_POST['nome'];
$telefone=$_POST['telefone'];
$email = $_POST['email'];
$msg = $_POST['msg'];

/*
$nome = clear_input('$nome');
$telefone=clear_input('$telefone');
$email = clear_input('email');
$msg = clear_input('msg');*/

$texto_msg = 'Solicitação de Serviço'.'<br><br>' .
'Nome: ' . 	$nome . '<br>' .
'Telefone: ' . 	$telefone . '<br>' .
'Email: ' . 	$email . '<br>' .
'Mensagem: ' . 	$msg . '<br>' ;



    // Inserir Arquivos do PHPMailer
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';

    // Usar as classes sem o namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Criação do Objeto da Classe PHPMailer
    $mail = new PHPMailer(true); 
    $mail->CharSet="UTF-8";

    try {
        
        //Retire o comentário abaixo para soltar detalhes do envio 
        // $mail->SMTPDebug = 2;                                
        
        // Usar SMTP para o envio
        $mail->isSMTP();                                      

        // Detalhes do servidor (No nosso exemplo é o Google)
        $mail->Host = 'smtp.gmail.com';

        // Permitir autenticação SMTP
        $mail->SMTPAuth = true;                               

        // Nome do usuário
        $mail->Username = 'desentupidoraededetizadorahdi@gmail.com';        
        // Senha do E-mail         
        $mail->Password = '22544820';                           
        // Tipo de protocolo de segurança
        $mail->SMTPSecure = 'tls';   

        // Porta de conexão com o servidor                        
        $mail->Port = 587;

        
        // Garantir a autenticação com o Google
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Remetente
        $mail->setFrom($email, $nome);
        
        // Destinatário
        $mail->addAddress('desentupidoraededetizadorahdi@gmail.com', 'HDI Dedetizadora');

        // Conteúdo

        // Define conteúdo como HTML
        $mail->isHTML(true);                                  

        // Assunto
        $mail->Subject = 'Novo pedido de Orçamento';
        $mail->Body    = $texto_msg;
        $mail->AltBody = $texto_msg;

        // Enviar E-mail
        $mail->send();
        echo 'Mensagem enviada com sucesso';
    } catch (Exception $e) {
        echo '<h3>A mensagem não foi enviada pelo seguinte motivo: </h3>', $mail->ErrorInfo;
    } ?>


</body>
</html>