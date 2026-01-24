
<head>
    <link rel="stylesheet" href="/static/css/login.css">
</head>

    <div class="content-login">
        <div class="login-container">
            <div class="login-box">
                <h2>Iniciar Sesión</h2>
                <form action="/home/login" method="POST">
                    <div class="input-group">
                        <label for="username">Usuario</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit">Ingresar</button>
                </form>
                <div class="links">
                    <a href="/home">¿Olvidaste tu contraseña?</a>
                    <a href="/home/register">Regístrate</a>
                </div>
            </div>
        </div>
    </div>