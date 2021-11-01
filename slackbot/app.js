// require the fs module that's built into Node.js
const fs = require('fs')
// get the raw data from the db.json file
let raw = fs.readFileSync('db.json');
// parse the raw bytes from the file as JSON
let faqs= JSON.parse(raw);
// usage of cron jobs
const cron = require('node-cron');
// mysql dependencies
const mysql = require('mysql');

const { App } = require("@slack/bolt");
require("dotenv").config();
// Initializes your app with your bot token and signing secret
const app = new App({
  //token: process.env.SLACK_BOT_TOKEN,
  //signingSecret: process.env.SLACK_SIGNING_SECRET,
  signingSecret: "441143547942a4ef58c173451a256147",
  token: "xoxb-2060706170199-2091658890484-5POJtuPnJOJI0Q4WcJ37ZRVj",
  socketMode: true,
  appToken: "xapp-1-A022HEC7KS6-2133085345601-dfb73353283d279a78836d313c7472714d3ca0b252e97dd8109d05ef56d49716"
});

var dbConnection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "", 
  database: "verjaardagsbot",
});

app.command("/test", async ({ command, ack, say }) => {
  try {
    await ack();
    say("Yaaay! that command works!");
  } catch (error) {
      console.log("err")
    console.error(error);
  }
});

(async () => {
  const port = 3000
  // Start your app
  await app.start(process.env.PORT || port);
  console.log(`⚡️ Slack Bolt app is running on port ${port}!`);

  createBirthdayJobs();
})();

function createBirthdayJobs() {

  // Elke dag om 1 over 10.
  // ("10 1 10 * * *")
  cron.schedule("52 10 * * *", () => {

    dbConnection.connect((err) => {
      
      // Check if there is an error.
      if (err) {
        console.log(err.message);
        return;
      }

      dbConnection.query("SELECT * FROM calender", (err, result, fields) => {
        if (err) {
          console.log(err.message);
          return;
        }

        // Loop trough all birthdays.
        var allBirthdays = JSON.parse(JSON.stringify(result));
        for (var i = 0; i < result.length; i++) {

          // Parsing the date from the database' s format.
          var dates = allBirthdays[i].datum.split("/");
          var dateOfBirth = new Date(dates[2], dates[1], dates[0])

          // Compare current date with the birthday of person.
          var dateNow = new Date(Date.now());
          if (dateNow.getMonth()+1 === dateOfBirth.getMonth() // +1 because it starts with 0 instead of 1.
            && dateNow.getDate() === dateOfBirth.getDate()) {

              var message = allBirthdays[i].naam + " is vandaag jarig! Van harte gefeliciteerd! <3";
              
              try {
                app.client.chat.postMessage({
                  token: "xoxb-2060706170199-2091658890484-5POJtuPnJOJI0Q4WcJ37ZRVj",
                  channel: "D022HEKUAPL",
                  text: "Van Harte Gefeliciteerd Jayne!!!!"
                })
                console.log(allBirthdays[i].naam + " is vandaag jarig!")
              }
              catch (error) {
                console.error("Whoops, an error occured!");
                console.error(error.message);
              }
          }
        }
      })
    });
  });
}

app.message(/ik/, /jarig/, /wanneer/, async ({ command, say }) => {
  try {
    say("Je bent jarig op 15 oktober, feestje!");
  } catch (error) {
      console.log("err")
    console.error(error);
  }
});

app.message(/Jayne/, async ({ command, say }) => {
  try {
    let message = { blocks: [] };
    const productsFAQs = faqs.data.filter((faq) => faq.naam === "Jayne");

    productsFAQs.map((faq) => {
      message.blocks.push(
        {
          type: "section",
          text: {
            type: "mrkdwn",
            text: faq.date,
          },
        },
      );
    });

    say(message);
  } catch (error) {
    console.log("err");
    console.error(error);
  }
});

