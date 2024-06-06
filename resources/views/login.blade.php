<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login dan Register</title>
    <style>
       
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: url('img/login.jpg') center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
            z-index: 2;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        @keyframes show {
            0%, 49.99% {
                opacity: 0;
                z-index: 1;
            }
            50%, 100% {
                opacity: 1;
                z-index: 5;
            }
        }

        form {
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background: #f6f5f7;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
            letter-spacing: 1px; 
        }

        button {
            border-radius: 20px;
            border: 1px solid #3a5f4c;
            background-color: #3a5f4c;
            color: #ffffff;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px; 
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #ffffff;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: #3a5f4c;
            background: -webkit-linear-gradient(to right, #3a5f4c, #3a5f4c);
            background: linear-gradient(to right, #3a5f4c, #3a5f4c);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #ffffff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-panel h1 {
            margin-bottom: 10px; 
        }

        .overlay-panel p {
            margin-bottom: 20px; 
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Buat Akun</h1>
                <input type="text" placeholder="Nama" required />
                <input type="email" placeholder="Email" required />
                <input type="password" placeholder="Kata Sandi" required />
                <button>Daftar</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Masuk</h1>
                <input type="email" placeholder="Email" required />
                <input type="password" placeholder="Kata Sandi" required />
                <button>Masuk</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Selamat Datang Ranger</h1>
                    <p>Masuk untuk tetap terhubung dengan kami</p>
                    <button class="ghost" id="signIn">Masuk</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Halo, Ranger!</h1>
                    <p>Bergabunglah bersama kami</p>
                    <button class="ghost" id="signUp">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.querySelector('.container');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>
</html>
