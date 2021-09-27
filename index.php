<?php
header('Content-Type: text/plain');
$path = explode("?", $_SERVER["REQUEST_URI"])[0];
if (str_starts_with($path, "/pastes"))
{
    if (file_exists($path))
    {
        echo(file_get_contents($path));
        die();
    }
    http_response_code(404);
}
else if ($path == "/" || $path == "")
{
    if (!isset($_POST["paste"]))
    {
        echo("send this page a POST request with the 'paste' argument filled");
        http_response_code(422);
        die();
    }
    $new = $_POST["paste"];
    $filename = "pastes/".hash("sha1", $new);
    file_put_contents("".$filename, $new);
    echo("http://".$_SERVER["HTTP_HOST"]."/".$filename);
}
?>