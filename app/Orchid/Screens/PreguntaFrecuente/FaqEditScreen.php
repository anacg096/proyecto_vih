<?php

namespace App\Orchid\Screens\PreguntaFrecuente;

use App\Models\PreguntaFrecuente;
use App\Orchid\Layouts\PreguntaFrecuente\FaqEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

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
        return 'Editar una pregunta frecuente';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Edita la información';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Modificar')
                ->icon('pencil')
                ->method('update')
                ->canSee(!$this->pregunta_frecuente->exists),
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
            // Se hace este bloque para que visualmente esté montado como Roles y Users
            Layout::block(FaqEditLayout::class)
                ->title(__('Profile Information'))
                ->description(__('Modifica la información de las preguntas frecuentes.'))
                ->commands(
                    // Pinta el botón de debajo de los input 
                    Button::make(__('Modificar'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->canSee(!$this->pregunta_frecuente->exists)
                        ->method('update')
                ),
        ];
    }

    /**
     * Actualiza una pregunta frecuente existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $faq)
    {   
        // Esto busca una instancia de PreguntaFrecuente en la base de datos utilizando la variable $faq cuyo valor es el id
        $preguntaFrecuente = PreguntaFrecuente::findOrFail($faq);

        // Verificar si se cargó una nueva imagen en el campo input
        if ($request->hasFile('faq.image')) {
            // Procesar y guardar la nueva imagen
            $image = $request->file('faq.image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/teAseguroRespuestas/iconos'), $imageName);

            // Actualizar el nombre de la imagen en el modelo de PreguntaFrecuente
            $preguntaFrecuente->image = $imageName;
        }

        // Rellena los datos del modelo de PreguntaFrecuente con los valores del formulario en la solicitud
        // a través de $request->get('faq'), luego guarda los cambios en la base de datos.
        $preguntaFrecuente->fill($request->get('faq'))->save();

        Alert::info('Pregunta Frecuente actualizada correctamente');

        return redirect()->route('platform.faq');
    }

    /**
     * Borra una pregunta frecuente existente.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        //  Esto busca una instancia de PreguntaFrecuente en la base de datos utilizando el valor de $id proporcionado.
        $preguntaFrecuente = PreguntaFrecuente::findOrFail($id);

        // Para borrar el dato
        $preguntaFrecuente->delete();

        // Muestra un mensaje de confirmación utilizando el servicio Toast de Orchid
        Alert::info(__('La pregunta frecuente fue eliminada correctamente'));

        // Redirige al usuario a la página donde se muestra la tabla de preguntas frecuentes
        return redirect()->route('platform.faq');
    }
}
