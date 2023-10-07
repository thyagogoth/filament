<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Pages\Auth\Register as AuthRegister;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class Register extends AuthRegister
{

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getDocumentFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ])
            ->statePath('data');
    }

    protected function getDocumentFormComponent(): Component
    {
        return TextInput::make('document')
            ->label('CPF')
            ->mask('999.999.999-99')
            ->required()
            ->maxLength(14)
            ->unique($this->getUserModel());
    }

}
