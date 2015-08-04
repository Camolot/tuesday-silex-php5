<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpening.php";

    $app = new Silex\Application();

    $app->get("/", function (){
      return"
      <!DOCTYPE html>
      <html>
        <head>
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
          <title>Job Board</title>
        </head>
        <body>
          <div class='container'>
            <h1>Job Board</h1>
            <p>Enter your job info</p>
            <form action='/job_search'>
              <div class='form-group'>
                <label for='title'>Enter your job title</label>
                <input id='title' name='title' class='form-control' type='text'>
                <label for='desc'>Briefly describe the job</label>
                <input id='desc' name='desc' class='form-control' type='text'>
                <label for='contact'>Contact info</label>
                <input id='contact' name='contact' class='form-control' type='text'>
              </div>
              <button type='submit' class='btn-success'>Submit</button>
            </form>
        </body>
      </html>
      ";
    });

    $app->get("/job_search", function (){
      $job = new JobOpening ($_GET["title"], $_GET["desc"], $_GET["contact"]);
      $jobs = array($job);

      $output = "";
      foreach ($jobs as $opening){
        $output = $output . "<h1>" . $opening->getTitle() . "</h1>
          <h2>" . $opening->getDesc() . "</h2>
          <h2>" . $opening->getContact() . "</h2>
        ";
      }
      return "
      <!DOCTYPE html>
       <html>
          <head>
              <title>Job Openings</title>
          </head>
          <body>
          " . $output . "
          </body>
      </html>";
    });

    return $app;
?>
