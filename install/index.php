<?php

error_reporting(0); //Setting this to E_ALL showed that that cause of not redirecting were few blank lines added in some php files.

$db_config_path = '../application/config/database.php';

// Only load the classes in case the user submitted the form
if($_POST) {

	// Load the classes and create the new objects
	require_once('includes/core_class.php');
	require_once('includes/database_class.php');

	$core = new Core();
	$database = new Database();


	// Validate the post data
	if($core->validate_post($_POST) == true)
	{

		// First create the database, then create tables, then write config file
		if($database->create_database($_POST) == false) {
			$message = $core->show_message('error',"The database could not be created, please verify your settings.");
		} else if ($database->create_tables($_POST) == false) {
			$message = $core->show_message('error',"The database tables could not be created, please verify your settings.");
		} else if ($core->write_config($_POST) == false) {
			$message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
		}

		// If no errors, redirect to registration page
		if(!isset($message)) {
		  $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
      $redir .= "://".$_SERVER['HTTP_HOST'];
      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      $redir = str_replace('install/','',$redir); 
			header( 'Location: ' . $redir . 'user/genconfig' ) ;
		}

	}
	else {
		$message = $core->show_message('error','Not all fields have been filled in correctly. The host, username, password, and database name are required.');
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Install | Acadequis</title>

		<style type="text/css">
		  body {
			  background: #e9e9e9;
			  color: #666666;
			  font-family: 'RobotoDraft', 'Roboto', sans-serif;
			  font-size: 14px;
			  -webkit-font-smoothing: antialiased;
			  -moz-osx-font-smoothing: grayscale;
			}

			/* Pen Title */
			.pen-title {
			  padding: 50px 0;
			  text-align: center;
			  letter-spacing: 2px;
			}
			.pen-title h1 {
			  margin: 0 0 20px;
			  font-size: 48px;
			  font-weight: 300;
			}
			.pen-title span {
			  font-size: 12px;
			}
			.pen-title span .fa {
			  color: #33b5e5;
			}
			.pen-title span a {
			  color: #33b5e5;
			  font-weight: 600;
			  text-decoration: none;
			}

			/* Form Module */
			.form-module {
			  position: relative;
			  background: #ffffff;
			  max-width: 320px;
			  width: 100%;
			  border-top: 5px solid #33b5e5;
			  box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
			  margin: 0 auto;
			}
			.form-module .toggle {
			  cursor: pointer;
			  position: absolute;
			  top: -0;
			  right: -0;
			  background: #33b5e5;
			  width: 30px;
			  height: 30px;
			  margin: -5px 0 0;
			  color: #ffffff;
			  font-size: 12px;
			  line-height: 30px;
			  text-align: center;
			}
			.form-module .toggle .tooltip {
			  position: absolute;
			  top: 5px;
			  right: -65px;
			  display: block;
			  background: rgba(0, 0, 0, 0.6);
			  width: auto;
			  padding: 5px;
			  font-size: 10px;
			  line-height: 1;
			  text-transform: uppercase;
			}
			.form-module .toggle .tooltip:before {
			  content: '';
			  position: absolute;
			  top: 5px;
			  left: -5px;
			  display: block;
			  border-top: 5px solid transparent;
			  border-bottom: 5px solid transparent;
			  border-right: 5px solid rgba(0, 0, 0, 0.6);
			}
			.form-module .form {
			  display: none;
			  padding: 40px;
			}
			.form-module .form:nth-child(2) {
			  display: block;
			}
			.form-module h2 {
			  margin: 0 0 20px;
			  color: #33b5e5;
			  font-size: 18px;
			  font-weight: 400;
			  line-height: 1;
			}
			.form-module input {
			  outline: none;
			  display: block;
			  width: 100%;
			  border: 1px solid #d9d9d9;
			  margin: 0 0 20px;
			  padding: 10px 15px;
			  box-sizing: border-box;
			  font-wieght: 400;
			  -webkit-transition: 0.3s ease;
			  transition: 0.3s ease;
			}
			.form-module input:focus {
			  border: 1px solid #33b5e5;
			  color: #333333;
			}
			.form-module button {
			  cursor: pointer;
			  background: #33b5e5;
			  width: 100%;
			  border: 0;
			  padding: 10px 15px;
			  color: #ffffff;
			  -webkit-transition: 0.3s ease;
			  transition: 0.3s ease;
			}
			.form-module button:hover {
			  background: #178ab4;
			}
			.form-module .cta {
			  background: #f2f2f2;
			  width: 100%;
			  padding: 15px 40px;
			  box-sizing: border-box;
			  color: #666666;
			  font-size: 12px;
			  text-align: center;
			}
			.form-module .cta a {
			  color: #333333;
			  text-decoration: none;
			}

		</style>
	</head>
	<body>
    <?php if(is_writable($db_config_path)){?>

		  <?php if(isset($message)) {echo '<p class="error">' . $message . '</p>';}?>

		  <main>
			  <div class="pen-title">
			    <h1>Acadiquis</h1>
			    <span>Design by Logic Boys</span>
			  </div>
			  <!-- Form Module-->


			  <div class="module form-module">
			    <div class="toggle">
			      <i class="fa fa-user"></i>
			    </div>


			    <div class="form">

			      <h2>Install</h2>
			      <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				      <input type="text" id="hostname" value="localhost" class="input_text" name="hostname" />
		          <input type="text" id="username" class="input_text" name="username" />
		          <input type="password" id="password" class="input_text" name="password" />
		          <input type="text" id="database" class="input_text" name="database" />
		          <input type="submit" value="Install" id="submit" />
		        </form>
			    </div>
			  </div>
			</main>

	  <?php } else { ?>
      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></p>
	  <?php } ?>

	</body>
</html>
