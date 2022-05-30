import { TwitterApi } from 'twitter-api-v2';

// Instanciate with desired auth type (here's Bearer v2 auth)
const twitterClient = new TwitterApi('AAAAAAAAAAAAAAAAAAAAAObrcwEAAAAADTNZblo%2FedwSg%2BtbqN4GGukGtTQ%3DdK50a5SpDCoi2D0GeHWpoHWddjYhgjTks1Whhze05clM2PBip0');

// Tell typescript it's a readonly app
const roClient = twitterClient.readOnly;

// Play with the built in methods
const user = await roClient.v2.userByUsername('test');
await twitterClient.v1.tweet('Hello, this is a test.');
// You can upload media easily!
//await twitterClient.v1.uploadMedia('./big-buck-bunny.mp4');
