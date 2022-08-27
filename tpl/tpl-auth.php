<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ورود - ثبت نام </title>
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="assets/css/auth-style.css">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container <?php  if($_SERVER["QUERY_STRING"]== 'register') { echo 'sign-up-mode';}  ?>">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" class="sign-in-form">
          <h2 class="title">ورود</h2>
          <div class="input-field">
          <i class="fas fa-user"></i>  
          <input type="text" id="lusername" autocomplete="username" placeholder="نام شما" required="yes">
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" id="lpassword" autocomplete="current-password" placeholder="رمز عبور" id="id_password" required="yes">
            <i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>
          </div>

          <input type="submit" value="وارد شو!" class="btn solid">

          <div class="social-media">
            <a class="icon-mode" onclick="toggleTheme('dark');"><i class="fas fa-moon"></i></a>
            <a class="icon-mode" onclick="toggleTheme('light');"><i class="fas fa-sun"></i></a>
          </div>
          <p class="text-mode">Change theme</p>
        </form>
        <form action="" class="sign-up-form">
          <h2 class="title">ثبت نام</h2>
          <div class="input-field">
          <i class="fas fa-user"></i>  
          <input type="text" name="usuario" autocomplete="username" placeholder="نام شما" required="yes">
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="correo" autocomplete="email" placeholder="ایمیل" required="yes">
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="contraseña" autocomplete="current-password" placeholder="گذرواژه" id="id_reg" required="yes">
            <i class="far fa-eye" id="toggleReg" style="cursor: pointer;"></i>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="contraseña" autocomplete="current-password" placeholder="تایید گذرواژه" id="id_reg" required="yes">
            <i class="far fa-eye" id="toggleReg" style="cursor: pointer;"></i>
          </div>

          <label class="check">
            <input type="checkbox" checked="checked">
            <span class="checkmark"><a href="terms.html">قوانین و مقررات </a>را می پذیرم.</span>
          </label>
          <input type="submit" value="ایجاد حساب" class="btn solid">

        </form>
      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>حساب کاربری ندارید؟</h3>
          <p>همین حالا به جمع ما بپیوند!</p>
          <button class="btn transparent" id="sign-up-btn">ایجاد حساب</button>
        </div>
        <img src="img/log.svg" class="image" alt="">
      </div>

      <div class="panel right-panel">
        <div class="content">
          <h3>حساب کاربری دارید؟</h3>
          <p>برای مدیریت برنامه های خود وارد شوید!</p>
          <button class="btn transparent" id="sign-in-btn">ورود</button>
        </div>
        <img src="img/register.svg" class="image" alt="">
      </div>
    </div>
  </div>


  <script>
    const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

const htmlEl = document.getElementsByTagName("html")[0];
const currentTheme = localStorage.getItem("theme")
  ? localStorage.getItem("theme")
  : null;
if (currentTheme) {
  htmlEl.dataset.theme = currentTheme;
}
const toggleTheme = (theme) => {
  htmlEl.dataset.theme = theme;
  localStorage.setItem("theme", theme);
};

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#id_password");

togglePassword.addEventListener("click", function (e) {
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  this.classList.toggle("fa-eye-slash");
});

const toggleReg = document.querySelector("#toggleReg");
const pass = document.querySelector("#id_reg");

toggleReg.addEventListener("click", function (e) {
  const type = pass.getAttribute("type") === "password" ? "text" : "password";
  pass.setAttribute("type", type);
  this.classList.toggle("fa-eye-slash");
});
  </script>

</body>
</html>
