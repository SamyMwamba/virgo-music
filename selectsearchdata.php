<?php
/* prevent direct access to this page */
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if(!$isAjax) {
$user_error = 'Access denied - direct call is not allowed...';
trigger_error($user_error, E_USER_ERROR);
}
ini_set('display_errors',1);/* if the 'term' variable is not sent with the request, exit */
if ( !isset($_REQUEST['term']) ) {
exit;
}
$mysqli = new MySQLi("localhost","root","","km");
/* Connect to database and set charset to UTF-8 */
if($mysqli->connect_error) {
echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
exit;
} else {
$mysqli->set_charset('utf8');
}
/* retrieve the search term that autocomplete sends */
$term = "s";
/* replace multiple spaces with one */
$term = preg_replace('/\s+/', ' ', $term);
$a_json = array();
$a_json_row = array();
$a_json_invalid = array(array("id" => "#", "value" => $term, "label" => "Only letters and digits are
permitted..."));
$json_invalid = json_encode($a_json_invalid);
/* SECURITY HOLE *************************************************************** */
/* allow space, any unicode letter and digit, underscore and dash
*/
if(preg_match("/[^\040\pL\pN_-]/u", $term)) {
print $json_invalid;
exit;
}
/* ***************************************************************************** */
if ($data = $mysqli->query("SELECT * FROM artiste WHERE nomartiste LIKE '%$term%' OR nomclip
LIKE '%$term%' ORDER BY nomclip , nomartiste")) {
while($row = mysqli_fetch_array($data)) {
$nomclip = htmlentities(stripslashes($row['nomclip']));
$nomartiste = htmlentities(stripslashes($row['nomartiste']));
$id= htmlentities(stripslashes($row['id_artiste']));
$a_json_row["id"] = $id;
$a_json_row["value"] = $nomartiste.' '.$nomclip;
$a_json_row["label"] = $nomartiste.' '.$nomclip;array_push($a_json, $a_json_row);
}
}
/* jQuery wants JSON data */
echo json_encode($a_json);
flush();
$mysqli->close();