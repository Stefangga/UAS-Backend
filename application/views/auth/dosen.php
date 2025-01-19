<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"/>
<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background: linear-gradient(135deg, #190482, #7752FE, #8E8FFA, #C2D9FF);
        background-size: 200% 200%;
        animation: gradientBG 10s ease infinite;
    }
    .main-container {
        display: flex;
        background-color: white;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        max-width: 60%;
        animation: fadeIn 1s ease-in-out;
    }
    .login-container {
        padding: 50px;
        text-align: center;
        width: 480px;
        background-color: white;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .form-group input[type="text"],
    .form-group input[type="password"] {
        transition: all 0.3s ease;
    }
    .form-group input:focus {
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
    }
    .login-container img {
        width: 144px;
        height: 144px;
        margin: 0 auto 16px;
    }
    .login-container h1 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 24px;
    }
    .form-group {
        margin-bottom: 16px;
        text-align: left;
    }
    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 500;
    }
    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 8px 16px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        outline: none;
        transition: box-shadow 0.2s;
    }
    .form-group input:focus {
        outline: 1px solid #3B82F6;
    }
    .checkbox-group {
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.8rem;
    }
    .checkbox-group input[type="checkbox"] {
        margin-right: 5px;
    }
    .forgot-password {
        font-size: 13px;
        color: #3b82f6;
        text-decoration: none;
        transition: text-decoration 0.2s;
    }
    .forgot-password:hover {
        text-decoration: underline;
    }
    .login-button {
        width: 100%;
        background-color: #3b82f6;
        color: white;
        padding: 10px 0;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .login-button:hover {
        background-color: #2563eb;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
    }
    .register-link {
        display: block;
        margin-top: 16px;
        font-size: 14px;
        color: #3b82f6;
        text-decoration: none;
        transition: text-decoration 0.2s;
    }
    .register-link:hover {
        color: #1d4ed8;
        font-weight: bold;
    }
</style>
</head>
<body>
    <div class="main-container">
        <div class="login-container">
            <img 
                src="https://amikom.ac.id/public/docs/2016/logo_amikom_full_color.png" 
                alt="Logo"
            >
            <h1>Halaman Login Dosen</h1>
            <form action="<?php echo base_url('auth/dosen') ?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="username" 
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Password" 
                        required
                    >
                </div>
                <button type="submit" class="login-button">Login</button>
            </form>
        </div>
    </div>
</body>
</html>