<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $tenantRelationshipName = 'settings';
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->imageEditor()
                    ->downloadable(),
                FileUpload::make('favicon')
                    ->label('Favicon')
                    ->image()
                    ->imageEditor()
                    ->downloadable(),
                FileUpload::make('background')
                    ->label('Background')
                    ->image()
                    ->imageEditor()
                    ->downloadable(),
                Forms\Components\Textarea::make('footer')
                    ->label('Footer'),
                Forms\Components\Textarea::make('header')
                    ->label('Header'),
                Forms\Components\Textarea::make('title')
                    ->label('Title'),
                Forms\Components\Textarea::make('description')
                    ->label('Description'),
                Forms\Components\ColorPicker::make('color')
                    ->label('Color'),
                Forms\Components\Select::make('font')
                    ->label('Font')
                    ->options([
                        'Arial' => 'Arial',
                        'Courier New' => 'Courier New',
                        'Georgia' => 'Georgia',
                        'Times New Roman' => 'Times New Roman',
                        'Verdana' => 'Verdana',
                    ]),
                Forms\Components\Textarea::make('css')
                    ->label('CSS'),
                Forms\Components\Textarea::make('js')
                    ->label('JS'),
                Forms\Components\Textarea::make('contact')
                    ->label('Contact'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo'),
                ImageColumn::make('favicon')
                    ->label('Favicon'),
                ImageColumn::make('background')
                    ->label('Background'),
                Tables\Columns\TextColumn::make('footer')
                    ->label('Footer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('header')
                    ->label('Header')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
