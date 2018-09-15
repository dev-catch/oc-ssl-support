<?php namespace DevCatch\SslSupport\Models;

use Model;

/**
 * Settings Model
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'devcatch_sslsupport_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];
}
