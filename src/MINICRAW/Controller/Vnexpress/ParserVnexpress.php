<?php
require './Views/View.php';

class ParserVnexpress
{
    public function __construct()
    {
        $this->execute();
    }
    
    public function execute(){
        
        // Get Data Title
        $url_page = $_POST['url_page'];
        $url = $url_page;
        // Initialize a CURL session.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Grab URL and pass it to the variable
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        $regex_title = '#<h1 class="title-detail">(.*?)</h1>#si';
        preg_match($regex_title, $result, $title);

        
        // Get Data description
        $regex_description = '#<p class="description">(.*?)</p>#si';
        preg_match($regex_description, $result, $description);
        
        // Get Data Date
        $regex_date = '#<span class="date">(.*?)</span>#si';
        preg_match($regex_date, $result, $date);
        
        // Get Data Details
        $regex_details = '#<p class="Normal">(.*?)</p>#si';
        preg_match_all($regex_details, $result, $details);

    }
}
$controller = new ParserVnexpress;
$controller->execute();