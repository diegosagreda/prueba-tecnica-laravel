
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!--Importacion Fuentes-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <!--Importacion libreria Iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!--Importacion recursos estaticos-->
    @vite(['resources/css/registro.css', 'resources/js/registro.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <body>
        <div class="main-container">
            <!--Logo-->
            <img src="https://i0.wp.com/rappicard.mx/wp-content/uploads/2023/09/amazon.png?fit=300%2C156&ssl=1" alt="Amazon Logo" class="amazon-logo">
            <div class="container">
                <!--Header Formulario-->
                <h2>Crear cuenta</h2>
                <div id="mensaje"></div>

                <!--Formulario Registro-->
                <form id="formRegistro">
                    @csrf
                    <!--Filed Nombre-->
                    <div class="field">
                        <label for="nombre">Tu nombre</label>
                        <input type="text" id="nombre" name="nombre" class="input">
                        <p id="error_nombre" class="text-error"></p>
                    </div>
                    <!--Filed Correo-->
                    <div class="field">
                        <label for="correo">Correo electrónico:</label>
                        <input type="text" id="correo" name="correo" class="input">
                        <p id="error_correo" class="text-error"></p>
                    </div>
                    <!--Filed Password-->
                    <div class="field">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" placeholder="Debe tener al menos 6 caracteres" class="input">
                        <p id="error_password" class="text-error"></p>
                        <div class="valid_contrasenia">
                            <i class="fas fa-info"></i> <!-- Icono de información -->
                            <p>La contraseña debe contener al menos seis caracteres.</p>
                        </div>
                    </div>
                    <!--Filed Confirm Password-->
                    <div class="field">
                        <label for="password_confirmation">Vuelve a escribir la contraseña:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="input">
                        <p id="error_password_confirmation" class="text-error"></p>
                    </div>
                    <button type="submit">Crear tu cuenta de Amazon</button>
                </form>
                <!--Footer Formulario-->
                <div>
                    <p>Al crear una cuenta, aceptas las <a href="">Condiciones de Uso</a> y el <a href="">Aviso de Privacidad </a>de Amazon.</p>
                </div>
                <div class="form-footer">
                    <hr class="divider">
                    <p>¿Ya tienes una cuenta? <a href="#" class="login-link">Inicia sesión <span class="arrow"></span></a></p>
                </div>
            </div>
        </div>
    </body>
</html>
