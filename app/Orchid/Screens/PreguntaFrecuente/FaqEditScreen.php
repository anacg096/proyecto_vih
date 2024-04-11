<?php

namespace App\Orchid\Screens\PreguntaFrecuente;

use App\Models\PreguntaFrecuente;
use App\Orchid\Layouts\PreguntaFrecuente\FaqEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class FaqEditScreen extends Screen
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
    public function query(PreguntaFrecuente $pregunta_frecuente): iterable
    {
        return [
            'pregunta_frecuente' => $pregunta_frecuente
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->pregunta_frecuente->exists ? 'Editar una pregunta frecuente' : 'Crear una nueva pregunta frecuente';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return $this->pregunta_frecuente->exists ? 'Edita la información' : 'Crea la información';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),

            Button::make(__('Remove'))
                ->icon('bs.trash3')
                ->method('remove')
                ->canSee($this->pregunta_frecuente->exists),
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

            Layout::block(FaqEditLayout::class)
                ->title(__('Profile Information'))
                ->description(__('Modifica la información de las preguntas frecuentes.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->canSee($this->pregunta_frecuente->exists)
                        ->method('save')
                ),
        ];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request, PreguntaFrecuente $faq)
    {
        // Validar los datos del formulario
        $request->validate([
            'faq.name' => 'required|max:255',
            'faq.image' => 'required|max:255',
            'faq.title' => 'required|max:255',
            'faq.content' => 'required',
        ]);

        // Llenar el modelo FAQ con los datos del formulario
        $faq->fill($request->input('faq'));

        // Guardar el modelo actualizado en la base de datos
        $faq->save();

        // Mostrar un mensaje de confirmación
        Toast::info(__('La pregunta frecuente fue guardada'));

        // Redirigir al usuario a la página de preguntas frecuentes
        return redirect()->route('platform.faq');
    }

    /**
     * Elimina una pregunta frecuente.
     *
     * @param  \App\Models\PreguntaFrecuente  $faq
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(PreguntaFrecuente $faq)
    {
        $faq->delete();

        // Muestra un mensaje de confirmación utilizando el servicio Toast de Orchid
        Toast::info(__('La pregunta frecuente fue eliminada'));

        // Redirige al usuario a alguna página deseada después de eliminar la pregunta frecuente
        return redirect()->route('platform.faq.index');
    }
}
