<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="manifest" href="/manifest.json">
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js?v=3');
            });
        }
    </script>
</head>

<body>

    süper oldu işlem başarılı<br>
    <button class="install-btn">Uygulamayı Yükle</button>
    <script>
        var promptEvent;

        // Capture event and defer
        window.addEventListener('beforeinstallprompt', function(e) {
            e.preventDefault();
            promptEvent = e;
            listenToUserAction();
        });

        // listen to install button clic
        function listenToUserAction() {
            const installBtn = document.querySelector(".install-btn");
            installBtn.addEventListener("click", presentAddToHome);
        }

        // present install prompt to user
        function presentAddToHome() {
            promptEvent.prompt(); // Wait for the user to respond to the prompt
            promptEvent.userChoice
                .then(choice => {
                    if (choice.outcome === 'accepted') {
                        console.log('User accepted');
                    } else {
                        console.log('User dismissed');
                    }
                })
        }
    </script>

</body>

</html>