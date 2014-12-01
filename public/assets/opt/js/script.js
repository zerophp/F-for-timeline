$(document).ready(function() {
	var wH	= $(window).height();
    createStoryJS({
        type:				'timeline',
        width:				'',
        height:				wH,
		lang:				'es',
		start_zoom_adjust:  0,
		start_at_slide:		0,
        source:				'https://docs.google.com/spreadsheet/pub?key=0Am0OdXdnisZAdGJ5QXVoeXVLcEV2akFvQTNaTGM5S1E&output=html',
        embed_id:			'timelinejs',
		hash_bookmark:		true,
		font:				'PTSerif-PTSans',
		debug:				false
    });
});