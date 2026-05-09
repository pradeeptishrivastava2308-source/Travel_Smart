<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AI Travel Agent | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      height: 100vh;
      background: linear-gradient(135deg, #3b82f6, #06b6d4);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      width: 900px;
      max-width: 95%;
      background: white;
      border-radius: 20px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      box-shadow: 0 20px 50px rgba(0,0,0,0.2);
      overflow: hidden;
    }

    /* LEFT SIDE */
    .left {
      background: linear-gradient(135deg, #2563eb, #0ea5e9);
      color: white;
      padding: 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .left h1 {
      font-size: 2.5rem;
      margin-bottom: 15px;
    }

    .left p {
      font-size: 1.1rem;
      line-height: 1.6;
      opacity: 0.9;
    }

    /* RIGHT SIDE */
    .right {
      padding: 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .right h2 {
      font-size: 2rem;
      margin-bottom: 25px;
      color: #1e293b;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 6px;
      font-size: 0.9rem;
      color: #475569;
    }

    .input-group input {
      width: 100%;
      padding: 12px 14px;
      border-radius: 8px;
      border: 1px solid #cbd5e1;
      font-size: 1rem;
      outline: none;
    }

    .input-group input:focus {
      border-color: #2563eb;
      box-shadow: 0 0 0 2px rgba(37,99,235,0.2);
    }

    .login-btn {
      margin-top: 10px;
      padding: 14px;
      background: #2563eb;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-btn:hover {
      background: #1d4ed8;
    }

    .links {
      margin-top: 18px;
      font-size: 0.9rem;
    }

    .links a {
      display: block;
      color: #2563eb;
      text-decoration: none;
      margin-top: 6px;
    }

    .links a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .container {
        grid-template-columns: 1fr;
      }
      .left {
        text-align: center;
      }
    }
  </style>
</head>

<body>

  <div class="container">

    <!-- LEFT SECTION -->
    <div class="left">
      <h1>AI Travel Agent</h1>
      <p>
        Plan your trip according to your way with AI travel agent 🚀
      </p>
    </div>

    <!-- RIGHT SECTION -->
    <div class="right">
      <h2>Login</h2>
      <?php
      if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        require_once "connect.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if($user){
            if(password_verify($password,$user["password"])){
              
              
              die();
            }
            else{
              echo "Password does not match";
            }
        }
        else{
          echo "Email does not exist";
        }

      }
      ?>
      <form action="login.php" method="POST">

      <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email">
      </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password">
      </div>

      <button class="login-btn"  type="submit" name="login" >Login</button>

      <div class="links">
        <a href="#">Forgot Password?</a>
        <a href="Registration_Page.php">Don't have an account? Sign up</a>
        <a href="h.php">Return to Home Page</a>
      </div>
</form>
    </div>

  </div>

</body>
</html>
