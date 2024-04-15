<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ana Cilleruelo">
    <title>Te aseguro respuestas</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/teAseguroRespuestas/css/styles.css') }}">
    <script src="{{ asset('assets/scripts/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/jquery/enlaces.js') }}"></script>
</head>

<body>
    <header class="header">
        <div class="header__texto">
            <h1 class="texto__titulo">CAMBIANDO EL SIGNIFICADO DEL VIH</h1>
        </div>
        <div class="header__container">
            <img class="container__imagen" src="{{ asset('assets/images/teAseguroRespuestas/header/Group_101.png') }}" alt="imagen_T.A.R." />
        </div>
    </header>

    @component('includes.navbar')
    @slot('coloreado', $coloreado)
    @endcomponent

    <main class="main margen">
        <div class="main__introduccion">
            La vida de las personas con VIH tiene muchos <strong>interrogantes</strong> que impactan directamente en el
            <a href="#" class="destacado">bienestar emocional</a> y la <a href="#" class="destacado">adherencia al
                TAR</a>.
        </div>

        <!-- SECCIÓN REACTIVA EN FUNCIÓN DEL ICONO AL QUE SE PULSE -->
        <section id="section_iconos" class="main__iconos">

            @foreach ($array_preguntas as $pregunta)
            <div id="{{ str_replace(' ', '', $pregunta->name) }}" class="iconos__container">
                <!-- El primero tiene que llevar la clase icono_activo -->
                @if($pregunta->name === "CHEMSEX")
                <div id="icono_{{ str_replace(' ', '', $pregunta->name) }}" class="container__icono icono_activo">
                    <img class="icono__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/' . $pregunta->image) }}" alt="icono_{{ str_replace(' ', '', $pregunta->name) }}" />
                </div>
                @else
                <div id="icono_{{ str_replace(' ', '', $pregunta->name) }}" class="container__icono">
                    <img class="icono__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/' . $pregunta->image) }}" alt="icono_{{ str_replace(' ', '', $pregunta->name) }}" />
                </div>
                @endif
                <p class="icono_nombre">{{ $pregunta->name }}</p>
            </div>
            @endforeach
        </section>

        <!-- PARTE QUE SE DEJARÁ DE OCULTAR EN MÓVIL -->
        <section id="informacion" class="main__informacion">
            @foreach ($array_preguntas as $pregunta)
            <div class="informacion__bloque">
                <div class="bloque__icono">
                    <div class="icono__movil">
                        <img class="movil__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/' . $pregunta->image) }}" alt="icono_{{ str_replace(' ', '', $pregunta->name) }}" />
                    </div>
                </div>

                <div id="info_{{ str_replace(' ', '', $pregunta->name) }}" class="bloque__parrafo">
                    <h2 class="parrafo__titulo">{{ $pregunta->title }}</h2>
                    <!-- Directiva de Blade que reconoce el código html que está almacenado en bbdd -->
                    <span>{!! $pregunta->content !!}</span>
                </div>
            </div>
            @endforeach

            <div class="main__aviso">
                <div class="aviso__icono">
                    <img class="icono__mano" src="{{ asset('assets/images/teAseguroRespuestas/iconos/DEDO_1.png') }}" alt="dedo_hacia_abajo" />
                </div>
                <div class="aviso__informacion">
                    <p class="informacion__parrafo">
                        Una <strong>adherencia deficiente</strong> es el principal factor de riesgo de fracaso virológico y
                        desarrollo de <strong>resistencia</strong>.
                    </p>
                    <p class="informacion__parrafo">
                        La aparición de resistencias puede comprometer el mayor logro del VIH:
                        <strong>Indetectable=Intrasmisible</strong>
                    </p>
                    <p class="informacion__parrafo">
                        Si has conseguido la indetectabilidad, merece la pena mantenerla.
                    </p>
                </div>
            </div>

            <div class="main__descarga">
                <img class="descarga__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/240118 EDETAILING_CAMPANÌƒA UNBRANDED VIH GILEAD_bloque 1_v9_Página_02 2.png') }}" alt="imagenDescarga" />
                <div class="descarga__link">
                    <p class="link_parrafo">DESCARGAR PRESENTACIÓN</p>
                    <img class="link__icono" src="{{ asset('assets/images/teAseguroRespuestas/iconos/Group_96.svg') }}" alt="icono_descarga" />
                </div>
            </div>
    </main>

    <section class="seccionAzul">
        <div class="seccionAzul__fondo">
            <div class="fondo__cabecera">
                <h1 class="cabecera__titulo">
                    Más de 35 años
                    <br /> cambiando
                    <br /> el significado
                    <br /> del VIH
                    </span>
                </h1>
            </div>
        </div>
    </section>

    @component('includes.footer')
    @endcomponent
</body>

</html>