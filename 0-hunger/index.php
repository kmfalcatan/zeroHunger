<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>0-Hunger</title>

    <link rel="icon" href="./picture/istockphoto-1333549239-612x612.jpg" />
    <link rel="stylesheet" href="style.css" />

    <style>
      html {
        scroll-behavior: smooth;
      }

      * {
        padding: 0;
        margin: 0;
      }

      body {
        overflow-x: hidden;
      }
    </style>
  </head>
  <body>
    <div class="headerContainer">
      <div class="logoContainer">
        <div class="subLogoContainer">
          <img
            class="logo"
            src="/0-hunger/picture/istockphoto-1333549239-612x612-removebg-preview.png"
            alt=""
          />
        </div>

        <div class="logoNameContainer">
          <p class="name">ZERO HUNGER</p>
        </div>
      </div>

      <div class="navBarContianer">
        <ul>
          <li><a class="link" href="#home">HOME</a></li>
          <li><a class="link" href="#about">ABOUT</a></li>
          <li><a class="link" href="#feedback">FEEDBACK</a></li>
          <li><a class="link" href="#contact">CONTACT</a></li>
          <li class="loginBtn"><a class="link" href="/0-hunger/login/login.php">LOGIN</a></li>
        </ul>

        <div class="menuIconContainer">
          <div class="menubarContainer" onclick="toggleMenu(this)">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="sideNavBarContainer">
      <a class="login" href="/0-hunger/request/request.php">
        <div class="sideNavBar1">
          <p>Request</p>
        </div>
      </a>

      <a class="login" href="/0-hunger/donation/donation.php">
        <div class="sideNavBar">
          <p>Donate</p>
        </div>
      </a>
    </div>

    <section id="home">
      <div class="container">
        <div class="titleContainer">
          <div class="upContainer">
            <div class="lineContainer"></div>

            <div class="subTitleContainer">
              <p class="title">Starving Zamboanga City</p>
            </div>
          </div>

          <div class="downContainer">
            <p class="paragraph">
              250 million people in sub-Saharan Africa struggle with chronic
              hunger. Surprisingly, malnutrition stunts the growth of one in
              three youngsters under the age of five. Environmental problems,
              armed conflict, and poverty all serve to intensify this
              catastrophe.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="about">
      <div class="aboutContainer">
        <div class="subAboutContainer">
          <div class="paragraphContainer">
            <div class="titleContainer1">
              <div class="backgroundColor"></div>

              <p class="title1">Zero Hunger</p>
            </div>

            <div class="descriptionContainer">
              <p class="description1">
                O-HungerConnect is a web application dedicated to combating
                hunger and food insecurity. It provides a platform for
                individuals to easily donate and support those in need of food.
                By connecting donors with those facing food scarcity, it plays a
                crucial role in addressing this global challenge. Join us in
                making a difference and ensuring that no one goes to bed hungry.
              </p>
            </div>
          </div>
        </div>

        <div class="pictureContainer">
          <div class="subAboutContainer">
            <div class="imageContainer"></div>
          </div>
        </div>
      </div>
    </section>

    <section id="feedback">
      <div class="feedbackContainer">
        <div class="pictureContainer1">
          <div class="imageContainer1"></div>
        </div>

        <div class="subAboutContainer">
          <div class="messageContainer">
            <div class="inputContainer">
              <div class="subInputContainer">
                <textarea
                  class="input"
                  name=""
                  id=""
                  cols="30"
                  rows="10"
                ></textarea>
              </div>

              <div class="paragraphContainer1">
                <p class="paragraph1">HELP US IMPROVE</p>
              </div>

              <div class="paragraphContainer2">
                <p class="paragraph3">We would love to know your thoughts</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="contactContainer">
        <div class="subContactContainer">
          <p class="contact">CONTACT US</p>
        </div>

        <div class="emailContainer">
          <div class="subEmailContainer1">
            <p>zeroHunger@Gmail.com</p>
          </div>

          <div class="subEmailContainer2">
            <p>kmfalcatan@Gmail.com</p>
          </div>

          <div class="subEmailContainer">wmsu@Gmail.com</div>
        </div>

        <div class="visitContainer">
          <p>VISIT US</p>
        </div>

        <div class="iconContainer">
          <div class="subIconContainer">
            <img class="icon" src="/0-hunger/picture/facebook.png" alt="" />
          </div>

          <div class="subIconContainer">
            <img
              class="icon"
              src="/0-hunger/picture/instagram-logo.png"
              alt=""
            />
          </div>

          <div class="subIconContainer">
            <img class="icon" src="/0-hunger/picture/tik-tok.png" alt="" />
          </div>

          <div class="subIconContainer">
            <img class="icon" src="/0-hunger/picture/twitter.png" alt="" />
          </div>
        </div>
      </div>
    </section>
    <script src="script.js"></script>
  </body>
</html>
