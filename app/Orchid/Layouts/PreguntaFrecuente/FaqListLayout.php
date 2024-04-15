<?php

namespace App\Orchid\Layouts\PreguntaFrecuente;

use App\Models\PreguntaFrecuente;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FaqListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'preguntas_frecuentes';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Nombre')
                ->style('max-width: 2.5rem')
                ->render(function (PreguntaFrecuente $preguntaFrecuente) {
                    return Link::make($preguntaFrecuente->name)
                        ->route('platform.faqs.edit', $preguntaFrecuente);
                }),
            TD::make('image', 'Imagen')
                ->style('max-width: 1rem')
                ->render(function (PreguntaFrecuente $preguntaFrecuente) {
                    return Link::make($preguntaFrecuente->image)
                        ->route('platform.faqs.edit', $preguntaFrecuente);
                }),
            TD::make('title', 'Título')
                ->style('max-width: 10rem')
                ->render(function (PreguntaFrecuente $preguntaFrecuente) {
                    return Link::make($preguntaFrecuente->title)
                        ->route('platform.faqs.edit', $preguntaFrecuente);
                }),
            TD::make('content', 'Contenido')
                ->style('max-width: 10rem')
                ->render(function (PreguntaFrecuente $preguntaFrecuente) {
                    return Link::make($preguntaFrecuente->content)
                        ->route('platform.faqs.edit', $preguntaFrecuente);
                }),
            TD::make(__('Acciones'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (PreguntaFrecuente $faq) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Editar'))
                            ->route('platform.faqs.edit', $faq->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Borrar'))
                            ->icon('bs.trash3')
                            ->confirm(__('Una vez que se elimine la pregunta frecuente, todos sus recursos y datos se eliminarán de forma permanente. Antes de eliminarlo, por favor descargue cualquier dato o información que desee conservar.'))
                            ->route('platform.faqs.remove', $faq->id)
                    ])),
        ];
    }
}
