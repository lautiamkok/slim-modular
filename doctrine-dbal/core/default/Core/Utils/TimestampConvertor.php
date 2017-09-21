<?php
namespace Monsoon\Core\Utils;

class TimestampConvertor
{
    /**
     * Default timezone.
     * @var string
     */
    protected $timezone = "UTC";

    /**
     * Default date format.
     * @var string
     */
    protected $format = "d-m-Y H:i:s";

    // public function __construct($format, $timezone)
    // {
    //     $this->format = $format;
    //     $this->timezone = $timezone;
    // }

    public function convert($timestamp)
    {
        return $this->toLocalTime($timestamp);
    }

    public function setFormat($format)
    {
        $this->format = $format;
    }

    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    private function toLocalTime($timestamp)
    {
        date_default_timezone_set($this->timezone);
        return date($this->format, $timestamp);
    }
}
