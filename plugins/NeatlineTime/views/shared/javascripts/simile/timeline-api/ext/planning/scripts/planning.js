Timeline.Planning={};
Timeline.Planning.createBandInfo=function(a){var b="theme"in a?a.theme:Timeline.getDefaultTheme(),c="eventSource"in a?a.eventSource:null,d=new Timeline.LinearEther({centersOn:"date"in a?a.date:Timeline.PlanningUnit.makeDefaultValue(),interval:1,pixelsPerInterval:a.intervalPixels}),e=new Timeline.PlanningEtherPainter({intervalUnit:a.intervalUnit,multiple:"multiple"in a?a.multiple:1,align:a.align,theme:b}),b={theme:b};if("trackHeight"in a)b.trackHeight=a.trackHeight;if("trackGap"in a)b.trackGap=a.trackGap;
b="overview"in a&&a.overview?new Timeline.OverviewEventPainter(b):new Timeline.DetailedEventPainter(b);return{width:a.width,eventSource:c,timeZone:"timeZone"in a?a.timeZone:0,ether:d,etherPainter:e,eventPainter:b}};