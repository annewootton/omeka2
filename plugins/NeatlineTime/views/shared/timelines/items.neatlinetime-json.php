<?php
/**
 * The shared neatlinetime-json browse view for Items
 */

$neatlineTimeEvents = array();
while (loop_items()) {
    $itemTitle = item('BeatlesLive', 'Title');
    $itemLink = abs_item_uri();
    $itemDescription = item('BeatlesLive', 'Description') ? item('BeatlesLive', 'Description') : '';

    $itemDates = item('BeatlesLive', 'Related Concert Date', 'all');
    if ($file = get_db()->getTable('File')->findWithImages(item('id'), 0)) {
        $fileUrl = file_display_uri($file, 'square_thumbnail'); 
    }
    if (!empty($itemDates)) {
        foreach ($itemDates as $itemDate) {
            $neatlineTimeEvent = array();
            $dateArray = explode('/', $itemDate);

            if ($dateStart = neatlinetime_convert_date(trim($dateArray[0]))) {
                $neatlineTimeEvent['start'] = $dateStart;

                if (count($dateArray) == 2) {
                    $neatlineTimeEvent['end'] = neatlinetime_convert_date(trim($dateArray[1]));
                }

                $neatlineTimeEvent['title'] = $itemTitle;
                $neatlineTimeEvent['link'] = $itemLink;
                $neatlineTimeEvent['classname'] = neatlinetime_item_class();

                if ($fileUrl) {
                    $neatlineTimeEvent['image'] = $fileUrl;
                }

                $neatlineTimeEvent['description'] = $itemDescription;
                $neatlineTimeEvents[] = $neatlineTimeEvent;
            }
        }
    }
}

$neatlineTimeArray = array();
$neatlineTimeArray['date-time-format'] = "iso8601";
$neatlineTimeArray['events'] = $neatlineTimeEvents;

$neatlinetimeJson = json_encode($neatlineTimeArray);

echo $neatlinetimeJson;

