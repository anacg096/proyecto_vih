<?php

namespace App\Orchid\Screens\PreguntaFrecuente;

use App\Models\PreguntaFrecuente;
use App\Orchid\Layouts\PreguntaFrecuente\FaqListLayout;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;

class FaqListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        /* Necesario para que te coja los datos de la base de datos y luego los pinte */
        return [
            'preguntas_frecuentes' => PreguntaFrecuente::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Lista de las preguntas frecuentes';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Lista de preguntas frecuentes';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Crear nueva pregunta')
                ->icon('bs.plus-circle')
                ->route('platform.faqs.create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            FaqListLayout::class
        ];
    }
}
