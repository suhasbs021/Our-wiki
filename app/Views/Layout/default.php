<!DOCTYPE html>
<!-- Designed by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Responsive Drop Down Navigation Menu | CodingLab</title>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Googlefont Poppins CDN Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 90vh;
  overflow-x: hidden; 
    }

    nav {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 70px;
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
      z-index: 99;
    }

    nav .navbar {
      height: 100%;
      max-width: 1250px;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: auto;
      padding: 0 50px;
      list-style: none !important;
    }

    .navbar .logo a {
      font-size: 30px;
      color: #fff;
      text-decoration: none;
      font-weight: 600;
    }

    nav .navbar .nav-links {
      line-height: 70px;
      height: 100%;
    }

    nav .navbar .links {
      display: flex;
    }

    nav .navbar .links li {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: space-between;
      list-style: none;
      padding: 0 14px;
    }

    nav .navbar .links li a {
      height: 100%;
      text-decoration: none;
      white-space: nowrap;
      color: #fff;
      font-size: 15px;
      font-weight: 500;
    }

    .links li:hover .htmlcss-arrow,
    .links li:hover .js-arrow {
      transform: rotate(180deg);
    }

    nav .navbar .links li .arrow {
      height: 50%;
      width: 10px;
      line-height: 30px;
      text-align: center;
      display: inline-flex;
      align-items: center;
      color: #fff;
      transition: all 0.3s ease;
    }

    nav .navbar .links li .sub-menu {
      position: absolute;
      top: 70px;
      left: 0;
      /* right: -200px; */
      width: auto;
      line-height: 40px;
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
      border-radius: 0 0 4px 4px;
      display: none;
      z-index: 1;
      max-height: 200px;
      overflow-y: auto;
    }
    .navbar .links li .sub-menu input {
  width: 100%; /* Ensure the search box width matches the dropdown width */
 margin-right: 0px;
  margin: 5px 0; /* Add margin for spacing */
}

    nav .navbar .links li:hover .htmlCss-sub-menu,
    nav .navbar .links li:hover .js-sub-menu {
      display: block;
    }

    .navbar .links li .sub-menu li {
      padding: 10 22px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .navbar .links li .sub-menu a {
      color: #fff;
      font-size: 12px;
      font-weight: 500;
    }

    .navbar .links li .sub-menu .more-arrow {
      line-height: 10px;
    }

    .navbar .links li .sub-menu .more-sub-menu {
      position: absolute;
      top: 0;
      left: 50%;
      border-radius: 0 4px 4px 4px;
      z-index: 1;
      display: none;
      width: auto;
    }

    .links li .sub-menu .more:hover .more-sub-menu {
      display: block;
    }



    
    .navbar .nav-links .sidebar-logo {
      display: none;
    }

    .navbar .bx-menu {
      display: none;
    }

    @media (max-width:920px) {
  nav .navbar{
    max-width: 100%;
    padding: 0 25px;
  }

  nav .navbar .logo a{
    font-size: 27px;
  }
  nav .navbar .links li{
    padding: 0 10px;
    white-space: nowrap;
  }
  nav .navbar .links li a{
    font-size: 15px;
  }
}
@media (max-width:800px){
  
  .navbar .bx-menu{
    display: block;
  }
  nav .navbar .nav-links{
    position: fixed;
    top: 0;
    left: -100%;
    display: block;
    max-width: 270px;
    width: 100%;
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    line-height: 40px;
    padding: 20px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.5s ease;
    z-index: 1000;
  }
  .navbar .nav-links .sidebar-logo{
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .sidebar-logo .logo-name{
    font-size: 25px;
    color: #fff;
  }
    .sidebar-logo  i,
    .navbar .bx-menu{
      font-size: 25px;
      color: #fff;
    }
  nav .navbar .links{
    display: block;
    margin-top: 20px;
  }
  nav .navbar .links li .arrow{
    line-height: 40px;
  }
nav .navbar .links li{
    display: block;
  }
nav .navbar .links li .sub-menu{
  position: relative;
  top: 0;
  box-shadow: none;
  display: none;
}
nav .navbar .links li .sub-menu li{
  border-bottom: none;

}
.navbar .links li .sub-menu .more-sub-menu{
  display: none;
  position: relative;
  left: 0;
}
.navbar .links li .sub-menu .more-sub-menu li{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.links li:hover .htmlcss-arrow,
.links li:hover .js-arrow{
  transform: rotate(0deg);
  }
  .navbar .links li .sub-menu .more-sub-menu{
    display: none;
  }
  .navbar .links li .sub-menu .more span{
    /* background: red; */
    display: flex;
    align-items: center;
    /* justify-content: space-between; */
  }

  .links li .sub-menu .more:hover .more-sub-menu{
    display: none;
  }
  nav .navbar .links li:hover .htmlCss-sub-menu,
  nav .navbar .links li:hover .js-sub-menu{
    display: none;
  }
.navbar .nav-links.show1 .links .htmlCss-sub-menu,
  .navbar .nav-links.show3 .links .js-sub-menu,
  .navbar .nav-links.show2 .links .more .more-sub-menu{
      display: block;
    }
    .navbar .nav-links.show1 .links .htmlcss-arrow,
    .navbar .nav-links.show3 .links .js-arrow{
        transform: rotate(180deg);
}
    .navbar .nav-links.show2 .links .more-arrow{
      transform: rotate(90deg);
    }
}
@media (max-width:370px){
  nav .navbar .nav-links{
  max-width: 100%;
} 
}

   

    span {
      color:white ;
      font-size: 14px;
      font-weight: bold;
      letter-spacing: 2px;
      display: inline-block;
      /* text-transform: uppercase; */
      font-family: sans-serif;
      margin-left: 20px;
    }

    .topic {
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
    }

    .topic-name {
      margin-right: 5px;
    }

   
    .bxs-chevron-down:before {
      content: "\ec89";
      margin-top: 1px ! important;
      font-size: 15px;
    }
    
    .footer {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start; /* Align items to the start */
    padding: 20px;
    background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
    position: relative; /* Change position to fixed */
    bottom: 0; /* Stick it to the bottom */
    left: 0; /* Align it to the left */
    width: 100%; /* Make it full width */
}

        .footer-content {
            display: flex;
            justify-content: space-between;
            color: white;
            width: 100%;
            /* bottom: 0; */
        }
        .about-us {
            text-align: left;
            width: 30%;
            font-size: 1.1em;
        }
        .contact-us {
            width: 45%;
            text-align: right; /* Align text to the right */
            font-size: 1.1em;
            padding: 20px;
        }
        .copyright {
            position: absolute;
            bottom: 2px;
            width: 100%;
            color: white;
            text-align: center;
            right: -35px;
            
        }
        .icons {
            text-align: center;
            width: 100%;
            margin-top: -80px;
            margin-left:70px;
            padding: 30px; /* Adjust the margin to move the icons slightly to the right */
        }
        .icons img {
    width: 50px;
    height: auto;
    margin: 10 20px; /* Adjust the margin to add space between icons */
}
        /* Responsive styles */
        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
            }
            .about-us,
            .contact-us {
                width: 100%;
                text-align: left; /* Align both sections to the left on smaller screens */
            }
            .contact-us {
                margin-top: 20px; /* Add some spacing between sections */
            }
        }

  </style>
</head>

<body>
  <header>
    <nav>
        <div class="navbar">
          <i class='bx bx-menu'></i>
          <div class="logo">
          <span class="logo-name" style="font-size: 24px;">OUR WIKI</h6>
        </div>
        <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">OUR WIKI</span>
          <i class='bx bx-x' ></i>
        </div>
          <ul class="links">
            <li><a href="<?php echo base_url('userhome')?>">HOME</a></li>
            <li>
            <div class="topic">
                    <span class="topic-name">TOPICS</span>
                    <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
              </div>
                <ul class="htmlCss-sub-menu sub-menu">
                    <!-- Updated dropdown structure with topics only -->
                    <input type="text" id="topicSearch" placeholder="Search topics...">
                    <?php foreach ($topics as $topic): ?>
                        <li class="topic-item">
                            <div class="topic">
                                <span class="topic-name"><a href="<?php echo base_url('box/'.$topic['t_id'])?>"><?php echo $topic['topic_name']; ?></a></span>
                                <!-- Remove the arrow icon -->
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="<?php echo base_url('add-all')?>">Add</a></li>
            <li><a href="<?php echo base_url('profile')?>">Profile</a></li>
          </ul> 
        </div>
        <div class="links">
          <li><a href="<?php echo base_url('login')?>">Logout</a></li>
        </div>
      </div>
    </nav>
  </header>
  <script>
let navLinks = document.querySelector(".nav-links");
let menuOpenBtn = document.querySelector(".navbar .bx-menu");
let menuCloseBtn = document.querySelector(".nav-links .bx-x");
menuOpenBtn.onclick = function() {
navLinks.style.left = "0";
}
menuCloseBtn.onclick = function() {
navLinks.style.left = "-100%";
}

    // search-box open close js code


    
    document.addEventListener("DOMContentLoaded", function() {
    const topicItems = document.querySelectorAll('.topic-item');

    topicItems.forEach(topicItem => {
        const topicName = topicItem.querySelector('.topic-name');

        topicName.addEventListener('click', function() {
            // Toggle the display of the topics list when clicked on the topic name
            const subMenu = topicItem.querySelector('.htmlCss-sub-menu');
            subMenu.style.display = subMenu.style.display === 'none' ? 'block' : 'none';
        });
    });
  });
function filterTopics() {
        var input, filter, ul, li, topic, i;
        input = document.getElementById('topicSearch');
        filter = input.value.toUpperCase();
        ul = document.querySelector('.htmlCss-sub-menu');
        li = ul.querySelectorAll('.topic-item');
        for (i = 0; i < li.length; i++) {
            topic = li[i].querySelector('.topic-name');
            if (topic.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
    // Event listener for input field
    document.getElementById('topicSearch').addEventListener('input', filterTopics)

    document.addEventListener("DOMContentLoaded", function() {
  const topicItems = document.querySelectorAll('.topic-item');

  topicItems.forEach(topicItem => {
    const topicName = topicItem.querySelector('.topic-name');

    topicName.addEventListener('click', function() {
      // Toggle the display of the submenu when clicked on the topic name
      const subMenu = topicItem.querySelector('.htmlCss-sub-menu');
      subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
    });
  });
});

let htmlcssArrow = document.querySelector(".htmlcss-arrow");
htmlcssArrow.onclick = function() {
 navLinks.classList.toggle("show1");
}
let moreArrow = document.querySelector(".more-arrow");
moreArrow.onclick = function() {
 navLinks.classList.toggle("show2");
}
let jsArrow = document.querySelector(".js-arrow");
jsArrow.onclick = function() {
 navLinks.classList.toggle("show3");
}
  </script>
  <!-- Inside your view file -->

  <?= $this->renderSection('content') ?>


    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <!-- Left side: About Us -->
            <div class="about-us">
                <h4><b>About Us</b></h4>
                <p>Welcome to OurWiki, your go-to platform for exploring and sharing knowledge on a wide range of topics!
                    Our mission is to empower individuals to discover, learn, and contribute to a collaborative repository
                     of information.</p>
            </div>
            <!-- Right side: Contact Us -->
            <div class="contact-us">
                <h4><b>Contact Us</b></h4>
                <p>Protriden Technologies, Kundapur</p>
                <p>Email: info@example.com</p>
                <p>Phone: +91 8217202721</p>
            </div>
        </div>
        <!-- Middle: Icons -->
        <div class="icons">
        <h6>Follows Us on</h6>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16" style="margin-right: 10px;">
  <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16" style="margin-right: 10px;">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16" style="margin-right: 10px;">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16" style="margin-right: 10px;">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
</svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16" style="margin-right: 10px;">
  <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
</svg>
        </div>
        <!-- Copyright -->
        <div class="copyright">
            <p>&copy; 2024 Your Company. All Rights Reserved.</p>
        </div>
    </footer>
    <!-- Footer -->




</body>
</html>
