
<?php
    session_start();
    $username=$_SESSION["username"];

    $set = $_GET["set"];
    $question = $_GET["question"];
    $answer = $_GET["answer"];
    $setinfo = glob("data/set/*/info.txt");
    if(trim($question)==""||trim($answer)=="")
        print "Your question or answer is blank, please correct and upload again.";
    else{
        for($i=0;$i<count($setinfo);$i++){
            $setname = file($setinfo[$i]);
            if(trim($setname[0])==trim($set)){
                $content = fopen(dirname($setinfo[$i])."/content.txt", "a") or die("Unable to open file!");
                fwrite($content, $question."\n".$answer."\n");
                fclose($content);
                $id = substr($setinfo[$i],9,3);
                $position = glob("data/user/*/".$id.".txt");
                for($j=0;$j<count($position);$j++){
                    $max = find($position[$j])+1;
                    //print $max;
                    $pfile = fopen($position[$j], "a");
                    fwrite($pfile, "\n"."1 ".$max);
                    fclose($pfile);
                }
                //print dirname($setinfo[$i])."/content.txt";
                header("Location:user.php");
            }
        }
    }

    function find($pfile){
        $max = -1;
        $str = preg_split('/[ \r\n]+/s', file_get_contents($pfile));
        for($i=0;$i<count($str);$i=$i+2){
            if($str[$i]==1&&$str[$i+1]>$max){
                $max = $str[$i+1];
            }
        }
        return $max;
    }
?>