<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col mt-2">
                <img  src="img/1152x350.png" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col mt-3">
                <h4>A wonderful serenity has taken possession of my entire soul</h4>
                <br>
                <small>Posted By: <b>Admin</b></small>
                <br>
                <small class="text-muted">19 November 2018</small>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
                <p>I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary</p>
                <p>I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>
            </div>
        </div>

        <?php
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
            $full_url = $protocol."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
             
            $url = urlencode($full_url);
        ?>
        <div class="row justify-content-center">
            <a href="javascript:void(0)" onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=<?php echo $url; ?>')" title="Facebook Share"><img width="50px;" style="padding: 5px;" src="icon/Facebook.png" alt="Facebook"></a>

            <a href="javascript:void(0)" onclick="javascript:genericSocialShare('https://plus.google.com/share?url=<?php echo $url; ?>')" title="Google Share"><img width="50px;" style="padding: 5px;" src="icon/Google+.png" alt="Google+"></a>

            <a href="javascript:void(0)" onclick="javascript:genericSocialShare('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>')" title="Linkedin Share"><img width="50px;" style="padding: 5px;" src="icon/Linkedin.png" alt="Linkedin"></a>

            <a href="javascript:void(0)" onclick="javascript:genericSocialShare('http://twitter.com/share?url=<?php echo $full_url; ?>')" title="Twitter Share"><img width="50px;" style="padding: 5px;" src="icon/Twitter.png" alt="Twitter"></a>
        </div>
    </div>
    

    <script type="text/javascript">
        function genericSocialShare(url){
            window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
            return true;
        }
    </script>

</body>
</html>