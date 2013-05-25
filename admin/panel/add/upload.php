<?php
    $baseurl = "http://andrey.x10.mx/view?view=";
    function get_bitly_short_url($url,$login,$appkey,$format='txt') {
	    $connectURL = 'http://api.bit.ly/v3/shorten?login='.$login.'&apiKey='.$appkey.'&uri='.urlencode($url).'&format='.$format.'&domain=j.mp';
	    return file_get_contents($connectURL);
    }

    include("../../../variables.php");
    if(!$_COOKIE["password"] == md5(adminPass)) {
        header("Location: /admin?e=2");
        exit;
    }

    date_default_timezone_set('America/Los_Angeles'); //change time zone
    $date = getdate();
    $created = $date["month"].PHP_EOL.$date["mday"].PHP_EOL.$date["year"];

    $album = $_POST["albumName"]; //get album name
    $description = $_POST["desc"];

    $number = file_get_contents("../../../content/number.txt"); //get album id
    $number = $number + 1;
    file_put_contents("../../../content/number.txt", $number);

    $album = $album.$number;
    mkdir("../../../content/".$album); //make a folder for the album

    $albumList = file_get_contents("../../../content/albums.txt");
    $albumList = $album.PHP_EOL.$albumList; //add new album to front of list
    file_put_contents("../../../content/albums.txt", $albumList);

    $album = $album."/";

    file_put_contents("../../../content/".$album."description.txt", $description); //set description

    for ($i=0; $i<=200; $i++) {
        //echo $i.": ";
        if(isset($_FILES["file"]["name"][$i])) {
            $ext = end(explode(".", $_FILES["file"]["name"][$i]));
            if(($ext == "gif") || ($ext == "png") || ($ext == "jpg") || ($ext == "jpeg")) {
                //echo $_FILES["file"]["name"][$i]." &middot; <a href='/content/".$album.$_FILES["file"]["name"][$i]."'>View</a><br/>";
                copy($_FILES["file"]["tmp_name"][$i], "../../../content/".$album.$_FILES["file"]["name"][$i]);
                $cover = $_FILES["file"]["name"][$i];
                $index = $index.$_FILES["file"]["name"][$i].PHP_EOL;
            }
            else {
                //echo $_FILES["file"]["name"][$i]." Skipped. &middot; File extension is ".$ext."<br/>";
            }
            file_put_contents("../../../content/".$album."cover.txt", $cover);
            file_put_contents("../../../content/".$album."published.txt", $created);
            file_put_contents("../../../content/".$album."indexed.txt", $index);
        }
        else {
            echo "Stopped. <br/>";
            break;
        }
    }
    $jmp = get_bitly_short_url($baseurl.$album,'ghostmancer','R_db1536fd25b4dfdedfc3fbe675245d4d'); //get short url
    //echo $jmp;
    file_put_contents("../../../content/".$album."perma.txt", $jmp);
    file_put_contents("../../../content/".$album."css.txt", "");
    //total + 1
    $total = file_get_contents("../../../content/total.txt");
    $total = $total + 1;
    file_put_contents("../../../content/total.txt", $total);
    //echo "Done!";
    header("Location: /admin/panel/add");
?>