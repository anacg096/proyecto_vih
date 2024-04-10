<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ana Cilleruelo">
    <title>Cambiando el significado del VIH</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/cambiandoElSignificado/css/styles.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__imagen">
            <div class="imagen__texto">
                <h1 class="texto__titulo">
                    Más de
                    <br class="titulo__movil" /> 35 años
                    <br /> cambiando
                    <br /> el significado
                    <br /> del VIH
                    </span>
                </h1>
            </div>
        </div>
    </header>

    @component('includes.navbar')
    @endcomponent

    <main class="main margen">
        <div class="main__bloque">
            <p class="main__parrafo">
                La vida de las personas con VIH tiene muchos interrogantes, que el tratamiento no sea uno de ellos. Si
                hemos conseguido la indetectabilidad, merece la pena mantenerla. La aparición de resistencias puede
                comprometer el mayor logro del VIH: Indetectable=Instransmisible.
            </p>
            <div class="bloque__video">
                <img class="video__imagen" src="{{ asset('assets/images/cambiandoElSignificado/main/video2_1.png') }}" alt="imagen_video" />
                <img class="video__icono" src="{{ asset('assets/images/cambiandoElSignificado/main/circle-play.png') }}" alt="icono_video" />
            </div>
        </div>

        <div class="main__container">
            <img class="container__imagen" src="{{ asset('assets/images/cambiandoElSignificado/main/Group_99.png') }}" alt="imagen_T.A.R." />
            <p class="main__parrafo">
                La vida de las personas con VIH tiene muchos <strong>interrogantes</strong> que impactan directamente en
                el <a href="#" class="destacado">bienestar emocional</a> y la <a href="#" class="destacado">adherencia
                    al TAR</a>. La vida de las personas con VIH tiene muchos interrogantes que impactan directamente en
                el <a href="#" class="destacado">bienestar emocional</a> y la <a href="#" class="destacado">adherencia
                    al TAR</a>.
            </p>
        </div>

        <div class="main__container">
            <img class="container__imagen" src="{{ asset('assets/images/cambiandoElSignificado/main/Group_98.png') }}" alt="imagen_C.D.V." />
            <p class="main__parrafo">
                La vida de las personas con VIH tiene muchos <strong>interrogantes</strong> que impactan directamente en
                el <a href="#" class="destacado">bienestar emocional</a> y la <a href="#" class="destacado">adherencia
                    al TAR</a>. La vida de las personas con VIH tiene muchos interrogantes que impactan directamente en
                el <a href="#" class="destacado">bienestar emocional</a> y la <a href="#" class="destacado">adherencia
                    al TAR</a>.
            </p>
        </div>

        <div class="main__container">
            <img class="container__imagen" src="{{ asset('assets/images/cambiandoElSignificado/main/Group_99.png') }}" alt="imagen_T.A.R." />
            <p class="main__parrafo">
                La vida de las personas con VIH tiene muchos <strong>interrogantes</strong> que impactan directamente en
                el <a href="#" class="destacado">bienestar emocional</a> y la <a href="#" class="destacado">adherencia
                    al TAR</a>. La vida de las personas con VIH tiene muchos interrogantes que impactan directamente en
                el <a href="#" class="destacado">bienestar emocional</a> y la <a href="#" class="destacado">adherencia
                    al TAR</a>.
            </p>
        </div>
    </main>

    @component('includes.footer')
    @endcomponent

</body>

</html>