const {TwitterApi} = require('twitter-api-v2');

const client = new TwitterApi({
  appKey:"zKOTdajtrQoG9xvYnivg8arN9",
  appSecret:"ecinLLaIvFR9T4ocXmcLaBxybDh6GO1cMLMYHi5nmQDoGaQsSl",
  accessToken:"1528897503860768768-76kWRcR5c6MpI8Yb2uGTmh4UkeInyG",
  accessSecret:"4XbWutJjaw6mCo8FvwAWmJn6xUpHna0MQCNlfWvBeCBMe"
});

const rwclient = client.readWrite

// テスト用
// PostTwitter("test")

function PostTwitter(poststr) {
  try {
    rwclient.v1.tweet(poststr)
  } catch (e) {
    return (e)
  }
}
