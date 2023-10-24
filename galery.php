<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        #imageCarousel {
            margin: 0 auto;
            max-width: 100%;
        }
        #imageCarousel img {
            max-width: 100%;
            max-height: 80vh; /* Adjust the value as needed */
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-4">Galerie</h1>

        <div id="imageCarousel" class="carousel slide mt-4" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $imageFolder = './'; // Use a relative path to your image folder
                $deepfriedImages = glob($imageFolder . '*_deepfried.jpg');
                $uniqueImages = array();

                foreach ($deepfriedImages as $deepfriedImage) {
                    $filename = pathinfo($deepfriedImage, PATHINFO_FILENAME);
                    $originalImage = $imageFolder . $filename . '.jpg';

                    if (file_exists($originalImage) && !in_array($deepfriedImage, $uniqueImages)) {
                        $uniqueImages[] = $deepfriedImage;
                        $active = (count($uniqueImages) === 1) ? 'active' : '';
                ?>
                <div class="carousel-item <?= $active ?>">
                    <img src="<?= $deepfriedImage ?>" class="d-block w-100" alt="<?= $filename ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <?= $filename ?>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Zurück</span>
            </a>
            <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Weiter</span>
            </a>
        </div>
    </div>
</body>
</html>
