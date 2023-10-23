<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilderfritteuse</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .center-button {
            text-align: center;
        }

        .red-button {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <br>
                <h1 class="text-center">Bilderfritteuse</h1>
                <br>
                <form action="fry.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Hochladen</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="uploaded_image" id="inputGroupFile01" onchange="updateFileName()">
                            <label class="custom-file-label" for="inputGroupFile01" id="fileLabel">Wähle ein Bild aus, das du fritieren möchtest!</label>
                        </div>
                    </div>
                    <div class="mt-3 center-button">
                        <button type="submit" class="btn red-button"><b>Frittieren!</b></button>
                    </div>
                    <div style="position: fixed; bottom: 10px; right: 10px;">
                        <a href="gallery.php">Galerie...</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function updateFileName() {
            const input = document.getElementById("inputGroupFile01");
            const label = document.getElementById("fileLabel");
            const fileName = input.files[0] ? input.files[0].name : "Wähle ein Bild aus, das du fritieren möchtest!";
            label.innerText = fileName;
        }
    </script>
</body>

</html>