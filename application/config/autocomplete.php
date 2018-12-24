<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
 *
 *   _________ Codeigniter 3 Autocomplete for PHPStorm ____________
 *
	1) Controllers
	2) Models
	3) Create named properties for your application Models,
	can then access the model methods from the controller.

	WORK IN PROGRESS, this is still rough but does work for CI 3
	https://forum.codeigniter.com/thread-63641.html
*/

/**
 *
 *                         * ************** for Controllers *****************
 *============ Codeigniter Core System ================
 * @property CI_Benchmark $benchmark              Benchmarks
 * @property CI_Config $config                    This class contains functions that enable config files
 * @property CI_Controller $controller            This class object is the super class that every library in.
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Hooks $hooks                      Provides a mechanism to extend the base system
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Profiler $profiler                Display benchmark results, queries you have run, etc
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_URI $uri                          Retrieve information from URI strings
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 *
 *
 * @property CI_Model $model                      Codeigniter Model Class
 *
 * @property CI_Driver $driver                    Codeigniter Drivers
 *
 *
 *============ Codeigniter Libraries ================
 *
 * @property CI_Cache $cache                      Caching
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encryption $encryption            The Encryption Library provides two-way data encryption.
 * @property CI_Upload $upload                    File Uploading class
 * @property CI_Form_validation $form_validation  Form Validation class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Migration $migration              Tracks & saves updates to database structure
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Template parser
 * @property CI_Security $security                Processing input data for security.
 * @property CI_Session $session                  Session Class
 * @property CI_Table $table                      HTML table generation
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_User_agent $agent                 Identifies the platform, browser, robot, or mobile
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 *
 *
 *                          *============ Database Libraries ================
 *
 *
 * @property CI_DB_query_builder $db   Database
 * @property CI_DB_forge $dbforge     Database
 * @property CI_DB_result $result                 Database
 *
 *
 *
 *
 *                            *============ Codeigniter Depracated  Libraries ================
 *
 * @property CI_Javascript $javascript            Javascript (not supported
 * @property CI_Jquery $jquery                    Jquery (not supported)
 * @property CI_Encrypt $encrypt                  Its included but move over to new Encryption Library
 *
 *
 *                            *============ Codeigniter Project Models ================
 *  Models that are in your project. if the model is in a folder, still just use the model name.
 *
 *  load the model with Capital letter $this->load->model('People') ;
 *  $this->People-> will show all the methods in the People model
 *
 * @property Ajax $Ajax
 * @property Authentication $authentication
 * @property Calendar_library $calendar_library
 * @property Cart_library $cart_library
 * @property Fckeditor $fckeditor
 * @property Myfckeditor $myfckeditor
 * @property Language_library $language_library
 * @property Template_library $template_library
 *
 * @property Category_model $category_model
 * @property Coupon_model $coupon_model
 * @property Meta_model $meta_model
 * @property News_model $news_model
 * @property Order_model $order_model
 * @property Product_model $product_model
 * @property Search_model $search_model
 * @property User_model $user_model
 *
 */
class CI_Controller
{
}

;

/**
 *
 * ************** For Models  *****************
 *
 *
 *============ Codeigniter Core System ================
 * @property CI_Benchmark $benchmark              Benchmarks
 * @property CI_Config $config                    This class contains functions that enable config files
 * @property CI_Controller $controller            This class object is the super class that every library in.
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Hooks $hooks                      Provides a mechanism to extend the base system
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Profiler $profiler                Display benchmark results, queries you have run, etc
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_URI $uri                          Retrieve information from URI strings
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 *
 *
 * @property CI_Model $model                      Codeigniter Model Class
 *
 * @property CI_Driver $driver                    Codeigniter Drivers
 *
 *
 *============ Codeigniter Libraries ================
 *
 * @property CI_Cache $cache                      Caching
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encryption $encryption            The Encryption Library provides two-way data encryption.
 * @property CI_Upload $upload                    File Uploading class
 * @property CI_Form_validation $form_validation  Form Validation class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Migration $migration              Tracks & saves updates to database structure
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Template parser
 * @property CI_Security $security                Processing input data for security.
 * @property CI_Session $session                  Session Class
 * @property CI_Table $table                      HTML table generation
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_User_agent $user_agent            Identifies the platform, browser, robot, or mobile
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 *
 *
 *                          *============ Database Libraries ================
 *
 *
 * @property CI_DB_query_builder $db   Database
 * @property CI_DB_forge $dbforge     Database
 * @property CI_DB_result $result                 Database
 *
 *
 *
 *                            *============ Codeigniter Depracated  Libraries ================
 *
 * @property CI_Javascript $javascript            Javascript (not supported
 * @property CI_Jquery $jquery                    Jquery (not supported)
 * @property CI_Encrypt $encrypt                  Its included but move over to new Encryption Library
 *
 *
 *                            *============ Codeigniter Project Models ================
 *  Models that are in your project. if the model is in a folder, still just use the model name.
 *
 *  load the model with Capital letter $this->load->model('People') ;
 *  $this->People-> will show all the methods in the People model
 *
 * @property Ajax $Ajax
 * @property Authentication $authentication
 * @property Calendar_library $calendar_library
 * @property Cart_library $cart_library
 * @property Fckeditor $fckeditor
 * @property Myfckeditor $myfckeditor
 * @property Language_library $language_library
 *
 * @property Category_model $category_model
 * @property Coupon_model $coupon_model
 * @property Meta_model $meta_model
 * @property News_model $news_model
 * @property Order_model $order_model
 * @property Product_model $product_model
 * @property Search_model $search_model
 * @property User_model $user_model
 *
 */
class CI_Model
{
}

;


/* End of file autocomplete.php */
/* Location: ./application/config/autocomplete.php */