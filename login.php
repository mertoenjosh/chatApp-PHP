<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Realtime Chat App | Login</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
   
  </head>
  <body>
    <div class="wrapper">
      <section class="form login">
        <header>Realtime Chat App</header>

        <form action="#">
          <div class="error-txt"></div>

          <div class="field input">
            <label>Email Address</label>
            <input name="email" type="email" placeholder="Enter Your Email" />
          </div>

          <div class="field input">
            <label>Password</label>
            <input name="password" type="password" placeholder="Enter your password" />
            <i class="fas fa-eye"></i>
          </div>

          <div class="field button">
            <input type="submit" value="Continue to chat" />
          </div>
        </form>

        <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
      </section>
    </div>

    <script src="javascript/pass-show-hide.js" defer></script>
    <script src="javascript/login.js" defer></script>
  </body>
</html>
