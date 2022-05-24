var Twitter = require('twitter');

var client = new Twitter({
	consumer_key:'【API key】',
	consumer_secret: '【API secret key】',
	access_token_key: '【Access token】',
	access_token_secret: '【Access token secret】'

var params = {status: '日本語ツイート検証'};
client.post('statuses/update', params, function(error, tweets, response){
	if(error){
		console.log(error);
	}
});
