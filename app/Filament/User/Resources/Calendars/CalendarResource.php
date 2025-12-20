<?php

namespace App\Filament\User\Resources\Calendars;

use App\Filament\User\Resources\Calendars\Pages\CreateCalendar;
use App\Filament\User\Resources\Calendars\Pages\EditCalendar;
use App\Filament\User\Resources\Calendars\Pages\ListCalendars;
use App\Filament\User\Resources\Calendars\Schemas\CalendarForm;
use App\Filament\User\Resources\Calendars\Tables\CalendarsTable;
use App\Models\Calendar;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CalendarResource extends Resource
{
    protected static ?string $model = Calendar::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Akademik';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'foto';

     /**
     * 🔒 USER PANEL:
     * User hanya bisa melihat affiliatenya sendiri
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Filament::auth()->id());
    }

    public static function form(Schema $schema): Schema
    {
        return CalendarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CalendarsTable::configure($table);
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
            'index' => ListCalendars::route('/'),
            'create' => CreateCalendar::route('/create'),
            'edit' => EditCalendar::route('/{record}/edit'),
        ];
    }
}
