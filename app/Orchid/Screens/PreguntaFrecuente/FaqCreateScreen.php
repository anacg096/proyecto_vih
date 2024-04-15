<?php

namespace App\Orchid\Screens\PreguntaFrecuente;

use App\Models\PreguntaFrecuente;
use App\Orchid\Layouts\PreguntaFrecuente\FaqCreateLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;


class FaqCreateScreen extends Screen
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
        return 'Crear una nueva pregunta frecuente';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Crea la información';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Crear')
                ->icon('pencil')
                ->method('create')
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
            Layout::block(FaqCreateLayout::class)
                ->title(__('Profile Information'))
                ->description(__('Crea nuevas preguntas frecuentes.'))
                ->commands(
                    Button::make(__('Crear'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->method('create')
                ),
        ];
    }

    /**
     * Crea una nueva pregunta frecuente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        // Valida el formulario
        $request->validate([
            'faq.image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Se procesa y se guarda la imagen
        if ($request->hasFile('faq.image')) {
            $image = $request->file('faq.image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/teAseguroRespuestas/iconos'), $imageName);

            // Asignar el nombre de la imagen al modelo de pregunta frecuente
            $requestData = $request->get('faq');
            $requestData['image'] = $imageName;
        }

        // Crear una nueva instancia de PreguntaFrecuente con los datos del formulario
        $preguntaFrecuente = new PreguntaFrecuente($requestData);
        $preguntaFrecuente->save();

        Alert::info('Pregunta Frecuente creada correctamente');

        return redirect()->route('platform.faq');
    }

}