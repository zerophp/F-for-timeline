//$(function(){
//	
//	var timeline = new VMM.Timeline();
//	timeline.init("data.json");
//
//});


$(document).ready(function() {
    createStoryJS({
        type:       'timeline',
        width:      '',
        height:     '',
        source:     'https://docs.google.com/spreadsheet/pub?key=0Am0OdXdnisZAdGJ5QXVoeXVLcEV2akFvQTNaTGM5S1E&output=html',
        embed_id:   'my-timeline',
        debug:		true
    });
});