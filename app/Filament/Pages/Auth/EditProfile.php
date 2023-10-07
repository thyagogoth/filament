<?php

namespace App\Filament\Pages\Auth;

use App\Forms\Components\PostalCode;
use App\Models\Address;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{

    protected static string $view = 'filament.pages.auth.edit-profile';
    protected static string $layout = 'filament-panels::components.layout.index';

    public static function getSlug(): string
    {
        return 'me';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Personal informations')
                ->aside()
                ->schema([
                    $this->getNameFormComponent(),
                    $this->getDocumentFormComponent(),
                    $this->getEmailFormComponent()->label('E-mail'),
                    $this->getPasswordFormComponent(),
                    $this->getPasswordConfirmationFormComponent(),
                    $this->getAddressFormComponent(),
                ]),
            ]);
    }

    protected function getDocumentFormComponent(): Component
    {
        return TextInput::make('document')
            ->label('CPF')
            ->mask('999.999.999-99')
            ->required()
            ->maxLength(14)
            ->disabled()
            ->unique(true);
    }

    protected function getAddressFormComponent(): Component
    {
        return Fieldset::make('Address')
            ->relationship('address')
            ->schema([
                PostalCode::make('postal_code')
                    ->viaCep(
                        setFields: [
                            'street' => 'logradouro',
                            'number' => 'numero',
                            'neighborhood' => 'bairro',
                            'city' => 'localidade',
                            'uf' => 'uf',
                        ]
                    ),
                TextInput::make('street'),
                TextInput::make('number')
                    ->extraAlpineAttributes([
                        'x-on:focustonumber.window' => "\$el.focus()",
                    ]),
                TextInput::make('complement'),
                TextInput::make('neighborhood'),
                TextInput::make('city'),
                TextInput::make('uf'),
            ]);
    }
    
}
