<?php
ob_start();
session_start();
require($_SERVER["DOCUMENT_ROOT"] . '/model/model.php');
require($_SERVER["DOCUMENT_ROOT"] . '/model/usuario/usuario.php');
require($_SERVER["DOCUMENT_ROOT"] . "/view/common/cabecalho.php");

if (isset($_SESSION["idUser"])) {
    header("location:perfilPrivado.php");
    die();
}
if (isset($_POST["btnSubmit"])) {
    $usuario = new Usuario();
    $usuario->setemail(filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS));
    $usuario->setsenha(md5(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS)));
    $dados_usuario = $usuario->login();
    if (!empty($dados_usuario)) {
        unset($dados_usuario["senha"]);
        $_SESSION["idUser"] = $dados_usuario["id"];
        header("location:perfilPrivado.php");
    } else {
        $erro_login = "Usuário incorretos." . $usuario->getemail() . $usuario->getsenha();
        echo "Senha incorretos.";
        unset($_SESSION["idUser"]);
        session_destroy();
    }
}
?> 
<?php require ($_SERVER["DOCUMENT_ROOT"]."/view/common/menuLogin.php");?>
<h1 style="text-align: center">Login</h1>
<!-- The Grid -->
<div class="box-login">
    <form method="post" style=" text-align: center"class="form-horizontal">
        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Informe seu email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="email" id="email" placeholder="Informe seu email">

            </div>           
        </div>
         <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Informe sua senha">

            </div>           
        </div>
         <input type="submit" name="btnSubmit" value="Logar" class="btn btn-success">
</form>
</div>
<div class="fb-login-button" data-width="200" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div>
</div>   
<div id="fb-root"></div>

<script>
// This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
// The response object is returned with a status field that lets the
// app know the current login status of the person.
// Full docs on the response object can be found in the documentation
// for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            testAPI();
        } else {
            // The person is not logged into your app or we are unable to tell.
            document.getElementById('status').innerHTML = 'Please log ' +
                    'into this app.';
        }
    }

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function () {
        FB.init({
            appId: '536857073452157',
            cookie: true, // enable cookies to allow the server to access 
            // the session
            xfbml: true, // parse social plugins on this page
            version: 'v3.1' // use graph api version 2.8
        });

// Now that we've initialized the JavaScript SDK, we call 
// FB.getLoginStatus().  This function gets the state of the
// person visiting this page and can return one of three states to
// the callback you provide.  They can be:
//
// 1. Logged into your app ('connected')
// 2. Logged into Facebook, but not your app ('not_authorized')
// 3. Not logged into Facebook and can't tell if they are logged into
//    your app or not.
//
// These three cases are handled in the callback function.

        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });

    };


// Load the SDK asynchronously
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2&appId=536857073452157&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
    function testAPI() {
        console.log('Bem vinda(o)! Buscando suas informações .... ');
        FB.api('/me', function (response) {
            console.log('Successful login for: ' + response.name);
            console.log(response);
            document.getElementById('status').innerHTML =
                    'Thanks for logging in, ' + response.name + '!';
            //document.getElementById("email").value = response.id;

        });
    }

</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->
<div id="status">
</div>

</body>
</html>