function init(){
	getShows(movie2);
}

function getShows(movie){
	for (var i = 0; i < movie.showtimes.length; i++){
			console.log("Next Show for " +  movie.title + ": " +
				movie.showtimes[i]);
		}
	}



var movie = {
	title: "Plan 9 from Outer Space",
	genre: "Cult Classic",
	rating: 5,
	showtimes: ["03:00 pm", "07:00 pm", "11:00 pm"]
};

var movie2 = {
	title: "Forbidden Planet",
	genre: "Classic Sci-Fi",
	rating: 5,
	showtimes: ["05:00 pm", "09:00 pm"]
};

window.onload = init;
