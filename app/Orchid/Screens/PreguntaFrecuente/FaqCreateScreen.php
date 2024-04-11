<?php

namespace App\Orchid\Screens\PreguntaFrecuente;

use App\Models\PreguntaFrecuente;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class FaqScreen extends Screen
{
    /**
     * @var PreguntaFrecuente
     */
    public $pregunta_frecuente;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Crear una nueva pregunta frecuente';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Nombre, imagen, título y contenido de la pregunta frecuente';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('bs.plus-circle')
                ->href(route('platform.faq.edit')),
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
            Layout::table('preguntas_frecuentes', [
                TD::make('name'),
                TD::make('image'),
                TD::make('title'),
                TD::make('content'),
                TD::make('actions')
                    ->render(function (PreguntaFrecuente $pregunta) {
                        return Button::make('Editar')
                            ->icon('pencil')
                            ->method('edit')
                            ->parameters(['pregunta' => $pregunta->id]);
                    }),
            ]),
    
            Layout::modal('preguntaFrecuenteModal', Layout::rows([
                Input::make('pregunta_frecuente.name')
                    ->title('Nombre')
                    ->placeholder('Ingrese el nombre de la pregunta frecuente')
                    ->help('El nombre de la pregunta frecuente a crear.'),
                Input::make('pregunta_frecuente.image')
                    ->title('Imagen')
                    ->placeholder('Ingrese la URL de la imagen')
                    ->help('La URL de la imagen asociada a la pregunta frecuente.'),
                Input::make('pregunta_frecuente.title')
                    ->title('Título')
                    ->placeholder('Ingrese el título de la pregunta frecuente')
                    ->help('El título de la pregunta frecuente.'),
                Input::make('pregunta_frecuente.content')
                    ->title('Contenido')
                    ->placeholder('Ingrese el contenido de la pregunta frecuente')
                    ->help('El contenido de la pregunta frecuente.'),
            ]))
                ->title('Crear Pregunta Frecuente')
                ->applyButton('Crear Pregunta Frecuente'),
        ];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(PreguntaFrecuente $pregunta, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $pregunta->update($request->only('name', 'image', 'title', 'content'));

        Toast::info(__('Faq was saved.'));
    }

    /**
     *
     * @param \App\Models\PreguntaFrecuente  $pregunta
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(PreguntaFrecuente $pregunta)
    {
        $pregunta->remove();

        Toast::info(__('Faq was removed'));
    }
}
