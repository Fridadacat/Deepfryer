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
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .responsive-image {
            max-width: 100%;
            max-height: 100%;
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

                        $improved_file_path = 'http://localhost/'.pathinfo($file_name, PATHINFO_FILENAME).'_deepfried.jpg';
                        echo "<img src='$improved_file_path' alt='Frittiertes Bild' class='responsive-image'>";
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