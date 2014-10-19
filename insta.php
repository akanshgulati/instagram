<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title></title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="Stylesheet" href="instastyle.css" />
        <script>
            $(window).load(function()
            {
                $('body').removeClass('black');
            });
        </script>
    </head>
    <body class="black">
        <div id='root'>
            <div class='box' id='instawidget'>
                <div class='box' id='instatitle'>
                    <div class='box' id='instaheading'>
                        <div class="instagram">
                            <img src="img/instagram.png">
                        </div>
                        See Yourself Here
                    </div>
                    <div class='box' id='instahashtag'>#HASHTAG
                        <p class="instadetail">Simply use hashtag #HASHTAG on Instagram and see how we've made our fans happy!</p>
                        <p class="instagallery" align="center"><a href="http://www.instagram.com/akanshgulati" target="_blank"> View Gallery</a></p>
                    </div>
                </div>
                <div class='box' id='instaphoto'>
                    <?php
                        require_once 'instagram.class.php';
                        $instagram = new Instagram('YOUR CLIENT ID');
                        $tag = 'akanshgulati'; //hashtag to use without '#'
                        $limit = 6; //Count of the number of photos to display

                    $media = $instagram->getTagMedia($tag);
                    $i=0;

                    foreach(array_slice($media->data, 0, $limit) as $data)
                    {
                        $i++;
                    // Show photo
                    echo '<a href="'.$data->link.'" target="_blank"><img src="'.$data->images->thumbnail->url.'" title="'.$data->caption->text.'"alt="'.$data->caption->text.'">';
                        //Adding images to next line after 3 images in a row
                    if($i%3==0)
                    {
                    echo "<br>";
                    }
                    }

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>