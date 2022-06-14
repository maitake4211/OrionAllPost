const rwclient = require("./PostTwitter.js");

const tweet = async () => {
  try {
    await rwclient.v1.tweet("test yeah")
  } catch(e){
    console.error(e)
  }
}

tweet()
