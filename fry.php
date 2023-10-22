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
            max-width: 500px; /* You can adjust the width as needed */
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

                if (isset($_FILES['uploaded_image'])) {
                    $upload_dir = 'C:/xampp/htdocs/';

                    $file_name = $_FILES['uploaded_image']['name'];
                    $file_path = $upload_dir . $file_name;

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
                } else {
                    echo "Kein Bild zum Frittieren ausgewählt.";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>