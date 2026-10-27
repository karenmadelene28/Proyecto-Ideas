<?php

namespace App\Filament\Resources\Ideas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Filament\Actions\Action;
use App\Models\Idea;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Textarea;
use Filament\Support\Icons\Heroicon;


class IdeasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->wrap()
                    ->sortable(),
                TextColumn::make('titulo')
                    ->label('Idea')
                    ->searchable(),
                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->wrap()
                    ->searchable(),
                TextColumn::make('estado')
                    ->searchable(),
                TextColumn::make('autor')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('categoria.nombre')
                    ->label('Categoria')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('observacion')
                ->label('Observación')
                ->wrap(),
            ])
            ->filters([
                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        'registrada' => 'Registrada',
                        'en revisión' => 'En revisión',
                        'aprobada'    => 'Aprobada',
                        'rechazada'   => 'Rechazada',
                    ]),

                TrashedFilter::make(),
            ])

            ->recordActions([
                EditAction::make(),
                ViewAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
                Action::make('aprobar')
                ->label('Aprobar')
                ->icon(Heroicon::HandThumbUp)
                ->color('success')
                ->requiresConfirmation()
                ->modalheading('Aprobación')
                ->modaldescription('¿Deseas aprobar esta idea?')
                ->action(function(Idea $record){
                    $record->update(['estado' => 'aprobada',
                                    'observacion' => null,
                    ]);

                    Notification::make()
                        ->title('Idea aprobada correctamente')
                        ->success()
                        ->send();
                })
                ->visible (fn(Idea $record ) => $record->estado !== 'aprobada'),

                Action::make('rechazar')
                ->label('Rechazar')
                ->icon(Heroicon::HandThumbDown)
                ->color('danger')
                ->schema([
                    TextArea::make('observacion')
                        ->label('Motivo del rechazo')
                        ->required()
                        ->maxLength(200),
                ])
                ->action(function ($record, array $data) {
                    $record->update([
                        'estado' => 'Rechazada',
                        'observacion' => $data['observacion'],
                    ]);
                    
                    Notification::make()
                        ->title('Idea rechazada correctamente')
                        ->success()
                        ->send();
                }) 
                ->visible (fn(Idea $record ) => $record->estado !== 'rechazada'), 
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}


