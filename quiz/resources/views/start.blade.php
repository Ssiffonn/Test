<!DOCTYPE HTML>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">       
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    </head>

    <body class="p-3 mb-2 bg-dark text-white">
        <div class="d-flex justify-content-center text-center align-items-center" style="height: 40vw;">
            <div class="border border-secondary rounded-3 d-flex flex-column justify-content-center text-center align-items-center bg-secondary text-white" style="height: 70%; width: 40%;">
                <form method="post" action="/question_1">
                    @csrf
                    <div >
                        <h1>Тестирование</h1>
                        <input type="submit" value="Начать тестирование" class="rounded-pill btn btn-outline-light mt-3">
                    </div>            
                </form>
            </div>
        </div>
    </body>
</html>