<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    //->password()   -> para una contraseña
                    //->email()    ->valida correos (que tenga el arroba.)
                    ->label('Nombre de la categoria')
                    ->helperText('Ejemplo: Ciberseguridad')
                    ->placeholder('Categoria')  //usado por ejemplo para establecer formato de fecha o telefono
                    //->disable(1 == 1)     -> deshabilitar un campo
                    ->required(), //campo obligatorio
                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->helperText('Ejemplo: Ideas relacionados con la proteccion de datos')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
