<?php
/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}
if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

function get_excerpt($article, $numwords = 27){
	$string = '';
	$url = 'article/'.intval($article->id).'/'.e($article->slug);
	$string .= '<h2>'.e($article->title).' </h2>';
	$string .= '<i><small>Published on '.e($article->pubdate).'</small></i>';
	$string .= '<p>'. e(limit_to_numwords(strip_tags($article->body), $numwords)) .'...</p>';
	$string .= anchor($url, 'More', array('class' => 'button alt'));
	return $string;
}

function limit_to_numwords($string, $numwords){
	$excerpt = explode(' ', $string, $numwords + 1);
	if(count($excerpt) >= $numwords){
		array_pop($excerpt);
	}
	$res = implode(' ', $excerpt);
	return $res;
}

function e($string){
	return htmlentities($string);
}

function get_hash($string){
    return hash('sha512', $string.config_item('encryption_key'));
}

?>