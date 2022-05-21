<?php

namespace ArtisanWebLab\NestedTree\Support\Facades;

use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Expression raw(string $sql)
 * @method static string parse(string $sql)
 * @method static string parseGroupConcat(string $sql)
 * @method static string parseConcat(string $sql)
 * @method static string parseIfNull(string $sql)
 * @method static string parseBooleanExpression(string $sql)
 * @method static string cast(string $sql, string $asType = 'INTEGER')
 * @method static void convertTimestamps(string $table, string|array $columns = null)
 * @method static void disableStrictMode()
 * @method static string getDriver()
 * @method static string getTablePrefix()
 */
class DbDongle extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'db.dongle';
    }
}
