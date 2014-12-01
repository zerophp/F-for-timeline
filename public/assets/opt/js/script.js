$(document).ready(function() {
	var wH	= $(window).height();
    createStoryJS({
        type:				'timeline',
        width:				'',
        height:				wH,
		lang:				'es',
		start_zoom_adjust:  0,
		start_at_slide:		0,
        source:				'https://docs.google.com/spreadsheet/pub?key=0AsTo17XY_zOBdGlsZTdlMjlYclpvN21lTFVKVnMzSEE&output=html',
        embed_id:			'timelinejs',
		hash_bookmark:		true,
		font:				'PTSerif-PTSans',
		debug:				false
    });
});