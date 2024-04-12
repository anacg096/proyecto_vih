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
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Imagen'))
                ->placeholder(__('Imagen'))
                ->value($faq ? $faq->image : ""),

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
