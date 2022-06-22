<?php
     $servername="localhost";
	 $username="root";
	 $password="";
	 $dbname="chatapp";
	 $conn = mysqli_connect($servername, $username, $password, $dbname);	
     
	 session_start();
     print_r($_SESSION);
	 if(!isset($_SESSION["Uname"])){
		header("Location: login.php");
	 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=  , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="unique.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="container">
        <div class="navigation ">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="logo-apple"></ion-icon></span>
                        <span class="title">GC Chat</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="laptop-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                        <span class="title">Subscription</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="chatbubble-ellipses-outline"></ion-icon></span>
                        <span class="title">Start Chat</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Account Settings</span>
                    </a>
                </li>


                <li>
                    <a href="logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

      <!-- Main -->
      <div class="main">
         <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            
            <!-- Searching-->
            <div class="search">
                <label>
                    <input type="text" placeholder="Search Here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>

            <!-- userImg-->
            <h3 class="user-text">Hello <?php echo $_SESSION["Uname"];?></h3>
            <div class="user">
               <img src="images/<?php echo $_SESSION['image']; ?>"/>   
               
            </div>    
         </div>
      </div>
    </div>

    <script>
        //MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        //add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered'); 
        }
        list.forEach((item) =>
        item.addEventListener('mouseover', activeLink));
    </script>

</body>
</html>