<?php

namespace App\Orchid\Layouts\PreguntaFrecuente;

use App\Models\PreguntaFrecuente;
use Illuminate\Support\Facades\Redirect;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Facades\Alert;

class FaqEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        $faqId = request()->route()->parameter('faq');

        $faq = PreguntaFrecuente::find($faqId);

        // Si no existe el id que llega por get lo que se hace es un alert y redirección a FaqListScreen 
        if (!$faq) {
            Alert::error('La pregunta frecuente no existe.');
            return Redirect::to('admin/faqs')->send();
        }

        // Se obtiene la URL completa de la imagen actual
        $imageUrl = $faq ? asset('assets/images/teAseguroRespuestas/iconos/' . $faq->image) : null;

        return [
            Input::make('faq.id')
                ->type('int')
                ->required()
                ->placeholder(__('Id'))
                ->value($faq ? $faq->id : "")
                ->hidden(),

            Input::make('faq.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Nombre'))
                ->placeholder(__('Nombre'))
                ->value($faq ? $faq->name : ""),

            Input::make('faq.image')
                ->type('file')
                ->title(__('Imagen actual'))
                ->placeholder(__('Imagen actual'))
                ->value($imageUrl)
                ->help("introduzca la nueva imagen en este campo si desea cambiarla"),

            Input::make('faq.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Título'))
                ->placeholder(__('Título'))
                ->value($faq ? $faq->title : ""),

            TextArea::make('faq.content')
                ->rows(5)
                ->required()
                ->title(__('Contenido'))
                ->placeholder(__('Contenido'))
                ->value($faq ? $faq->content : ""),
        ];
    }
}
