<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AI Travel Agent| Register</title>
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
      width: 950px;
      max-width: 95%;
      background: white;
      border-radius: 20px;
      display: grid;
      grid-template-columns: 1.2fr 1fr;
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
      font-size: 2.4rem;
      margin-bottom: 15px;
    }

    .left p {
      font-size: 1.05rem;
      line-height: 1.6;
      opacity: 0.9;
    }

    .left ul {
      margin-top: 20px;
      padding-left: 18px;
      font-size: 0.95rem;
    }

    .left ul li {
      margin-bottom: 8px;
    }

    /* RIGHT SIDE */
    .right {
      padding: 45px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .right h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #1e293b;
    }

    .input-group {
      margin-bottom: 15px;
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

    .register-btn {
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

    .register-btn:hover {
      background: #1d4ed8;
    }

    .links {
      margin-top: 18px;
      font-size: 0.9rem;
    }

    .links a {
      color: #2563eb;
      text-decoration: none;
      display: block;
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
        Plan your trip according to your way using AI Tavel agent
      </p>

      <ul>
        <li>✔ No worries</li>
        <li>✔ Ask AI for trip suggestions</li>
        <li>✔ Use IRCTC for reservation</li>
        <li>✔ Search Hotels</li>
      </ul>
    </div>

    <!-- RIGHT SECTION -->
    <div class="right">
      <h2>Create Account</h2>
      <?php
// print_r($_POST);
// print_r($_POST);
if(isset($_POST["submit"]))
    {
        $fullname=$_POST["fullname"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $passwordrepeat=$_POST["repeat_password"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $error= array();
        if(empty($fullname) OR empty($email) OR empty($password) OR empty($passwordrepeat))
            {
                array_push($error,"All fields are required<br>");
            }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($error,"Email is not valid<br>");
        }
        else if(strlen($password)<8)
            {
                array_push($error,"Password must be atleast 8 characters long<br>");
            }
        else if($password!=$passwordrepeat){
            array_push($error,"Password does not match<br>");
        }
        require_once "connect.php";
        $sql = "SELECT * FROM USERS WHERE email = '$email'";
        $result=mysqli_query($conn,$sql);
        $rowCount= mysqli_num_rows($result);
        if($rowCount>0){
            array_push($error,"email already exist<br>");
        }
        
        if(count($error)>0){
            foreach($error as $error){
                echo "$error";
            }
        }
        else
            {
               
               $sql = "INSERT INTO users(full_name,email,password) VALUES(?, ?, ?)";
               $stmt=mysqli_stmt_init($conn);
               $prepareStmt=mysqli_stmt_prepare($stmt,$sql);
               if($prepareStmt){
                mysqli_stmt_bind_param($stmt,"sss",$fullname,$email,$passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div>You are registered successfully</div>";
               }
               else{
                die("Something went wrong");
               }
            }

    }

?>

      <form action="Registration_Page.php" method="POST">

      <div class="input-group">
        <label>Full Name</label>
        <input type="text" name="fullname" placeholder="Enter your full name">
      </div>

      <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email">
      </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Create password">
      </div>

      <div class="input-group">
        <label>Confirm Password</label>
        <input type="password" name="repeat_password" placeholder="Confirm password">
      </div>

      <button type="submit" name="submit" class="register-btn">Sign Up</button>

      <div class="links">
        <a href="login.php">Already have an account? Login</a>
        <a href="h.php">Return to Home Page</a>
      </div>
      </form>
    </div>

  </div>

</body>
</html>
