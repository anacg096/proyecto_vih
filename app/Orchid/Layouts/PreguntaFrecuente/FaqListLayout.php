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
                ->style('max-width: 4rem')
                ->render(function (PreguntaFrecuente $preguntaFrecuente) {
                    return Link::make($preguntaFrecuente->image)
                        ->route('platform.faqs.edit', $preguntaFrecuente);
                }),
            TD::make('title', 'Título')
                ->style('max-width: 7rem')
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
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (PreguntaFrecuente $faq) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.faqs.edit', $faq->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the faq is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $faq->id,
                            ]),
                    ])),
        ];
    }
}
