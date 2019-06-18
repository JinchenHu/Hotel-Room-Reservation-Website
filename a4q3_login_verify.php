<?php


    function verifyUsername($userInfo, $userName){
        $flag = 0;
        $readFile = fopen($userInfo,"r") or die("unable to open the file");
        while(!feof($readFile)){
            $userItem = fgets($readFile);
            $storeName = substr($userItem,0, strpos($userItem,":"));
            if ($userName == $storeName){
                $flag = 1;
                break;
            }
        }
        fclose($readFile);
        return $flag;
    }

    function verifyUser($userInfo, $userName, $password){
        $matchFlag = 0;
        if (is_file($userInfo) and is_readable($userInfo)){
            $openFile = fopen($userInfo,"r") or die("enable to open the file");
            while(!feof($openFile)){
                $userItem = fgets($openFile);
                $itemArr = explode(":",$userItem);
                $storeName = $itemArr[0];
                $storePsw = trim($itemArr[1]);
                if ($userName == $storeName and $password == $storePsw){
                    $matchFlag = 1;
                    break;
                }
            }
            fclose($openFile);
            return $matchFlag;
        }else
            return 0;
    }




    //function to create a new account and store the information into the txt file
    function createAccount($userInfo,$userName,$password){
        if ((is_writable($userInfo) and is_file($userInfo)) or !file_exists($userInfo)){
            //sets write mode as append
            //if the file doesn't exist
            if (!file_exists($userInfo)){
                //first line contents
                $userItem = $userName . ":" . $password;
            }
            else {
                $userItem = "\n" . $userName . ":" . $password;
            }

            $appUserInfo = fopen($userInfo,'a') or die("unable to open the file");
            fwrite($appUserInfo,$userItem);
            fclose($appUserInfo);
        }

    }


    ?>

