<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Jaray's Children</title>
    <meta property="og:title" content="Jaray's Children" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Raleway;
        font-size: 18px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.55;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&amp;display=swap"
      data-tag="font"
    />
    <style>
      html {
      scroll-behavior: smooth;
      }
    </style>
    <style data-section-id="dropdown">
      [data-thq="thq-dropdown"]:hover > [data-thq="thq-dropdown-list"] {
          display: flex;
        }

        [data-thq="thq-dropdown"]:hover > div [data-thq="thq-dropdown-arrow"] {
          transform: rotate(90deg);
        }
    </style>
    <link rel="stylesheet" href="../html/css/style.css" />
  </head>
  <body>
    <div>
      <link href="../html/css/home.css" rel="stylesheet" />

      <div class="home-container">
        <div class="home-navigation-bar">
          <a href="../index.html" class="home-navlink">
            <img
              alt="logo"
              src="../image/icon.ico"
              loading="eager"
              class="home-logo"
            />
          </a>
          <div class="home-links">
            <a href="../html/about.html" class="home-about-us">About Us</a>
            <a href="search.php" class="home-our-pets">Our Pets</a>
            <a href="../html/team.html" class="home-the-team">The Team</a>
          </div>
          <a href="login.php" class="home-navlink1 button">Login</a>
        </div>
        <div class="home-intro">
          <h1 class="home-heading">
            <span>JARAY's Children</span>
            <br />
          </h1>
          <div class="home-hero-text">
            <span class="home-text02">
              <span>We believe that&nbsp;</span>
              <span>
                all pets at any age can find a true forever home with&nbsp; a
                family of their very own. Each animal up for adoption is sorted
                not only by age, but breed and personality as well. View our
                children and take them home today!
              </span>
              <br />
            </span>
          </div>
        </div>
        <div id="sample" class="home-sample-pets">
          <div class="home-heading-container">
            <h1 class="home-text06">Meet Some of Our Pets</h1>
            <span class="home-text07">
              They currently have no home, but could have one with one click!
            </span>
          </div>
          <div class="home-pet-spotlight">

            <p><?php
            $servername = "localhost";
            $username = "root"; // Mysql username
            $password = ""; // Mysql Password

            $dbname = "animal_adopt"; // database name

            // Create connection
            // MySQLi is Object-Oriented method
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("<p style='color:red'>" . "Connection failed: " . $conn->connect_error ."</p>");
            }
            // echo "Mysql DB Connected successfully...<br>";

            // Animal Table
            // Define a variable in PHP
            // Assign the SQL(Select) statement to the variable;
            $sql = "SELECT id, name, img, descrip FROM animalBI where ad_sts='waiting' ORDER BY RAND() LIMIT 3";

            $result = $conn->query($sql);

            // Make sure the relation is not empty
            if ($result -> num_rows > 0) {
                while($row = $result -> fetch_assoc()) {
                  $desc = mb_substr($row["descrip"], 0, 60) . "...";

                  echo '
                  <div class="home-pet">
                    <h3 class="home-name Card-Heading">' . $row["name"] . '</h3>
                    <img
                      alt="image"
                      src="../image/' . $row["img"] . '"
                      class="home-image"
                    />
                    <span class="home-desc Card-Text">' . $desc . '
                    </span>
                     <a href="pet.php?id=' . $row["id"] . '" class="home-link">Adopt me!</a>
                  </div>';

                    /*"<table>
                                    <td>" . $row["name"] . "</td>
                                    <td>" . $row["sp_name"] . "</td>
                                    <td>" . $row["gender"] . "</td>
                                    <td>" . $row["age"] . "</td>
                         </table>"; */
                }
            } else {
                // empty list
                echo "<table> 0 results </table>";
            }


            $conn->close();

            // echo "DB Disconnect.";
            ?></p>

          </div>
        </div>
        <div id="Why" class="home-why-info">
          <div class="home-heading-container1">
            <h2 class="home-text09">Why Adopt?</h2>
          </div>
          <div class="home-cards-container">
            <div class="home-life">
              <div class="home-icon-container">
                <svg viewBox="0 0 1024 1024" class="home-icon">
                  <path
                    d="M731.429 585.143h174.286c-6.857 7.429-11.429 11.429-12.571 12.571l-356 342.857c-6.857 6.857-16 10.286-25.143 10.286s-18.286-3.429-25.143-10.286l-356.571-344c-1.143-0.571-5.714-4.571-12-11.429h210.857c16.571 0 31.429-11.429 35.429-27.429l40-160.571 108.571 381.143c4.571 15.429 18.857 26.286 35.429 26.286v0c16 0 30.286-10.857 34.857-26.286l83.429-277.143 32 64c6.286 12 18.857 20 32.571 20zM1024 340.571c0 65.714-28.571 125.714-58.857 171.429h-210.857l-63.429-126.286c-6.286-13.143-21.143-21.143-35.429-20-15.429 1.714-28 11.429-32 26.286l-73.714 245.714-112-392c-4.571-15.429-18.857-26.286-36-26.286-16.571 0-30.857 11.429-34.857 27.429l-66.286 265.143h-241.714c-30.286-45.714-58.857-105.714-58.857-171.429 0-167.429 102.286-267.429 273.143-267.429 100 0 193.714 78.857 238.857 123.429 45.143-44.571 138.857-123.429 238.857-123.429 170.857 0 273.143 100 273.143 267.429z"
                  ></path>
                </svg>
              </div>
              <div class="home-text-container">
                <span class="home-heading1">Because you'll save a life.</span>
                <span class="home-text10">
                  <span>
                    The number of euthanized animals could be reduced
                    dramatically if more people adopt pets instead of buying
                    them. When you adopt a dog, you save a loving animal by
                    making them part of your family and open up shelter space
                    for another animal who might desperately need it.
                  </span>
                  <br />
                </span>
              </div>
            </div>
            <div class="home-cost">
              <div class="home-icon-container1">
                <svg viewBox="0 0 1024 1024" class="home-icon2">
                  <path
                    d="M504 466q44 12 73 24t61 33 49 53 17 76q0 62-41 101t-109 51v92h-128v-92q-66-14-109-56t-47-108h94q8 90 126 90 62 0 89-23t27-53q0-72-128-104-200-46-200-176 0-58 42-99t106-55v-92h128v94q66 16 101 60t37 102h-94q-4-90-108-90-52 0-83 22t-31 58q0 58 128 92z"
                  ></path>
                </svg>
              </div>
              <div class="home-text-container1">
                <span class="home-heading2">Because it???ll cost you less</span>
                <span class="home-text13">
                  Usually when you adopt pets, the cost of spay/neuter, first
                  vaccinations (and sometimes even microchipping!) is included
                  in the adoption price, which can save you some of the upfront
                  costs of adding a new member to your family. Depending on the
                  animal, you may also save on housebreaking and training
                  expenses.
                </span>
              </div>
            </div>
            <div class="home-animal">
              <div class="home-icon-container2">
                <svg viewBox="0 0 1024 1024" class="home-icon4">
                  <path
                    d="M740 634l34 34t17 18 16 19 15 19 13 20 10 22 6 23 2 24-1 25q-22 84-100 100-14 2-97-8t-139-10h-8q-56 0-139 10t-97 8q-78-16-100-100-6-40 14-82t37-60 61-62q20-22 53-62t53-62q36-44 74-56 8-4 14-4 12-2 34-2 24 0 34 2 6 0 14 4 38 12 74 56 18 22 52 62t54 62zM726 406q0-44 31-76t75-32 75 32 31 76-31 75-75 31-75-31-31-75zM534 234q0-44 31-75t75-31 75 31 31 75-31 76-75 32-75-32-31-76zM278 234q0-44 31-75t75-31 75 31 31 75-31 76-75 32-75-32-31-76zM86 406q0-44 31-76t75-32 75 32 31 76-31 75-75 31-75-31-31-75z"
                  ></path>
                </svg>
              </div>
              <div class="home-text-container2">
                <span class="home-heading3">
                  Because you'll get a great animal.
                </span>
                <span class="home-text14">
                  <span>
                    Animal shelters and rescue groups are brimming with happy,
                    healthy pets just waiting for someone to take them home.
                    Most shelter pets wound up there because of a human problem
                    like a move or a divorce, not because the animals did
                    anything wrong.
                  </span>
                  <span>Many</span>
                  <span>
                    are already house-trained and used to living with families.
                  </span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="team-footer">
        <span class="team-address">
          <span class="team-text24">
            Adelphi University .&nbsp; 1 South Ave, Garden City ,&nbsp; NY
            11530.
          </span>
          <br />
        </span>
        <span class="team-copyright">
          <span class="team-text26">Copyright 2022 All Rights Reserved</span>
          <br />
        </span>
      </div>
    </div>
    <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
  </body>
</html>
