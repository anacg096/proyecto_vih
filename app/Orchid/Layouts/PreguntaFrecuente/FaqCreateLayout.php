<?php

namespace App\Orchid\Layouts\PreguntaFrecuente;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class FaqCreateLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [

            Input::make('faq.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Nombre'))
                ->placeholder(__('Nombre')),

                Input::make('faq.image')
                ->type('file')
                ->required()
                ->title(__('Imagen'))
                ->placeholder(__('Imagen')),

            Input::make('faq.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Título'))
                ->placeholder(__('Título')),

            TextArea::make('faq.content')
                ->rows(5)
                ->required()
                ->title(__('Contenido'))
                ->placeholder(__('Contenido')),
        ];
    }
}
