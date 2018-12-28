<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Info Tech Tools PHP Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style media="screen">
  body{
    max-width: 1200px;
    min-width: 320px;
    margin: auto;
  }
  .resultStyle {
    color:#00F;
    margin-top:25px;
  }
  .table-striped {
    border: 2px solid blue;
  }
  footer {
    font-size: 10px;
    border-top-width: thin;
    border-top-style: solid;
    border-top-color: #666;
  }
</style>
</head>
<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <!-- Brand -->
      <!--      <a class="navbar-brand" href="#">Logo</a>  -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="navbar-brand" href="home.html"><img src="./images/Stylus-logo-sm.jpg" alt="Stylus logo"</a>
            </li
            <li class="nav-item">
              <a class="nav-link" href="home.html">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
                Services
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="servicesOverview.html">Services-Overview</a>
                <a class="dropdown-item" href="openSourceReport.html"> Open Source</a>
                <a class="dropdown-item" href="techTools.html"> Tech - Tools</a>
                <a class="dropdown-item" href="techToolsResult.php">Tech - Tools - Result</a>
              </div>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Innovation
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="innovationOverView.html">Innovation Over View</a>
                <a class="dropdown-item" href="ecosystem.html"> Ecosystem </a>
                <a class="dropdown-item" href="showcase.html"> Showcase </a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
          </ul>
        </div>
      </nav>
      <div>
        <?php
        /*
        echo("Info Tech javaScript = " . $_POST['javaScript']);
        echo ("<br>");
        echo("Info Tech front_end_Frameworks = " . $_POST['front_end_Frameworks']);
        echo ("<br>");
        echo("Info Tech web_applications = " . $_POST['web_applications']);
        echo ("<br>");
        echo("Info Tech programming_languages = " . $_POST['programming_languages']);
        echo ("<br>");
        echo("Info Tech data_bases = " . $_POST['data_bases']);
        echo ("<br>");
        echo("Info Tech web_servers = " . $_POST['web_servers']);
        echo ("<br>");
        */
        //display for the used input.
        displayPostArray($_POST);

        //connection to data_bases.
        require_once 'login_avvaru.php'; // remember to change to your lastname
        $db_connect = mysqli_connect($db_hostname, $db_username, $db_password);
        if (!$db_connect) die("Unable to connect to MySQL: " . mysqli_error($db_connect));
        mysqli_select_db($db_connect, $db_database) or die("Unable to select database: " . mysqli_error($db_connect));

        //test to make sure that each tool is non-Empty
        //just to make sure in case javaScript validation gets by passed
        if(isset($_POST['javaScript']) && isset($_POST['front_end_Frameworks'])
        && isset($_POST['web_applications']) && isset($_POST['programming_languages'])
        && isset($_POST['data_bases']) && isset($_POST['web_servers'])){
          $javaScript = mysqli_fix_string($db_connect, $_POST['javaScript']);
          $front_end_Frameworks = mysqli_fix_string($db_connect, $_POST['front_end_Frameworks']);
          $web_applications = mysqli_fix_string($db_connect, $_POST['web_applications']);
          $programming_languages = mysqli_fix_string($db_connect, $_POST['programming_languages']);
          $data_bases = mysqli_fix_string($db_connect, $_POST['data_bases']);
          $web_servers = mysqli_fix_string($db_connect, $_POST['web_servers']);

          //create a query for entering data in to Mysqul table = tools
          //need to specify with attributes we are providing since we do not provide all attributes

          $query = "INSERT INTO technologies (javaScript, front_end_Frameworks, web_applications,
            programming_languages, data_bases, web_servers)
            VALUES" . "('$javaScript', '$front_end_Frameworks', '$web_applications', '$programming_languages',
            '$data_bases', '$web_servers')";

            //tesing if successful inserrting data in  table

            if(!mysqli_query($db_connect, $query))
            echo "INSERT faild: $query <br>" . mysqli_error($db_connect). "<br><br>";
          }

          //        echo "Display contents of table = 'technologies'<br><hr>";
          $query = "SELECT * FROM technologies";
          $result = mysqli_query($db_connect, $query);
          if (!$result) die ("Database access failed: " . mysqli_error($db_connect));
          $rows = mysqli_num_rows($result);
          for ($j = 0 ; $j < $rows ; ++$j){
            $row = mysqli_fetch_row($result);
            // need to consult table to identify correct index for field
            /*
            echo '  javaScript: ' . $row[0] . '<br>';
            echo '  front_end_Frameworks: ' . $row[1] . '<br>';
            echo '  web_applications: ' . $row[2] . '<br>';
            echo '  programming_languages: ' . $row[3] . '<br>';
            echo '  data_bases: ' . $row[4] . '<br>';
            echo '  web_servers: ' . $row[5] . '<br><hr>';
            */
          }

          //          echo "Display AVERAGE SCORES for table = 'technologies'<br><hr>";
          // create query that returns SUM of scores for each tool
          $query = "SELECT SUM(javaScript), SUM(front_end_Frameworks), SUM(web_applications), SUM(programming_languages),
          SUM(data_bases), SUM(web_servers) FROM technologies";

          // $result will return a single row of SUMs
          $result = mysqli_query($db_connect, $query);
          if (!$result) die ("Database access failed: " . mysqli_error($db_connect));
          // fetch first (and only row) and this will be regular array
          $firstrow = mysqli_fetch_row($result);
          // add div tag with class .results applied using \ to escape " quotation marks
          // Note: don't mix singe and double quotation marks
          echo '<div class=\'resultStyle\'>';
          echo ' <table class=\'table-striped\'>';
          // display SUM values and Average with is SUM / $rows (the latter computed further up)
          //'<b>' . $name . '</b>'
          echo '<tr><td>' . '<b>'.'Info javaScript'  . '</b>' . ': SUM = ' . '<b>'.$firstrow[0].'</b>'. ' and AVE = '.'<b>'. number_format($firstrow[0] / $rows, 2).'</b>' . '</td></tr>';
          echo '<tr><td>' . '<b>' . 'Info front_end_Frameworks' . '</b>' . ': SUM= '.'<b>' . $firstrow[1].'</b>' . ' and AVE = ' .
          '<b>'. number_format($firstrow[1] / $rows, 2).'</b>' . '</td></tr>';
          echo '<tr><td>' . '<b>'. 'Info web_applications' . '</b>' . ': SUM = ' . '<b>' .$firstrow[2] . '</b>'. ' and AVE = ' . '<b>'. number_format($firstrow[2] /
          $rows, 2).'</b>' . '</td></tr>';
          echo '<tr><td>' .'<b>'. 'Info programming_languages' . '</b>' . ': SUM = ' . '<b>' .$firstrow[3] . '</b>' . ' and AVE = ' . '<b>' . number_format($firstrow[3] /
          $rows, 2).'</b>' . '</td></tr>';
          echo '<tr><td>' .'<b>'. 'Info data_bases'. '</b>' .': SUM = ' . '<b>' .$firstrow[4] . '</b>' . ' and AVE = ' . '<b>' . number_format($firstrow[4] /
          $rows, 2). '</b>' . '</td></tr>';
          echo '<tr><td>' .'<b>' . 'Info web_servers' . '</b>' .': SUM = ' . '<b>' .$firstrow[5] . '</b>'. ' and AVE = ' . '<b>'. number_format($firstrow[5] /
          $rows, 2). '</b>' . '</td></tr>';
          echo '</table>';
          // add closing div tag
          echo '</div>';

          function displayPostArray($postarray){
            //echo (displayPostArray . "<br>");

            foreach ($postarray as $technologies => $score) {
              // code...
              echo "$technologies" . "=" . "$score <br>";
            }
          }

          //create a function to make sure data sent to database is safe
          //passes each retrived item through the mysqli_real_escape_string function to strip
          //that a hacker may have inserted in order to brakke into or alter your database

          function mysqli_fix_string($db_connect, $string){
            if(get_magic_quotes_gpc())
            $string = stripslashes($string);
            return mysqli_real_escape_string($db_connect, $string);
          }
          ?>
          <!--
          <div>
          <h4>Discription of Infor Technologies</h4>
          <p>I found an extensive list of web development tools that let us create beautiful websites. Many of the internet development tools are the ones we might need daily.  We can use these web development tools to help ease our web development workflow.  Some of the tools we have used for 550 class. Javascript,  which happens to be a very popular programming language on the internet. Front-end frameworks include a group which is built by other folders and files, like CSS, Javascript, and HTML. We will also find various stand-alone frameworks there. The Bootstrap where a robust framework could become a critical tool for web developers. Web Applications is the software framework build to remove difficulties involved while developing web services and apps. Programming languages are formally constructed languages made for linking with the system and creates programs in which we checked the mannerisms. The backbone of all web development tools is the language. Databases are a collected group of information so that they can be updated, managed and retrieved. And web servers, statistics show that over 80% of web applications and websites are powered by open source and servers.</p>
        </div>
      -->
    </div>
 </div> <!--  container fluid end -->
 <footer>Created for InfoTech Class 550</footer>
 </body>
</html>
