<?php
function escape($string) {
	return htmlentities($string);
}


function decode($string){
	return html_entity_decode($string);
}

/**
 * this function is for running xpath query for all user
 * @param $xml xml file  where text to be searchd
 * @param $query querry to be run
 * @return mixed return the search result
 */
function searchElements($xml, $query) {
	// variable to store uppercase
	$upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅ"; // add any characters...
	//variable to store lower calse
	$lower = "abcdefghijklmnopqrstuvwxyzæøå"; // ...that are missing

	/**
	 *  convert both title and descripton into lower case and lower to upper case mix and match
	 */
	$arg_title = "translate(title, '$upper', '$lower')";
	$arg_query    = "translate('$query', '$upper', '$lower')";

	$arg_descriptions = "translate(description, '$upper', '$lower')";
	$arg_query    = "translate('$query', '$upper', '$lower')";
	return $xml->xpath("//item[contains($arg_title, $arg_query) or contains($arg_descriptions, $arg_query)]");
}

/**
 * this function wihh run xpath query to search the articles of user's saved articles
 * @param $xml xml file where the querry to be searched
 * @param $query querry to be run
 * @param $root pass the user's  xml file name
 * @return mixed return the the search results
 */
function searchMyElements($xml, $query,$root) {
	$upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅ"; // add any characters...
	$lower = "abcdefghijklmnopqrstuvwxyzæøå"; // ...that are missing

	$arg_title = "translate(title, '$upper', '$lower')";
	$arg_query    = "translate('$query', '$upper', '$lower')";

	$arg_descriptions = "translate(description, '$upper', '$lower')";
	$arg_query    = "translate('$query', '$upper', '$lower')";

	$xpath ="//"."$root"."[contains($arg_title, $arg_query) or contains($arg_descriptions, $arg_query)]";

	return $xml->xpath($xpath);
}