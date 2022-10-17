<?php
function replace_in_file($FilePath, $OldText, $NewText)
{
    $Result = array('status' => 'error', 'message' => '');
    if(file_exists($FilePath)===TRUE)
    {
        if(is_writeable($FilePath))
        {
            try
            {
                $FileContent = file_get_contents($FilePath);
                $FileContent = str_replace($OldText, $NewText, $FileContent);
                if(file_put_contents($FilePath, $FileContent) > 0)
                {
                    $Result["status"] = 'success';
                }
                else
                {
                   $Result["message"] = 'Error while writing file';
                }
            }
            catch(Exception $e)
            {
                $Result["message"] = 'Error : '.$e;
            }
        }
        else
        {
            $Result["message"] = 'File '.$FilePath.' is not writable !';
        }
    }
    else
    {
        $Result["message"] = 'File '.$FilePath.' does not exist !';
    }    
    return $Result;
}
?>
<html>
<head>
<link rel = "stylesheet"  type = "text/css"  href = "../css/main.css" />
</head>
<body>
<div class="container">
<?php
if (isset($_POST) && count($_POST)>0) {
    $var_app_domain = $_POST['var_app_domain'];
    $var_app_inner_directory = $_POST['var_app_inner_directory'];
    $var_db_host = $_POST['var_db_host'];
    $var_db_name = $_POST['var_db_name'];
    $var_db_user = $_POST['var_db_user'];
    $var_db_pass=($_POST['var_db_pass']!='' ? $_POST['var_db_pass'] : '');

    echo '<b>change .htaccess</b><br/>';
    $msg=replace_in_file('../.htaccess', '_APP_INNER_DIRECTORY_', $var_app_inner_directory);
    echo $msg['status'].' '.$msg['message'].'<br/><br/>';
    echo '<b>change conf.inc.php</b><br/>';
    foreach($_POST as $k=>$v) {   
        $key=strtoupper(str_replace('var_','',$k));
        if ($k!='submit') {
            $msg=replace_in_file('../conf.inc.php', '_'.$key.'_', $v);
            echo 'Replace '.$key.' '.$msg['status'].' '.$msg['message'].'<br/><br/>';
        }    
}

try {
    $conn = new PDO("mysql:host=".$var_db_host, $var_db_user, $var_db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DROP DATABASE IF EXISTS ".$var_db_name;
    $conn->exec($sql);

    $sql = "CREATE DATABASE IF NOT EXISTS ".$var_db_name;
    $conn->exec($sql);
    $sql = "use ".$var_db_name;
    $conn->exec($sql);

    echo "DB ".$var_db_name." created successfully<br/>";

    $sql = "CREATE TABLE IF NOT EXISTS `users` (
                `id` int(4) AUTO_INCREMENT PRIMARY KEY,
                `name` varchar(30) NOT NULL) 
                ENGINE=MyISAM DEFAULT CHARSET=utf8;";
    
    $conn->exec($sql);

    echo "Table users created successfully<br/>";

    $sql = "CREATE TABLE IF NOT EXISTS `advertisements` (
        `id` int(6) AUTO_INCREMENT PRIMARY KEY,
        `userid` int(4) NOT NULL,
        `title` varchar(200) NOT NULL) 
        ENGINE=MyISAM DEFAULT CHARSET=utf8";
    $conn->exec($sql);    

    echo "Table advertisements created successfully<br/>";


    $sql="ALTER TABLE `advertisements` 
    ADD KEY `userid` (`userid`);";
    $conn->exec($sql); 
    echo "Added index userid to advertisements table<br/>";

    $fp = fopen("users.csv", "r");
    fgetcsv($fp);
    while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
    
        $importSQL = "INSERT INTO users VALUES('".$data[0]."','".$data[1]."')";
    
        $conn->exec($importSQL);  
    
    }
    
    fclose($fp);
    
    echo "Table users populated successfully<br/>";

    $fp = fopen("advertisements.csv", "r");
    fgetcsv($fp);
    while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
        $importSQL = "INSERT INTO advertisements VALUES('".$data[0]."','".$data[1]."','".$data[2]."')";
    
        $conn->exec($importSQL);  
    
    
    }
    
    fclose($fp);

    echo "Table advertisements populated successfully<br/>";
    
    echo "<br/><a href='../'>Go to application</a>";
    
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

}
else {
?>
    <h3>SETUP</h3>
    <form action="install.php" method="POST">
    <div class="form-group required">
        <label>App domain</label>
        <input type="text" name="var_app_domain" placeholder="http://domain.com" required />   
    
        <label>Directory (path from web root)</label>
        <input type="text" name="var_app_inner_directory" placeholder="testfolder" required/>   
        
        <label>Database host (localhost)</label>
        <input type="text" name="var_db_host" placeholder="localhost" required/>   
        
        <label>Database name</label>
        <input type="text" name="var_db_name" required/>   
        
        <label>Database username</label>
        <input type="text" name="var_db_user" required/>   
    </div>        
        <label>Database password</label>
        <input type="text" name="var_db_pass"/>
        <input type="submit" name="submit" value="Submit">
    
    </form>
<?php 
}
?>    
</div>
</body>

</html>
