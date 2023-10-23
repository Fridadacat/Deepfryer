<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frittiertes Bild</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .center-image {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
            position: relative;
        }

        .responsive-image {
            max-width: 100%;
            max-height: 100%;
        }

        .quality-slider {
            width: 100%;
            max-width: 500px;
            position: relative;
            bottom: 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 center-image">
                <?php
                require 'C:/xampp/htdocs/vendor/autoload.php';

                function convertAndDownload($file_path, $outputFormat)
                {
                    $im = imagecreatefromjpeg($file_path);

                    if ($im === false) {
                        echo "Fehler beim Laden des Bildes.";
                        return;
                    }

                    $outputPath = 'C:/xampp/htdocs/' . pathinfo($file_path, PATHINFO_FILENAME) . '_deepfried.' . $outputFormat;

                    if ($outputFormat == 'gif') {
                        imagegif($im, $outputPath);
                    } elseif ($outputFormat == 'png') {
                        imagepng($im, $outputPath);
                    }

                    imagedestroy($im);

                    if (file_exists($outputPath)) {
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename="' . basename($outputPath) . '"');
                        header('Expires: 0');
                        header('Cache-Control: must-revalidate');
                        header('Pragma: public');
                        header('Content-Length: ' . filesize($outputPath));
                        readfile($outputPath);
                        exit;
                    } else {
                        echo "Fehler beim Konvertieren des Bildes.";
                    }
                }


                if (isset($_FILES['uploaded_image'])) {
                    $upload_dir = 'C:/xampp/htdocs/';

                    // Check if there was an error during file upload
                    if ($_FILES['uploaded_image']['error'] !== UPLOAD_ERR_OK) {
                        echo "Fehler beim Hochladen des Bildes.";
                    } else {
                        $file_name = $_FILES['uploaded_image']['name'];
                        $file_path = $upload_dir . $file_name;

                        // Check if the file is a valid JPG image
                        $image_info = getimagesize($_FILES['uploaded_image']['tmp_name']);
                        if ($image_info === false || $image_info['mime'] !== 'image/jpeg') {
                            echo "Die hochgeladene Datei ist kein gültiges JPG-Bild.";
                        } elseif ($_FILES['uploaded_image']['size'] > 200000) {
                            // Check if the file size is greater than 200 KB
                            echo "Die Datei ist zu groß. Bitte wählen Sie eine kleinere Datei (max. 200 KB).";
                        } else {
                            if (move_uploaded_file($_FILES['uploaded_image']['tmp_name'], $file_path)) {
                                $fryer = new MirazMac\DeepFry\Fryer($file_path);
                                $picture = $fryer->fry()
                                    ->moreDeepNibba()
                                    ->quality(20)
                                    ->save();

                                $improved_file_path = 'http://localhost/' . pathinfo($file_name, PATHINFO_FILENAME) . '_deepfried.jpg';
                                echo "<img src='$improved_file_path' alt='Frittiertes Bild' class='responsive-image'>";

                                echo '<div class="quality-slider">';
                                echo "<h2>Qualität:</h2>";
                                echo '<input type="range" id="qualitySlider" min="1" max="100" value="20">';
                                echo '<span id="qualityValue">20</span>';
                                echo '</div>';

                                echo '<div class="download-buttons mt-4">';
                                echo '<a href="' . $improved_file_path . '" download="image.jpg" class="btn btn-primary mr-2">Download JPG</a>';
                                echo '<a href="' . $improved_file_path . '" download="image.gif" class="btn btn-primary mr-2">Download GIF</a>';
                                echo '<a href="' . $improved_file_path . '" download="image.png" class="btn btn-primary">Download PNG</a>';
                                echo '</div>';

                                echo "<script>
                                    var qualitySlider = document.getElementById('qualitySlider');
                                    var qualityValue = document.getElementById('qualityValue');
                                    qualitySlider.oninput = function() {
                                        qualityValue.innerHTML = this.value;
                                    };
                                    qualitySlider.onchange = function() {
                                        var quality = this.value;
                                        var image = new Image();
                                        image.src = '$improved_file_path';
                                        image.onload = function() {
                                            var canvas = document.createElement('canvas');
                                            var ctx = canvas.getContext('2d');
                                            canvas.width = image.width;
                                            canvas.height = image.height;
                                            ctx.drawImage(image, 0, 0);
                                            var dataUrl = canvas.toDataURL('image/jpeg', quality / 100);
                                            var imgElement = document.querySelector('.responsive-image');
                                            imgElement.src = dataUrl;
                                        };
                                    };
                                </script>";
                            } else {
                                echo "Fehler beim Hochladen des Bildes.";
                            }
                        }
                    }
                } else {
                    echo "Kein Bild zum Frittieren ausgewählt.";
                }

                if (isset($_POST['download_png'])) {
                    convertAndDownload($file_path, 'png');
                } elseif (isset($_POST['download_gif'])) {
                    convertAndDownload($file_path, 'gif');
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>