<?php
/**
 * DevOps для разработки и эксплуатации.
 * Расписание спринтов и мероприятий в формате CSV
 *
 * (ц) Сергей Ефимов <serge-yefimov@yandex.ru>
 */

use om\IcalParser;
require_once 'vendor/autoload.php';

$url = 'https://calendar.google.com/calendar/ical/da273a5f0dfaa6b9e4d0b2c3cd406db3a17c4d8dfbcd5aa0c9249f7aeb41ac09%40group.calendar.google.com/public/basic.ics';

$cal = new IcalParser();
$results = $cal->parseFile($url);

foreach ($cal->getEvents()->sorted() as $event) {
    printf(
        '%s;%s;%s' . PHP_EOL,
        $event['DTSTART']->format('d.m.Y'),
        $event['DTEND']->format('d.m.Y'),
        $event['SUMMARY']
    );
}

