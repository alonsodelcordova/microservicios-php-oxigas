<head>
    <link rel="stylesheet" href="/static/css/login.css">
</head>
<div class="content-login">
    <div class="login-container">
        <div class="login-box">
            <h2>Registrarse</h2>
            <form action="/home/register" method="POST">
                <div class="input-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Registrarse</button>
            </form>
            <div class="links">
                <a href="/usuarios">¿Ya tienes cuenta? Ingresar</a>
            </div>
        </div>
    </div>
</div>