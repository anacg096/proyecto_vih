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
            <div id="chemsex" class="iconos__container">
                <div id="icono_chemsex" class="container__icono icono_activo">
                    <img class="icono__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/ICONOS2_3.svg') }}" alt="icono_chemsex" />
                </div>
                <p class="icono_nombre">CHEMSEX</p>
            </div>

            <div id="alcohol" class="iconos__container">
                <div id="icono_alcohol" class="container__icono">
                    <img class="icono__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/ICONOS3_2.svg') }}" alt="icono_alcohol" />
                </div>
                <p class="icono_nombre">ALCOHOL</p>
            </div>

            <div id="bienestar" class="iconos__container">
                <div id="icono_bienestar" class="container__icono">
                    <img class="icono__imagen" class="icono__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/ICONOS3_3.svg') }}" alt="icono_bienestar" />
                </div>
                <p class="icono_nombre">BIENESTAR EMOCIONAL</p>
            </div>

            <div id="estigma" class="iconos__container">
                <div id="icono_estigma" class="container__icono">
                    <img class="icono__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/ICONOS3_4.svg') }}" alt="icono_estigma" />
                </div>
                <p class="icono_nombre">ESTIGMA</p>
            </div>

            <div id="determinantes" class="iconos__container">
                <div id="icono_determinantes" class="container__icono">
                    <img class="icono__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/ICONOS3_5.svg') }}" alt="icono_determinantes" />
                </div>
                <p class="icono_nombre">DETERMINANTES SOCIALES</p>
            </div>
        </section>

        <!-- PARTE QUE SE DEJARÁ DE OCULTAR EN MÓVIL -->
        <section id="informacion" class="main__informacion">

            <div class="informacion__bloque">
                <div class="bloque__icono">
                    <div class="icono__movil">
                        <img class="movil__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/ICONOS2_3.svg') }}" alt="icono_chemsex" />
                    </div>
                </div>

                <div id="info_chemsex" class="bloque__parrafo">
                    <h2 class="parrafo__titulo">¿Pasaría algo si algún fin de semana practico Chemsex?</h2>
                    <p class="parrafo__contenido">
                        Los HSH que practican <a href="#" class="destacado">Chemsex</a> tienen más probabilidades de
                        sufrir
                        <strong>depresión, ansiedad o dependencia de sustancias</strong>.
                    </p>
                    <p class="parrafo__contenido">
                        El uso de drogas chemsex constituye una barrera importante en la consecución de una
                        <strong>adherencia</strong> óptima.
                    </p>
                </div>
            </div>

            <div class="informacion__bloque">
                <div class="bloque__icono">
                    <div class="icono__movil">
                        <img class="movil__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/ICONOS3_2.svg') }}" alt="icono_alcohol" />
                    </div>
                </div>

                <div id="info_alcohol" class="bloque__parrafo">
                    <h2 class="parrafo__titulo">¿Cómo puede afectar el consumo de alcohol?</h2>
                    <p class="parrafo__contenido">
                        El abuso de <span class="destacado">alcohol</span> es un importante problema de
                        <strong>bienestar emocional</strong>.
                    </p>
                    <p class="parrafo__contenido">
                        El consumo de alcohol en exceso, aunque sea esporádico, puede afectar a la
                        <strong>adherencia</strong> y perjudicar el resultado del TAR.4
                    </p>
                </div>
            </div>

            <div class="informacion__bloque">
                <div class="bloque__icono">
                    <div class="icono__movil">
                        <img class="movil__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/ICONOS3_3.svg') }}" alt="icono_bienestar" />
                    </div>
                </div>

                <div id="info_bienestar" class="bloque__parrafo">
                    <h2 class="parrafo__titulo">¿Pueden los determinantes sociales crear un contexto de vulnerabilidad y riesgo
                        de
                        VIH?</h2>
                    <p class="parrafo__contenido">
                        Las poblaciones vulnerables presentan altas tasas de <strong>malestar emocional y de trastornos
                            mentales</strong>.
                    </p>
                    <p class="parrafo__contenido">
                        Las características <strong>sociodemográficas</strong> están ligadas y son determinantes en el
                        nivel de adherencia del TAR.
                    </p>
                </div>
            </div>

            <div class="informacion__bloque">
                <div class="bloque__icono">
                    <div class="icono__movil">
                        <img class="movil__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/ICONOS3_4.svg') }}" alt="icono_estigma" />
                    </div>
                </div>

                <div id="info_estigma" class="bloque__parrafo">
                    <h2 class="parrafo__titulo">¿Cómo puede afectar el estigma a personas con VIH?</h2>
                    <p class="parrafo__contenido">
                        El <a href="#" class="destacado">estigma</a> no exteriorizado se asoció con peor
                        <strong>bienestar
                            emocional y físico</strong>.
                    </p>
                    <p class="parrafo__contenido">
                        El autoestigma, los sentimientos de culpa y la ausencia de soporte social o familar pueden
                        disminuir la <strong>adherencia</strong>.
                    </p>
                </div>
            </div>

            <div class="informacion__bloque">
                <div class="bloque__icono">
                    <div class="icono__movil">
                        <img class="movil__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/ICONOS3_5.svg') }}" alt="icono_determinantes" />
                    </div>
                </div>

                <div id="info_determinantes" class="bloque__parrafo">
                    <h2 class="parrafo__titulo">¿Pueden los determinantes sociales crear un contexto de vulnerabilidad y riesgo
                        de
                        VIH?</h2>
                    <p class="parrafo__contenido">
                        Una situación emocional y social cambiante puede afectar a la <strong>comorbilidad
                            psiquiátrica</strong>.
                    </p>
                    <p class="parrafo__contenido">
                        El diagnóstico o los síntomas de las comorbilidades psiquiátricas son una barrera en el cuidado
                        de las personas con VIH. Algunas, como la depresión, están asociadas a una peor
                        <strong>adherencia</strong> al TAR.
                    </p>
                </div>
            </div>
        </section>

        <!-- -------------------------------------------------------------------------------- -->

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
            <img class="descarga__imagen" src="{{ asset('assets/images/teAseguroRespuestas/iconos/240118 EDETAILING_CAMPANÌƒA UNBRANDED VIH GILEAD_bloque 1_v9_Página_02 2.png') }}"
                alt="imagenDescarga" />
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