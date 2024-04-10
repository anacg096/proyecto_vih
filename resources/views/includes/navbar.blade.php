<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/shared/navbar/css/styles.css') }}">
</head>

<body>
    <nav class="nav">
        <ul class="nav__ul">
            @if(isset($coloreado) && $coloreado)
            <li class="ul__li link_destacado">
                <a class="li__link active" href="{{ route('index.tar') }}">
                    TE ASEGURO RESPUESTAS
                </a>
            </li>
            @else
            <li class="ul__li">
                <a class="li__link" href="{{ route('index.tar') }}">
                    TE ASEGURO RESPUESTAS
                </a>
            </li>
            @endif
            <li class="ul__li">
                <a class="li__link" href="#">CUÁNTOS DÍAS POR VIVIR</a>
            </li>
            <li class="ul__li">
                <a class="li__link" href="#">OTRO TEMA FUTURO</a>
            </li>
        </ul>
    </nav>
</body>

</html>