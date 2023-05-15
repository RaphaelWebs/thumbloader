<?php
//Download thumbnail on button press
if (isset($_POST['button'])) {
    $imgUrl = $_POST['imgurl'];
    $ch = curl_init($imgUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $downloadImg = curl_exec($ch);
    curl_close($ch);
    header('Content-type: image/jpg');
    header('Content-Disposition: attachment;filename="thumbnail.jpg"');
    echo $downloadImg;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Youtube Video Thumbnail | Raphael</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/favicon-16x16.png">
    <link rel="mask-icon" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/safari-pinned-tab.svg" color="#1f487e">

</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <header>Download YouTube Video Thumbnail</header>
        <div class="url-input">
            <span class="title">Paste the video url:</span>
            <div class="field">
                <input type="text" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ" required>
                <input class="hidden-input" type="hidden" name="imgurl">
            </div>
            <div class="preview-area">
                <img class="thumbnail" src="" alt="">
                <i class="fas fa-cloud-download icon"></i>
                <span>Paste video url to see preview</span>
            </div>
            <button class="download-btn" type="submit" name="button">Download Thumbnail</button>

    </form>





</body>

</html>