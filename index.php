<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/all.css">
    <title>Encryptor</title>
</head>
<body class="image animated fadeIn">
    <div class="navBar image animated fadeInDownBig">
        <center><a href="index.php"><span class="title"><i class="fas fa-code-branch"></i> encryptor</span></a> </center>
    </div>
    <div style="margin-bottom:250px;"></div>
    <center>
        <form action="#" method="POST">
            <p><i class="fas fa-exclamation-triangle"></i> Some problems regarding alignment when converting paragraphs to ASCII or BASE-2.<br>
            <i class="fas fa-bullhorn"></i> Fixed <b>TEXT to ASCII</b> conversion bug.</p>
            <input type="text" class="styled" placeholder="Enter your text here" name="text">
            <select class="styled" name="method">
                <option value="SHA-1">Text to SHA-1</option>
                <option value="md5">Text to md5</option>
                <option value="ROT-13">Text to ROT-13</option>
                <option value="DES">Text to DES</option>
                <option value="ASCII">Text to ASCII</option>
                <option value="BASE2-TEXT">Text to BASE-2</option>
                <option value="BASE64">Text to BASE-64</option>
                <option value="BASE2">BASE-10 to BASE-2</option>
                <option value="BASE3">BASE-10 to BASE-3</option>
                <option value="BASE4">BASE-10 to BASE-4</option>
                <option value="BASE5">BASE-10 to BASE-5</option>
                <option value="BASE6">BASE-10 to BASE-6</option>
                <option value="BASE7">BASE-10 to BASE-7</option>
                <option value="BASE8">BASE-10 to BASE-8</option>
                <option value="BASE9">BASE-10 to BASE-9</option>
            </select>
        </form>
        <p>1. Type in the text you want to encrypt<br>2. Select the type of encryption<br>3. Hit ENTER and copy the result.</p>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $text = $_POST['text'];
        $selection = $_POST['method'];
        if ($selection == "SHA-1")
            $result = sha1($text);
        else if ($selection == "md5")
            $result = md5($text);
        else if ($selection == "ROT-13")
            $result = str_rot13($text);
        else if ($selection == "DES")
            $result = crypt($text, $salt=null);
        else if ($selection == "ASCII") {
            $transformedText;
            echo '<font color="#0fb1ff">Output:</font>';
            for ($i = 0; $i<strlen($text); $i++) {
                $transformedText[$i] = ord($text[$i]);
                echo " ".$transformedText[$i];
            }
        }
        else if ($selection == "BASE2-TEXT")
        {
            $transformedText;
            echo '<font color="#0fb1ff">Output:</font>';
            for ($i = 0; $i<strlen($text); $i++) {
                $transformedText[$i] = ord($text[$i]);
                $res[$i] = base_convert($transformedText[$i], 10, 2);
                echo " ".$res[$i];
            }
        }
        else if ($selection == "BASE2")
            $result = base_convert($text, 10, 2);
        else if ($selection == "BASE3")
            $result = base_convert($text, 10, 3);
        else if ($selection == "BASE4")
            $result = base_convert($text, 10, 4);
        else if ($selection == "BASE5")
            $result = base_convert($text, 10, 5);
        else if ($selection == "BASE6")
            $result = base_convert($text, 10, 6);                                                        
        else if ($selection == "BASE7")
            $result = base_convert($text, 10, 7);
        else if ($selection == "BASE8")
            $result = base_convert($text, 10, 8);
        else if ($selection == "BASE9")
            $result = base_convert($text, 10, 9);
        else if ($selection == "BASE64")
            $result = base64_encode($text);
        // show the final text
        if ($selection != "ASCII" && $selection != "BASE2-TEXT")
            echo '<font color="#0fb1ff">Output: </font>'.$result;
    }
    ?>
    </center>
</body>
</html>